<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class DataType extends Model {
    /**
     * The database table used by a model
     */
    protected $table='data_types';

    /**
     * The attributes that are  mass assignable
     */
    protected $fillable=[
        'type'
    ];



}
