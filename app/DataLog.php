<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class DataLog extends Model {


    protected $table='data_logs';

    /**
     * Attributes that are mass assignable
     * @var array
     */
    protected $fillable=[
        'channel_id',
        'data'
    ];

    public function channel()
    {
        return $this->belongsTo('App\Channel');
    }

}
