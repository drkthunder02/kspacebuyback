<?php

namespace App\Models\Buyback;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractItem extends Model
{
    use HasFactory;

    //Table Name
    protected $table = 'buyback_contract_items';

    ///Primary Key
    public $primaryKey = 'id';

    // Timestamps
    public $timestamps = false;

    /**
     * The attributes that are mass assignable
     * 
     * @var array
     */
    protected $fillable = [
        'contract_id',
        'item_id',
        'item_name',
        'jita_price',
        'adjusted_price',
        'average_price',
    ];

    public function contract() {
        return $this->belongsTo(App\Models\Contracts\Contracts::class, 'contract_id', 'contract_id');
    }
}
