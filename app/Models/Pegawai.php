<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nama_pegawai', 
        'id_jabatan',
        'id_ptkp',
        'status',
        'agama',
        'alamat', 
        'npwp'
    ];

    public function PTKP() {
        return $this->belongsTo(PTKP::class, 'id_ptkp', 'id')->withTrashed();
    }

    public function Jabatan() {
        return $this->belongsTo(Jabatan::class, 'id_jabatan', 'id')->withTrashed();
    }
}
