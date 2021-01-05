<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserMembership extends Model
{
    protected $table = 'user_membership';

    protected $fillable = [
        'user_id',
        'membership_id'
    ];
}
