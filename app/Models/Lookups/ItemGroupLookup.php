<?php

namespace App\Models\Lookups;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemGroupLookup extends Model
{
    use HasFactory;

    //Table Name
    protected $table = 'item_group_lookup';

    //Primary Key
    public $primaryKey = 'item_id';

    // Timestamps
    public $timestamps = true;

    /**
     * The attributes that are mass assignable
     * 
     * @var array
     */

     protected $fillable = [
        'item_id',
        'group_id',
     ];
}
