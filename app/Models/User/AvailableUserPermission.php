<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class AvailableUserPermission extends Model
{
    /**
     * Database Table
     */
    protected $table = 'available_user_permissions';

    //Primary Key
    public $primaryKey = 'id';

    /**
     * Timestamps enabled for the rows
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable
     */
    protected $fillable = [
        'permission',
        'description',
    ];

    
}
