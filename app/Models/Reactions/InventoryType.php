<?php

namespace App\Models\Reactions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryType extends Model
{
    use HasFactory;

    //Table Name
    public $table = 'invType';

    //Primary Key
    public $primaryKey = 'typeId';

    //Timestamps
    public $timestamps = false;

    /**
     * The attributes that are mass assignable
     * 
     * @var array
     */
    protected $fillable = [
        'typeID',
        'groupID',
        'typeName',
        'description',
        'mass',
        'volume',
        'capacity',
        'portionSize',
        'raceID',
        'basePrice',
        'published',
        'marketGroupID',
        'iconID',
        'soundID',
        'graphicID',
    ];
}
