<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendingRegistration extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'password',
        'telepon',
        'tanggal_lahir',
        'jenis_kelamin',
        'otp',
    ];
}
