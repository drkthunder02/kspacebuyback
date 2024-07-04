<?php

namespace App\Models\Reactions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndustryActivityProduct extends Model
{
    use HasFactory;

    //Table Name
    public $table = 'industryActivityProducts';

    //Primary Key
    public $primaryKey = 'typeID';

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
        'productTypeID',
        'quantity',
    ];
}
