<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ship_Ex extends Model
{
    use HasFactory;
    use HasFactory;

    protected $table = 'Ship_Ex';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nama_kapal',
        'path_logo',
    ];
}
