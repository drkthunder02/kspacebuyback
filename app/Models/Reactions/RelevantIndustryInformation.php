<?php

namespace App\Models\Reactions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reactions\IndustryInputs;

class RelevantIndustryInformation extends Model
{
    use HasFactory;

    //Table Name
    public $table = 'relevantIndustryInformation';

    //Primary Key
    public $primaryKey = ['productTypeId'];

    //Timestamps
    public $timestamps = false;

    //Incrementing
    public $incrementing = false;

    /**
     * The attributes that are mass assignable
     * 
     * @var array
     */
    protected $fillable = [
        'productTypeId',
        'productName',
        'productQuantity',
        'baseJobTime',
        'baseJobCost',
        'jobType'
    ];

    public function inputs() {
        return $this->hasOne('\App\Models\Reactions\IndustryInputs', 'productTypeID', 'productTypeID');
    }

    public function getIngredients($typeID){
        $ingredients = IndustryInputs::find($typeID);
        return $ingredients;
    }

    public function getRecipe($typeID){
        $recipe = RelevantIndustryInformation::find($typeID);
        return $recipe;
    }
}
