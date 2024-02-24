<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tunjangan extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'nama_tunjangan',
        'jenis',
        'besar'
    ];
}
