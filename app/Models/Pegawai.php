<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pegawai extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'pegawai';

    protected $fillable = [
        'id',
        'nama',
        'alamat',
        'nomortelepon',
        'email',
        'jabatan',
        'departemen'
    ];
}
