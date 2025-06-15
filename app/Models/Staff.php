<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $guarded = ['id'];


    protected $cast = [
        'jabatan' => 'array'
    ];

    public function jabatans()
    {
        return $this->hasMany(Jabatan::class);
    }
}
