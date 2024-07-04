<?php

namespace App\Models\Eve;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    //Table Name
    protected $table = 'eve_contract';

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
        'acceptor_id',
        'assignee_id',
        'availability',
        'buyout',
        'collateral',
        'date_accepted',
        'date_completed',
        'date_expired',
        'date_issued',
        'days_to_complete',
        'end_location_id',
        'for_corporation',
        'issuer_corporation_id',
        'price',
        'reward',
        'start_location_id',
        'status',
        'title',
        'type',
        'volume',
     ];
}
