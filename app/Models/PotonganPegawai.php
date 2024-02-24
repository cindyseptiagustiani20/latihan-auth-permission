<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PotonganPegawai extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_pegawai',
        'id_potongan',
        'jumlah',
        'total'
    ];

    public function Potongan() {
        return $this->belongsTo(Potongan::class, 'id_potongan', 'id')->withTrashed();
    }
}
