<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PKP extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'pkp';
    protected $fillable = [
        'min',
        'max',
        'persen'
    ];
}
