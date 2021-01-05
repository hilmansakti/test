<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class UserCreditCard extends Model
{
    protected $table = 'user_credit_card';
    
    protected $fillable = [
        'user_id',
        'number',
        'type',
        'exp_date'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public static $createRules = [
        'user_id'   => 'required',
        'number'    => 'required|numeric|digits:16',
        'type'      => 'required',
        'exp_date'  => 'required',
    ];

    public function setExpDateAttribute($value) {
        $this->attributes['exp_date'] = Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d');
    }

    public function getExpDateAttribute($value)
    {
        return Carbon::parse($value)->format('m/d/Y');
    }

}
