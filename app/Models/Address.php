<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'address';
    
    protected $fillable = [
        'user_id',
        'jalan',
        'kelurahan',
        'kecamatan',
        'kota',
        'provinsi',
        'kode_pos'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public static $createRules = [
        'jalan'     => 'required|min:1|max:255',
        'kelurahan' => 'required|min:1|max:50',
        'kecamatan' => 'required|min:1|max:50',
        'kota'      => 'required|min:1|max:50',
        'provinsi'  => 'required|min:1|max:100',
        'kode_pos'  => 'required|min:1|max:15'
    ];
}
