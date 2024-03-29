<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Potongan extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'nama_potongan',
        'jenis',
        'besar'
    ];
}
