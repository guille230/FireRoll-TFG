<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partidas extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'partidas';

    protected $fillable = [
        'nombre',
        'creator',
        'max',
        'system',
        'type',
        'duration',
        'creationdate',
        'description',
        'tags'
    ];
}

