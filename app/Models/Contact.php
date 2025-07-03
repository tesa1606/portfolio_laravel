<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['alamat', 'nomor_telepon', 'email', 'status_publish'];

}
