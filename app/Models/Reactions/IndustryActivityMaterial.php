<?php

namespace App\Models\Reactions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder; 
use app\Traits\HasCompositePrimaryKey;

class IndustryActivityMaterial extends Model
{
    use HasFactory;

    //Table Name
    public $table = 'industryActivityMaterials';

    //Primary Key
    public $primaryKey = ['typeID', 'activityID'];

    //Timestamps
    public $timestamps = false;

    /**
     * The attributes that are mass assignable
     * 
     * @var array
     */
    protected $fillable = [
        'typeID',
        'activityID',
        'materialTypeID',
        'quantity',
    ];
}
