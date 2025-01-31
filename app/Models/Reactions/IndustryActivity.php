<?php

namespace App\Models\Reactions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder; 
use app\Traits\HasCompositePrimaryKey;

class IndustryActivity extends Model
{
    use HasFactory;

    //Table Name
    public $table = 'industryActivity';

    //Primary Key
    public $primaryKey = ['typeID', 'activityID'];

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
        'typeID',
        'activityID',
        'time',
    ];

    
}
