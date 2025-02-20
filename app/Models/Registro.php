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


    public function getRegistrosPesquisarIndex(string $search = '')
    {
        $registro = $this->where(function ($query) use ($search) {
            if ($search) {
                $query->where('nome', $search);
                $query->orWhere('nome', 'LIKE', "%{$search}%");
            }
        })->get();

        return $registro;
    }
}
