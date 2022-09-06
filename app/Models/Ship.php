<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    use HasFactory;

    protected $table = 'Ship';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nama_kapal',
        'schedule',
        'kedatangan',
        'keberangkatan',
        'status',
    ];

}
