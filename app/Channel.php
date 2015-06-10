<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model {

    /**
     * Database table used by a model
     */
    protected $table='channels';

    /**
     * Attributes that are assignable
     */
    protected $fillable=[
        'device_id',
        'description',
        'data_type',
        'updated'
    ];

    public function device()
    {
        return $this->belongsTo('App\Device');
    }

    public function data()
    {
        return $this->hasMany('App\DataLog');

    }

    public function dataType()
    {
        return $this->hasOne('App\DataType','id','data_type');
    }

    /**
     * @return mixed
     */
    public function getDataTypeListAttribute()
    {
        return $this->dataType()->lists('id');
    }
}
