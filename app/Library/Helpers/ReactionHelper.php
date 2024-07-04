<?php

namespace App\Library\Helpers;

//Internal Library
use Log;

//App Library
use App\Jobs\Library\JobHelper;
use Seat\Eseye\Exceptions\RequestFailedException;
use App\Library\Esi\Esi;
use App\Library\Helpers\LookupHelper;
use App\Library\Helpers\AssetHelper;

//App Models
use App\Models\Esi\EsiToken;
use App\Models\Esi\EsiScope;
use App\Models\Reactions\IndustryActivity;
use App\Models\Reactions\IndustryActivityMaterial;
use App\Models\Reactions\IndustryActivityProduct;
use App\Models\Reactions\InventoryType;
use App\Models\Reactions\InventoryTypeReaction;
use App\Models\Looksup\ReactionLookup;

class ReactionHelper {

    private $esi;
    private $char;
    private $reactionRecipeArr;
    private $recipeId;

    public function __construct($char, $esi = null) {
        $this->charId = $char;
        if($esi == null) {
            $esiHelper = new Esi;
            $token = $esiHelper->GetRefreshToken($char);
            $this->esi = $esiHelper->SetupEsiAuthentication($token);
        } else {
            $this->esi = $esi;
        }

        $reactionRecipeArr = array();

        $recipeId = [
            'Manufacturing' => 1,
            'ResearchingTimeEfficiency' => 3,
            'ResearchingMaterialEfficiency' => 4,
            'Copying' => 5,
            'Invention' => 8,
            'Reactions' => 11,
        ];
    }

    /**
     * Create a tree of data for a recipe to be displayed later or modified.
     */
    public function CreateReactionTree($recipe) {

    }

    /**
     * Given a recipe name, find it's ingredients
     */
    public function FindIngredients($recipe) {

    }
 }

 ?>