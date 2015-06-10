<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Device extends Model {

    /**
     * The database table used by a model
     */
    protected $table='devices';

    /**
     * Attributes that are assignable
     */
    protected $fillable= [
        'user_id',
        'name',
        'key',
        'description',
        'private'
    ];

    /**
     * Attributes excluded from the JSON form
     */
    protected $hidden=[

    ];

    /**
     *Each device belongs to a user
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function channelsID()
    {
        return $this->hasMany('App\Channel')->select(array('id'));

    }
    public function channels()
    {
        return $this->hasMany('App\Channel');

    }


}
