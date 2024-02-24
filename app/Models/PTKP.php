<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PTKP extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'ptkp';
    protected $fillable = [
        'nama_ptkp',
        'jumlah'
    ];
}
