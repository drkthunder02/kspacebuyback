<?php

namespace App\Library\Helpers;

//Internal Libraries
use Log;
use Carbon;

//Seat Stuff
use Seat\Eseye\Cache\NullCache;
use Seat\Eseye\Configuration;
use Seat\Eseye\Containers\EsiAuthentication;
use Seat\Eseye\Eseye;
use Seat\Eseye\Exceptions\RequestFailedException;
use App\Library\Esi\Esi;

//Models
use App\Models\Lookups\ItemGroupLookup;
use App\Models\Lookups\ItemLookup;
use App\Models\Lookups\ItemPriceLookup;

class MarketHelper {
    //Variables
    private $esi;
    private $solarSystemId;
    private $regionId;

    public function __construct() {
        $esiHelper = new Esi;
        $this->esi = $esiHelper->SetupEsiAuthentication();

        $this->solarSystemId = 30000142;
        $this->regionId = 10000002;
    }

    public function ItemMarketInfoLookup($itemId) {
        $item = ItemPriceLookup::where([
            'item_id' => $itemId
        ])->first();

        return $item;
    }

    /**
     * Update the price of an item into the table
     */
    public function UpdatePriceByRegion($itemId) {

    }
}

?>
