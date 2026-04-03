<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SecurityQuestionSeeder extends Seeder
{
    public function run(): void
    {
        $preguntas = [
            '¿Cuál es el nombre de tu primera mascota?',
            '¿En qué ciudad naciste?',
            '¿Cuál es el segundo nombre de tu madre?',
        ];

        $datos= [];
        
        foreach ($preguntas as $pregunta) {
            $datos[] = [
                'pregunta' => $pregunta,
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
            ];
        }

        DB::table('security_questions')->insert($datos);
    }
}
