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
    //private $char;
    private $reactionRecipeArr;
    private $recipeId;
    private $charId;

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
    public function CreateReactionTree($recipeName) {

        //Find $reaction_ID in reaction lookup table
        //Call FindIngredients($reaction_ID)

        //Add input_IDs and input names to tree

        //Call CreateReactionTree on input names
        //Repeat until tree is complete

        
    }

    /**
     * Given a recipe name, find it's ingredients
     */
    public function FindIngredients($recipeName) {
        //Find reaction inputs in reaction input lookup table

        //return all input_IDs, names, and quantities
    }

    /**
     * Given a reaction chain, desired number of reaction slots, desired number of blueprintes, and maximum time per slot (optional)
     * Calculate optimal job slot distribution for a given reaction process
     */
    public function DetermineJobSlotDistribution($reactionTreeArr, $numSlots, $numBlueprintsArr, $maxJobDuration = 24){
        
        
        //Return runs per reaction per slot and total reaction time
    }

    /**
     * Given reaction recipe, skills, and structure bonuses
     * Calculate job times
     */
    public function CalculateJobTime($reaction_ID, $skills, $structureBonuses){

        
        //Return job time
    }

 }

 ?>