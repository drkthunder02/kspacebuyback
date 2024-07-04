<?php

/**
 * Contract Helper
 */

namespace App\Library\Helpers;

//Internal Library
use Log;

//App Library
use App\Jobs\Library\JobHelper;
use Seat\Eseye\Exceptions\RequestFailedException;
use App\Library\Esi\Esi;
use App\Library\Helpers\LookupHelper;

//App Models
use App\Models\Esi\EsiToken;
use App\Models\Esi\EsiScope;
use App\Models\Eve\Contract;
use App\Models\Eve\ContractItem;

class ContractHelper {
    private $charId;
    private $corpId;
    private $page;
    private $esi;

    public function __construct($char, $corp, $esi = null) {
        $this->charId = $char;
        $this->corpId = $corp;
        if( $esi == null ) {
            $esiHelper = new Esi;
            $token = $esiHelper->GetRefreshToken($char);
            $this->esi = $esiHelper->SetupEsiAuthentication($token);
        } else {
            $this->esi = $esi;
        }
    }

    public function GetCorporationContracts() {
        //Attempt to get the esi Contract data
        try {
            $contracts = $this->esi->invoke('get', '/corporations/{corporation_id}/contracts/', [
                'corporation_id' => $this->corpId,
            ]);
        } catch (RequestFailedException $e) {
            Log::critical("Failed to get corporation contracts");
            return null;
        }

        return $contracts;
    }

    public function ProcessCorporationContracts($contracts) {
        foreach($contracts as $contract) {
            if(Contract::where(['contract_id' => $contract->contract_id])->count() == 0) {
                $this->SaveNewContract($contract);
            } else {
                $this->UpdateContract($contract);
            }
        }
    }

    private function GetContractItems($incomingContract) {
        //Get the contract items from esi
        try {
            $items = $this->esi->invoke('get', '/corporations/{corporation_id}/contracts/{contract_id}/items', [
                'corporation_id' => $this->corpId,
                'contract_id' => $incomingContract->contract_id,
            ]);
        } catch(RequestFailedException $e) {
            Log::critical("Failed to get items for corporation contract with id " & $incomingContract->contract_id);
            return null;
        }

        return $items;
    }

    private function SaveNewContract($contract) {
        $con = new Contract;
        
        $con->acceptor_id = $contract->acceptor_id;
        $con->assignee_id = $contract->assignee_id;
        $con->availability = $contract->availability;
        if(isset($contract->buyout)) {
            $con->buyout = $contract->buyout;
        }
        if(isset($contract->collateral)) {
            $con->collateral = $contract->collateral;
        }
        $con->contract_id = $contract->contract_id;
        if(isset($contract->date_accepted)) {
            $con->date_accepted = $this->esi->DecodeDate($contract->date_accepted);
        }
        if(isset($contract->date_completed)) {
            $con->date_completed = $this->esi->DecodeDate($contract->date_completed);
        }
        $con->date_expired = $this->esi->DecodeDate($contract->date_expired);
        $con->date_issued = $this->esi->DecodeDate($contract->date_issued);
        if(isset($contract->days_to_complete)) {
            $con->days_to_complete = $contract->days_to_complete;
        }
        if(isset($contract->end_location_id)) {
            $con->end_location_id = $contract->end_location_id;
        }
        $con->for_corporation = $contract->for_corporation;
        $con->issuer_corporation_id = $contract->issuer_corporation_id;
        if(isset($contract->price)) {
            $con->price = $contract->price;
        }
        if(isset($contract->reward)) {
            $con->reward = $contract->reward;
        }
        if(isset($contract->start_location_id)) {
            $con->start_location_id = $contract->start_location_id;
        }
        $con->status = $contract->status;
        if(isset($contract->title)) {
            $con->title = $contract->title;
        }
        $con->type = $contract->type;
        if(isset($contract->volume)) {
            $con->volume = $contract->volume;
        }
        //Save the contract to the database
        $con->save();

    }

    private function UpdateContract($contract) {

    }
}