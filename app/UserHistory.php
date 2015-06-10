<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UserHistory extends Model {

    /**
     * Database table used by a model
     */
    protected $table='user_histories';

    /**
     * Attributes that are assignable
     */
    protected $fillable=[
        'userId',
        'metadata',
        'data',
        'updated'
    ];
}
