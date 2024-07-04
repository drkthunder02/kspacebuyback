<?php

namespace App\Models\Buyback;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;

    //Table Name
    protected $table = 'buyback_station';

    //Primary Key
    public $primaryKey = 'contract_id';

    // Timestamps
    public $timestamps = true;

    /**
     * The attributes that are mass assignable
     * 
     * @var array
     */

     protected $fillable = [
        'contract_id',
        'station_id',
        'station_name',
        'station_allowed_dock',
     ];

     public function contractId() {
        return $this->belongsTo(App\Models\Buyback\Contract::class, 'contract_id', 'contract_id');
     }
}
