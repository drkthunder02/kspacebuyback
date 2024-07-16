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
use App\Library\Helpers\Recipe;

//App Models
use App\Models\Esi\EsiToken;
use App\Models\Esi\EsiScope;
use App\Models\Reactions\IndustryActivity;
use App\Models\Reactions\IndustryActivityMaterial;
use App\Models\Reactions\IndustryActivityProduct;
use App\Models\Reactions\InventoryType;
use App\Models\Reactions\InventoryTypeReaction;
use App\Models\Reactions\RelevantIndustryInformation;
use App\Models\Looksup\ReactionLookup;
use PHPUnit\Event\Code\Test;
use Predis\Command\Redis\APPEND;


class ReactionHelper {

    private $esi;
    private $charId;
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


        $this->recipeId = [
            'Manufacturing' => 1,
            'ResearchingTimeEfficiency' => 3,
            'ResearchingMaterialEfficiency' => 4,
            'Copying' => 5,
            'Invention' => 8,
            'Reactions' => 11,
        ];
    }

    /**
     * Create a tree of data for a manufacturing or reaction recipe product to be displayed later or modified.
     * @param int
     */
    public function CreateReactionTree($productTypeId) {
        
        //Create recipe object
        $recipe = new recipeObj;
        $information = new RelevantIndustryInformation;

        //Try to retrieve recipe from database
        $recipeInformation = $information->getRecipe($productTypeId);
        
        //Check if recipe is present
        if(!is_null($recipeInformation)){

            //Store recipe information in recipe object
            $recipe->recipeInformation = $recipeInformation;

            //Retrieve inputs and store in recipe object
            $recipe->inputMaterials = $information->getIngredients($productTypeId);

            /**Call CreateReactionTree on input names
             *Pray to recursion gods
             *Repeat until tree is complete
            */
            foreach($recipe->inputMaterials as $ingredient){
                //Check if recursion found a null return
                $inputRecipe = $this->CreateReactionTree($ingredient->inputTypeId);
                if(!is_null($inputRecipe)){
                    $recipe->inputRecipes->append($inputRecipe);
                }
            }

            //Return recipe tree
            return $recipe;
        }
        //If recipe isn't present, return null
        else{
            return null;
        }
    }

    /**
     * Combine all input materials in a given reaction tree
     * @param recipeObj
     */
    public function combineInputs($recipe){

        $materials = array();

        //iterate through input materials array
        foreach($recipe->inputMaterials as $ingredient){
            
            //check if ingredient is already present in $materials array
            if(isset($materials[$ingredient->inputTypeId])){
                //add amount to existing entry
                $materials[$ingredient->inputTypeId]['quantity'] += $ingredient->inputQuantity;
            }
            else{
                //create new entry
                $materials[$ingredient->inputTypeId]['quantity'] = $ingredient->inputQuantity;
                $materials[$ingredient->inputTypeId]['name'] = $ingredient->inputName;
            }

        }
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