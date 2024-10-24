<?php

namespace Database\Seeders;

use App\Models\WebFooter;
use Illuminate\Database\Seeder;

class WebFooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $footer = [
            'primera_columna' => json_encode([
                'id' => 1,
                'titulo' => 'Titulo 1',
                'elementos' => [
                    ['nombre' => 'Nombre 1', 'link' => 'www.google.com'],
                    ['nombre' => 'Nombre 2', 'link' => 'www.google.com'],
                    ['nombre' => 'Nombre 3', 'link' => 'www.google.com'],
                    ['nombre' => 'Nombre 4', 'link' => 'www.google.com'],
                    ['nombre' => 'Nombre 5', 'link' => 'www.google.com'],
                    ['nombre' => 'Nombre 6', 'link' => 'www.google.com'],
                    ['nombre' => 'Nombre 7', 'link' => 'www.google.com'],
                    ['nombre' => 'Nombre 8', 'link' => 'www.google.com'],
                    ['nombre' => 'Nombre 9', 'link' => 'www.google.com'],
                    ['nombre' => 'Nombre 10', 'link' => 'www.google.com'],
                ],
            ]),
            'segunda_columna' => json_encode([
                'id' => 2,
                'titulo' => 'Titulo 2',
                'elementos' => [
                    ['nombre' => 'Nombre 1', 'link' => 'www.google.com'],
                    ['nombre' => 'Nombre 2', 'link' => 'www.google.com'],
                    ['nombre' => 'Nombre 3', 'link' => 'www.google.com'],
                    ['nombre' => 'Nombre 4', 'link' => 'www.google.com'],
                    ['nombre' => 'Nombre 5', 'link' => 'www.google.com'],
                    ['nombre' => 'Nombre 6', 'link' => 'www.google.com'],
                    ['nombre' => 'Nombre 7', 'link' => 'www.google.com'],
                    ['nombre' => 'Nombre 8', 'link' => 'www.google.com'],
                    ['nombre' => 'Nombre 9', 'link' => 'www.google.com'],
                    ['nombre' => 'Nombre 10', 'link' => 'www.google.com'],
                ],
            ]),
            'tercera_columna' => json_encode([
                'id' => 1,
                'titulo' => 'Titulo 3',
                'elementos' => [
                    ['nombre' => 'Nombre 1', 'link' => 'www.google.com'],
                    ['nombre' => 'Nombre 2', 'link' => 'www.google.com'],
                    ['nombre' => 'Nombre 3', 'link' => 'www.google.com'],
                    ['nombre' => 'Nombre 4', 'link' => 'www.google.com'],
                    ['nombre' => 'Nombre 5', 'link' => 'www.google.com'],
                    ['nombre' => 'Nombre 6', 'link' => 'www.google.com'],
                    ['nombre' => 'Nombre 7', 'link' => 'www.google.com'],
                    ['nombre' => 'Nombre 8', 'link' => 'www.google.com'],
                    ['nombre' => 'Nombre 9', 'link' => 'www.google.com'],
                    ['nombre' => 'Nombre 10', 'link' => 'www.google.com'],
                ],
            ]),
            'cuarta_columna' => json_encode([
                'id' => 1,
                'titulo' => 'Titulo 4',
                'elementos' => [
                    ['nombre' => 'Nombre 1', 'link' => 'www.google.com'],
                    ['nombre' => 'Nombre 2', 'link' => 'www.google.com'],
                    ['nombre' => 'Nombre 3', 'link' => 'www.google.com'],
                    ['nombre' => 'Nombre 4', 'link' => 'www.google.com'],
                    ['nombre' => 'Nombre 5', 'link' => 'www.google.com'],
                    ['nombre' => 'Nombre 6', 'link' => 'www.google.com'],
                    ['nombre' => 'Nombre 7', 'link' => 'www.google.com'],
                    ['nombre' => 'Nombre 8', 'link' => 'www.google.com'],
                    ['nombre' => 'Nombre 9', 'link' => 'www.google.com'],
                    ['nombre' => 'Nombre 10', 'link' => 'www.google.com'],
                ],
            ]),
            'derechos' => '© TODOS LOS DERECHOS RESERVADOS',
            'activo' => true,
        ];

        WebFooter::create($footer);
    }
}
