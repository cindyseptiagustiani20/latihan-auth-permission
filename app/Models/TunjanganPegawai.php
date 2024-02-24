<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TunjanganPegawai extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_pegawai',
        'id_tunjangan',
        'jumlah',
        'total'
    ];
    
    public function Tunjangan() {
        return $this->belongsTo(Tunjangan::class, 'id_tunjangan', 'id')->withTrashed();
    }
}
