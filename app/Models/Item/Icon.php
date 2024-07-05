<?php

namespace App\Models\Item;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Icon extends Model
{
    use HasFactory;

    protected $table = "item_icon";

    public $primaryKey = "item_id";

    public $timestamps = true;

    /**
     * The attributes that are mass assignable
     * 
     * @var array
     */
    protected $fillable = [
        'item_id',
        'icon_id',
    ];

    public function item() {
        return $this->belongsTo(App\Models\Item\Item::class, 'item_id', 'item_id');
    }
}
