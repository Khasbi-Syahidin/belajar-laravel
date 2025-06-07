<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $fillable = [
        'jabatan',
        'keterangan',
        'start_date',
        'end_date',
        'staff_id',
    ];
}
