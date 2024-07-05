<?php

namespace App\Models\Item;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected $table = "item_price";

    public $primaryKey = "item_id";

    public $timestamps = true;

    /**
     * The attributes that are mass assignable
     * 
     * @var array
     */
    protected $fillable = [
        'item_id',
        'item_price',
    ];

    public function item() {
        return $this->belongsTo(App\Models\Item\Item::class, 'item_id', 'item_id');
    }
}
