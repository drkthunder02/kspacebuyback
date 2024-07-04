<?php

/**
 * Buyback Helper Functions
 */

 namespace App\Library\Helpers;

 //Internal Library
 use Log;

 //App Library
 use App\Jobs\Library\JobHelper;
 use App\Library\Esi\Esi;
 use App\Library\Helpers\MarketHelper;

//Models
use App\Models\Esi\EsiScope;
use App\Models\Esi\EsiToken;
use App\Models\Buyback\Payout as BuybackPayout;
use App\Models\Buyback\Contract as BuybackContract;
use App\Models\Buyback\ContractItem as BuybackContractItems;

 class BuybackHelper {
    private $charId;
    private $corpId;
    private $esi;

    public function __construct($char, $corp, $esi = null) {
        $this->charId = $char;
        $this->corpId = $corp;
        if($esi == null) {
            $esiHelper = new Esi;
            $token = $esiHelper->GetRefreshToken($char);
            $this->esi = $esiHelper->SetupESiAuthentication($token);
        } else {
            $this->esi = $esi;
        }
    }

    public function GetBuybackPayoutsByUser($user) {
        $payouts = 0.00;
    }

    public function GetBuybackPayoutsByMonthByUser($user, $start, $end) {
        $payouts = 0.00;

        $payouts = Payout::where(['character_id' => $user])
                         ->whereBetween('date', [$start, $end])->sum('payout_amount');

        return $payouts;
    }

    public function GetBuybackPayoutsByMonth($start, $end) {
        $payouts = 0.00;

        $payouts = Payout::whereBetween('date', [$start, $end])->sum('payout_amount');

        return $payouts;
    }

    public function GetTimeFrameInMonths() {
        //Declare an array of dates
        $dates = array();

        //Setup the start of the array as the basis of our start and end dates
        $start = Carbon::now()->startOfMonth();
        $end = Carbon::now()->endOfMonth();
        $end->hour = 23;
        $end->minute = 59;
        $end->second = 59;

        if($months == 1) {
            $dates = [
                'start' => $start,
                'end' => $end,
            ];

            return $dates;
        }

        //Create the array of dates
        for($i = 0; $i < $months; $i++) {
            if($i == 0) {
                $dates[$i]['start'] = $start;
                $dates[$i]['end'] = $end;
            }

            $start = Carbon::now()->startOfMOnth()->subMonths($i);
            $end = Carbon::now()->endOfMonth()->subMonths($i);
            $end->hour = 23;
            $end->minute = 59;
            $end->second = 59;
            $dates[$i]['start'] = $start;
            $dates[$i]['end'] = $end;

            //Return the dates back to the calling function
            return $dates;
        }
    }

    public function ProcessBuybackList($data) {
        $processed = array();
        $lines = array();
        $i = 0;

        $lines = explode("\n", $data);

        for($i = 0; $i < sizeof($lines); $i++) {
            $temp = explode($lines[$i]);
            $process[$i]['item'] = $temp[0];
            $process[$i]['quantity'] = str_replace($temp[1], "x");
        }

        return $processed;
    }

    /**
     * Store the buyback contract from the page.
     * Store the contract details.
     * Store the contract items
     * 
     * @param data
     * @return array
     */
    public function StoreBuybackContract($data) {
        $contract = new BuybackContract;
        $contractItems = new BuybackContractItems;
        $marketHelper = new MarketHelper;
        $contractTotal = 0.00;

        //Create the random string for the description
        $contractDescription = $this->RandomString(16);

        //Create the contract and store it in the database with the state of a quote since
        //the contract has not been delivered to the esi yet.
        $contract->contract_name = $contractDescription;
        $contract->contract_state = 'quote';
        $contract->save();

        $newContract = BuybackContract::where([
            'contract_name' => $contractDescription,
        ])->first();

        foreach($data as $d) {
            //Get the price for the item
            $itemInfo = $marketHelper->ItemMarketInfoLookup($d['item_id']);
            
            //Save the item into the database
            $item = new BuybackContractItem;
            $item->contract_id = $newContract['contract_id'];
            $item->item_id = $itemInfo['item_id'];
            $item->item_name = $itemInfo['item_name'];
            $item->item_price = $itemInfo['item_price'];
            $item->item_multiplier = $itemInfo['item_multiplier'];
            $item->item_quantity = $d['quantity'];
            $item->save();

            //Add up the items and their multipliers
            $contracTotal += (($itemInfo['item_price'] * $itemInfo['item_multiplier']) * $d['quantity']);
        }

        $contract = [
            'contract_id' => $contractId,
            'contract_description' => $contractDescription,
            'total' => $contractTotal,
        ];

        return $contract;
    }

    /**
     * Queue a job to check for the contract through the eve api
     */
    public function QueueBuybackContractJob($contract) {

    }

    private function RandomString($length_of_string) {
        //String of alphanumeric characters
        $str_result = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";

        //Shuffle the string
        return substr(str_shuffle($str_result), 0, $length_of_string);
    }
 }