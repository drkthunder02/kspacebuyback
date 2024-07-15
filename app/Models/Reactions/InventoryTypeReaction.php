<?php

namespace App\Models\Reactions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder; 
use app\Traits\HasCompositePrimaryKey;

class InventoryTypeReaction extends Model
{
    use HasFactory;

    //Table Name
    public $table = 'invTypeReactions';

    //Primary Key
    public $primaryKey = ['reactionTypeID', 'input', 'typeID'];

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
        'reactionTypeID',
        'input',
        'typeID',
        'quantity',
    ];


}