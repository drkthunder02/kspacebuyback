<?php

namespace App\Jobs\Commands\Items;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

//Application Library
use Log;
use Carbon;
use App\Library\Helpers\ItemHelper;
use App\Library\Helpers\MarketHelper;
use App\Library\Esi\Esi;
use Seat\Eseye\Exceptions\RequestFailedException;
use Seat\Eseye\Cache\NullCache;

//Models
use App\Models\Lookups\ItemPriceLookup;
use App\Models\Lookups\ItemLookup;

class UpdateSingleItemPricingJob implements ShouldQueue {
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Variables
     * 
     * @var unsignedLong
     */
    private $item_id;

    /**
     * Timeout in seconds
     * 
     * @var int
     */
    public $timeout = 60;

    /**
     * Retries
     * 
     * @var int
     */
    public $retries = 3;

    /**
     * Create a new job instance
     */
    public function __construct($item) {
        $this->item_id = $item['item_id'];
        $this->connection = 'redis';
        $this->onQueue('items');
    }

    /**
     * Execute the job
     * 
     * @return void
     */
    public function handle() {
        //Setup the esi handler
        $esiHelper = new Esi;
        $market = new MarketHelper;

        $token = $esiHelper->GetRefreshToken();
        $esi = $esiHelper->SetupEsiAuthentication($token);

        //refresh the token if needed
        if($esiHelper->TokenExpired($token)) {
            $token = $esiHelper->GetRefreshToken();
            $esi = $esiHelper->SetupEsiAuthentication($token);
        }

        $pages = $market->GetRegionMarketOrderPages($this->item_id);

        if($pages == 0) {
            Log::critical("Failed to get the number of order pages");
            $this->delete();
        }

        for($i = 1; $i <= $pages; $i++) {
            $tempOrders = $esi->page($i)
                              ->invoke('get', '/markets/{region_id}/orders/', [
                                'region_id' => 10000002,
                              ]);
            
            //Process the page and add to array before continuing
            dump($tempOrders);
        }
    }
}