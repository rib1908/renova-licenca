<?php

namespace Database\Seeders;

use App\Models\Registro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegistroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Registro::create(
            [
                'nome' => 'trafic',
                'dns' => 'trafic.mesquita.rj.gov.br',
                'ip' => '192.168.76.100',
                'data_registro' => '2024-10-10',
            ]
        );
    }
}
