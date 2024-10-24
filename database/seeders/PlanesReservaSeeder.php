<?php

namespace Database\Seeders;

use App\Models\PlanesReserva;
use Illuminate\Database\Seeder;

class PlanesReservaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $planes = [
            [
                'titulo' => 'TITULO 1',
                'items' => json_encode([
                    'elementos' => [
                        [
                            'icono' => '<i class="fa-brands fa-instagram"></i>',
                            'subtitulo' => 'Subtitulo 1',
                            'descripcion' => 'Descripcion 1',
                        ],
                    ],
                ]),
                'activo' => true,
            ],
            [
                'titulo' => 'TITULO 2',
                'items' => json_encode([
                    'elementos' => [
                        [
                            'icono' => '<i class="fa-brands fa-instagram"></i>',
                            'subtitulo' => 'Subtitulo 2',
                            'descripcion' => 'Descripcion 2',
                        ],
                    ],
                ]),
                'activo' => true,
            ],
            [
                'titulo' => 'TITULO 3',
                'items' => json_encode([
                    'elementos' => [
                        [
                            'icono' => '<i class="fa-brands fa-instagram"></i>',
                            'subtitulo' => 'Subtitulo 3',
                            'descripcion' => 'Descripcion 3',
                        ],
                    ],
                ]),
                'activo' => true,
            ],
        ];

        // Utiliza el método insert para crear múltiples registros
        PlanesReserva::insert($planes);
    }
}
