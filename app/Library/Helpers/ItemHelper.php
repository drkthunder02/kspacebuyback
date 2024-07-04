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

class ItemHelper {
    //Variables
    private $esi;

    public function __construct() {
        $esiHelper = new Esi;
        $this->esi = $esiHelper->SetupEsiAuthentication();
    }

    public function ItemNameToId($itemName) {
        $item = ItemLookup::where([
            'name' => $itemName,
        ])->first();

        if($item != null) {
            return $item->type_id;
        } else {
            try {
                $response = $this->esi->setBody(array(
                    $itemName,
                ))->invoke('post', '/universe/ids/');
            } catch(RequestFailedException $e) {
                printf("Failed to get the item information");
                Log::warning('Failed to get item information from /universe/');
                return null;
            }

            if(isset($response->inventory_types)) {
                return $response->inventory_types[0]->id;
            } else {
                return null;
            }
        }
    }

    public function ItemIdToName($itemId) {
        //Check if the item is stored in our own database first
        $item = $this->LookupItem($itemId);

        //If the item is found, return it, otherwise, do some esi to find it.
        if($item != null) {
            return $item->name;
        } else {
            try {
                $response = $this->esi->invoke('get', '/universe/types/{type_id}/', [
                    'type_id' => $itemId,
                ]);
            } catch(RequestFailedException $e) {
                printf("Failed to get the item name from the id.\r\n");
                var_dump($e);
                printf("\r\n");
                Log::warning('Failed to get item information from /universe/types/{type_id}/ in LookupHelper.');
                return null;
            }

            if(isset($response->description)) {
                $this->StoreItem($response);

                return $response->name;
            } else {
                return null;
            }
        }
    }

    private function LookupItem($itemId) {
        $item = ItemLookup::where([
            'type_id' => $itemId,
        ])->first();

        return $item;
    }

    private function StoreItem($item) {
        $newItem = new ItemLookup;
        if(isset($item->capacity)) {
            $newItem->capacity = $item->capacity;
        }
        $newItem->description = $item->description;
        if(isset($item->graphic_id)) {
            $newItem->graphic_id = $item->graphic_id;
        }
        $newItem->group_id = $item->group_id;
        if(isset($item->icon_id)) {
            $newItem->icon_id = $item->icon_id;
        }
        if(isset($item->market_group_id)) {
            $newItem->market_group_id = $item->market_group_id;
        }
        if(isset($item->mass)) {
            $newItem->mass = $item->mass;
        }
        $newItem->name = $item->name;
        if(isset($item->packaged_volume)) {
            $newItem->packaged_volume = $item->packaged_volume;
        }
        if(isset($item->portion_size)) {
            $newItem->portion_size = $item->portion_size;
        }
        $newItem->published = $item->published;
        if(isset($item->radius)) {
            $newItem->radius = $item->radius;
        }
        $newItem->type_id = $item->type_id;
        if(isset($item->volume)) {
            $newItem->volume = $item->volume;
        }
        $newItem->save();
    }
}

?>