<?php

namespace App\Models\Buyback;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payout extends Model
{
    use HasFactory;

    //Table Name
    protected $table = 'buyback_payout';

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
        'payee_id',
        'payee_name',
        'payer_id',
        'payer_name',
        'payment_amount',
     ];

     public function contractId() {
        return $this->belongsTo(App\Models\Buyback\Contracts::class, 'contract_id', 'contract_id');
     }
}

