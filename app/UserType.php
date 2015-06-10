<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model {

    /**
     * The database table used by a model
     */
    protected $table='user_types';

    /**
     * The attributes that are fillable
     */
    protected $fillable=[
        'type'
    ];


}
