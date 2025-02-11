<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{

    protected $fillable = [
            'nome',
            'dns',
            'ip',
            'data_registro',
    ];
}
