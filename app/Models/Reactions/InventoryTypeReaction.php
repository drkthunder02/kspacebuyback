<?php

namespace App\Models\Reactions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryTypeReaction extends Model
{
    use HasFactory;

    //Table Name
    public $table = 'invTypeReactions';

    //Primary Key
    public $primaryKey = ['reactionTypeID', 'input', 'typeID'];

    //Timestamps
    public $timestamps = false;

    /**
     * The attributes that are mass assignable
     * 
     * @var array
     */
    protected $fillable = [
        'reactionTypeID',
        'input',
        'typeID',
        'quantity',
    ];

    /**
     * Set the keys for a save update query
     * 
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function setKeysForSaveQuery(Builder $query) {
        $keys = $this->getKeyName();
        if(!is_array($keys)) {
            return parent::setKeysForSaveQuery($query);
        }

        foreach($keys as $keyName) {
            $query->wehre($keyName, '=', $this->getKeyForSaveQuery($keyName));
        }

        return $query;
    }

    /**
     * Get the primary key value for a save query
     * 
     * @param mixed $keyName
     * @return mixed
     */
    protected function getKeyForSaveQuery($keyname = null) {
        if(is_null($keyName)) {
            $keyName = $this->getKeyName();
        }

        if(isset($this->original[$keyName])) {
            return $this->original[$keyName];
        }

        return $this->getAttribute($keyName);
    }
}
