<?php

namespace App\Models\Buyback;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    //Table Name
    protected $table = 'buyback_contract';

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
        'contract_name',
        'station_id',
        'station_name',
        'station_allowed_dock',
        'contract_state',
     ];

     public function contractItems() {
        return $this->hasMany(App\Models\Buyback\ContractItems::class, 'contract_id', 'contract_id');
     }
}
