<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

/**
 * Class User
 * @package App
 */
class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'level',
        'password',
        'accessKey'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Each user can have more than one device
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public  function devices()
    {
        return $this->hasMany('App\Device');
    }

    public function userType()
    {
        return $this->hasOne('App\UserType','id','level');
    }

    public function isAdministrator()
    {   $type=$this->userType()->firstOrFail();
        if($type->type == "Administrator")
        {
            return true;
        }

        return false;
    }

    /**
     * @return mixed
     */
    public function getUserTypeListAttribute()
    {
        return $this->userType()->lists('id');
    }

}
