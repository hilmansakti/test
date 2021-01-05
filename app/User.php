<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email', 
        'dob',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * address
     */
    public function addresses() {
        return $this->hasMany('App\Models\Address');
    }

    public function setDobAttribute($value) {
        $this->attributes['dob'] = Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d');
    }

    public function getDobAttribute($value)
    {
        return Carbon::parse($value)->format('m/d/Y');
    }
}
