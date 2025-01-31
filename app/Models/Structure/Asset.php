<?php

namespace App\Models\Structure;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    /**
     * Required scope:
     * esi-assets.read_corporation_assets.v1
     */

    //Table Name
    public $table = 'corporation_assets';

    //Timestamps
    public $timestamps = true;

    //Primary Key
    public $primaryKey = 'id';

    /**
     * The attributes that are mass assignable
     * 
     * @var array
     */
    protected $fillable = [
        'is_blueprint_copy',
        'is_singleton',
        'item_id',
        'location_flag',
        'location_id',
        'location_type',
        'quantity',
        'type_id',
        'created_at',
        'updated_at',
    ];

    public function structure() {
        return $this->belongsTo(App\Models\Structure\Structure::class, 'structure_id', 'location_id');
    }
}
