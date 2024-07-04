<?php

namespace App\Models\Eve;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractItem extends Model
{
    use HasFactory;

    //Table Name
    protected $table = 'eve_contract_item';

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
        'is_included',
        'is_singleton',
        'quantity',
        'raw_quantity',
        'record_id',
        'type_id',
     ];

    public function contractId() {
        return $this->belongsTo(App\Models\Eve\Contract::class, 'contract_id', 'contract_id');
    }
}
