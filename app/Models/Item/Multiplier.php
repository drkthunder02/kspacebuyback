<?php

namespace App\Models\Item;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Multiplier extends Model
{
    use HasFactory;

    protected $table = "item_multiplier";

    public $primaryKey = "item_id";

    public $timestamps = true;

    /**
     * The attributes that are mass assignable
     * 
     * @var array
     */
    protected $fillable = [
        'item_id',
        'item_multiplier',
    ];

    public function item() {
        return $this->belongsTo(App\Models\Item\Item::class, 'item_id', 'item_id');
    }
}
