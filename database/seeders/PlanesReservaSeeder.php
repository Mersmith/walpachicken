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
                'icono' => '<i class="fa-brands fa-instagram"></i>',
                'titulo' => 'CELEBRACIÓN DE CUMPLEAÑOS',
                'reservas' => json_encode(
                    [
                        [
                            'titulo' => '5 a 10 personas',
                            'lista' => [
                                [
                                    'icono' => '<i class="fa-brands fa-instagram"></i>',
                                    'subtitulo' => 'Perifoneo de felicitación personalizado',
                                    'descripcion' => '',
                                ],
                                [
                                    'icono' => '<i class="fa-brands fa-instagram"></i>',
                                    'subtitulo' => '1 entrada de cortesía a elección:',
                                    'descripcion' => 'Tequeños de la leña, mollejitas a la huancaína o pastel de choclo',
                                ],
                                [
                                    'icono' => '<i class="fa-brands fa-instagram"></i>',
                                    'subtitulo' => '1 postre o cóctel de cortesia para el cumpleañero.',
                                    'descripcion' => '',
                                ],
                            ],
                        ],
                        [
                            'titulo' => '11 a 20 personas',
                            'lista' => [
                                [
                                    'icono' => '<i class="fa-brands fa-instagram"></i>',
                                    'subtitulo' => 'Perifoneo de felicitación personalizado',
                                    'descripcion' => '',
                                ],
                                [
                                    'icono' => '<i class="fa-brands fa-instagram"></i>',
                                    'subtitulo' => '1 entrada de cortesía a elección:',
                                    'descripcion' => 'Tequeños de la leña, mollejitas a la huancaína o pastel de choclo',
                                ],
                                [
                                    'icono' => '<i class="fa-brands fa-instagram"></i>',
                                    'subtitulo' => '1 fondo de cortesía a elección:',
                                    'descripcion' => 'Lasagna de ají de pollo a la leña, Pechugón original, Arroz meloso oriental, 1⁄4 de pollo clásico acompañado de 1 vaso de maracuyá',
                                ],
                                [
                                    'icono' => '<i class="fa-brands fa-instagram"></i>',
                                    'subtitulo' => '1 postre o cóctel de cortesia para el cumpleañero.',
                                    'descripcion' => '',
                                ],
                            ],
                        ],
                        [
                            'titulo' => '21 a más personas',
                            'lista' => [
                                [
                                    'icono' => '<i class="fa-brands fa-instagram"></i>',
                                    'subtitulo' => 'Perifoneo de felicitación personalizado',
                                    'descripcion' => '',
                                ],
                                [
                                    'icono' => '<i class="fa-brands fa-instagram"></i>',
                                    'subtitulo' => '1 entrada de cortesía a eligir cada 10 personas dentro de la reserva',
                                    'descripcion' => 'Tequeños de la leña, mollejitas a la huancaína o pastel de choclo',
                                ],
                                [
                                    'icono' => '<i class="fa-brands fa-instagram"></i>',
                                    'subtitulo' => '1 fondo de cortesía a elección:',
                                    'descripcion' => 'Lasagna de ají de pollo a la leña, Pechugón original, Arroz meloso oriental, 1⁄4 de pollo clásico acompañado de 1 vaso de maracuyá',
                                ],
                                [
                                    'icono' => '<i class="fa-brands fa-instagram"></i>',
                                    'subtitulo' => '1 postre o cóctel de cortesia para el cumpleañero.',
                                    'descripcion' => '',
                                ],
                            ],
                        ],
                    ],

                ),
                'activo' => true,
            ],
            [
                'icono' => '<i class="fa-brands fa-instagram"></i>',
                'titulo' => 'CELEBRACIÓN ESPECIAL',
                'reservas' => json_encode(
                    [
                        [
                            'titulo' => '5 a 10 personas',
                            'lista' => [
                                [
                                    'icono' => '<i class="fa-brands fa-instagram"></i>',
                                    'subtitulo' => 'Perifoneo de felicitación personalizado',
                                    'descripcion' => '',
                                ],
                                [
                                    'icono' => '<i class="fa-brands fa-instagram"></i>',
                                    'subtitulo' => '1 entrada de cortesía a elección:',
                                    'descripcion' => 'Tequeños de la leña, mollejitas a la huancaína o pastel de choclo',
                                ],
                            ],
                        ],
                        [
                            'titulo' => '11 a 20 personas',
                            'lista' => [
                                [
                                    'icono' => '<i class="fa-brands fa-instagram"></i>',
                                    'subtitulo' => 'Perifoneo de felicitación personalizado',
                                    'descripcion' => '',
                                ],
                                [
                                    'icono' => '<i class="fa-brands fa-instagram"></i>',
                                    'subtitulo' => '1 entrada de cortesía a elección:',
                                    'descripcion' => 'Tequeños de la leña, mollejitas a la huancaína o pastel de choclo',
                                ],
                                [
                                    'icono' => '<i class="fa-brands fa-instagram"></i>',
                                    'subtitulo' => '1 fondo de cortesía a elección:',
                                    'descripcion' => 'Lasagna de ají de pollo a la leña, Pechugón original, Arroz meloso oriental, 1⁄4 de pollo clásico acompañado de 1 vaso de maracuyá',
                                ],
                            ],
                        ],
                        [
                            'titulo' => '21 a más personas',
                            'lista' => [
                                [
                                    'icono' => '<i class="fa-brands fa-instagram"></i>',
                                    'subtitulo' => 'Perifoneo de felicitación personalizado',
                                    'descripcion' => '',
                                ],
                                [
                                    'icono' => '<i class="fa-brands fa-instagram"></i>',
                                    'subtitulo' => '1 entrada de cortesía a eligir cada 10 personas dentro de la reserva',
                                    'descripcion' => 'Tequeños de la leña, mollejitas a la huancaína o pastel de choclo',
                                ],
                                [
                                    'icono' => '<i class="fa-brands fa-instagram"></i>',
                                    'subtitulo' => '1 fondo de cortesía a elección:',
                                    'descripcion' => 'Lasagna de ají de pollo a la leña, Pechugón original, Arroz meloso oriental, 1⁄4 de pollo clásico acompañado de 1 vaso de maracuyá',
                                ],
                            ],
                        ],
                    ],

                ),
                'activo' => true,
            ],
        ];

        PlanesReserva::insert($planes);
    }
}
