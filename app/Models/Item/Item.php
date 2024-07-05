<?php

namespace App\Models\Item;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = "item";

    public $primaryKey = "item_id";

    public $timestamps = true;

    /**
     * The attributes that are mass assignable
     * 
     * @var array
     */
    protected $fillable = [
        'capacity',
        'description',
        'mass',
        'name',
        'packaged_volume',
        'portion_size',
        'published',
        'radius',
        'type_id',
        'volume',
    ];

    public function graphic() {
        return $this->hasOne(App\Models\Item\Graphic::class, 'item_id', 'item_id');
    }

    public function group() {
        return $this->hasOne(App\Models\Item\Group::class, 'item_id', 'item_id');
    }

    public function icon() {
        return $this->hasOne(App\Models\Item\Icon::class, 'item_id', 'item_id');
    }

    public function meta() {
        return $this->hasOne(App\Models\Item\Meta::class, 'item_id', 'item_id');
    }

    public function multiplier() {
        return $this->hasOne(App\Models\Item\Multiplier::class, 'item_id', 'item_id');
    }

    public function price() {
        return $this->hasOne(App\Models\Item\Price::class, 'item_id', 'item_id');
    }
}
