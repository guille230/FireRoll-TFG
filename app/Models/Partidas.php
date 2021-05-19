<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partidas extends Model
{
    use HasFactory;

    protected $table = 'partidas';

    protected $fillable = [
        'users',
        'max',
        'system',
        'type',
        'duration',
        'creationdate',
        'description',
        'tags'
    ];
}

