<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BeneficiosTrabajo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BeneficiosTrabajoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mostradores = [
            [
                'nombre' => 'Beneficios principal',
                'contenido' => json_encode([
                    [
                        'id' => 1,
                        'titulo' => 'Pertenecer a nuestra Familia',
                        'descripcion' => 'Somos un Holding Gastronómico que tiene posicionamiento en el mercado peruano 32 años, donde nos representamos por el calor de Hogar.',
                        'icono' => '<i class="fa-solid fa-user"></i>',
                    ],
                    [
                        'id' => 2,
                        'titulo' => 'Ingreso a planilla desde el inicio',
                        'descripcion' => 'Todos nuestros colaboradores cuentan con los beneficios: Gratificación, CTS, vacaciones, periodo de lactancia o paternidad y licencia por luto.',
                        'icono' => '<i class="fa-solid fa-user"></i>',
                    ],
                    [
                        'id' => 3,
                        'titulo' => 'Alimentación cubierta al 100%',
                        'descripcion' => 'Brindamos a nuestros colaboradores una carta semanal de alimentos que percibirá en sus jornadas de tiempo completo.',
                        'icono' => '<i class="fa-solid fa-user"></i>',
                    ],
                    [
                        'id' => 4,
                        'titulo' => 'Laborar cerca de tu domicilio',
                        'descripcion' => 'Contamos con cobertura en nuestros locales a Nivel Lima y Huancayo en donde considerar tu sede de trabajo que más te beneficie.',
                        'icono' => '<i class="fa-solid fa-user"></i>',
                    ],
                    [
                        'id' => 5,
                        'titulo' => 'Línea de carrera',
                        'descripcion' => 'Brindamos la oportunidad de emerger en diversos puestos conforme a sus habilidades que se van destacando a lo largo del proceso.',
                        'icono' => '<i class="fa-solid fa-user"></i>',
                    ],
                    [
                        'id' => 6,
                        'titulo' => 'Capacitación Permanente',
                        'descripcion' => 'Brindamos una formación y capacitación constante a través de nuestros talleres de formación y convenios educativos.',
                        'icono' => '<i class="fa-solid fa-user"></i>',
                    ],
                    [
                        'id' => 7,
                        'titulo' => 'Programas de reconocimiento',
                        'descripcion' => 'Premiamos y reconocemos la mejor labor y gestión de cada colaborador. Premiando al colaborador del mes, BSC y los Rallys de venta',
                        'icono' => '<i class="fa-solid fa-user"></i>',
                    ],
                    [
                        'id' => 8,
                        'titulo' => 'Beneficios para ti y tu familia',
                        'descripcion' => 'Nosotros consideramos a tu familia la nuestra por ello te brindamos los descuentos con nuestros aliados corporativos para mejoras educativas.',
                        'icono' => '<i class="fa-solid fa-user"></i>',
                    ],
                    [
                        'id' => 9,
                        'titulo' => 'Seguro de vida ley',
                        'descripcion' => 'Brindamos el seguro vida Ley, para protegerlos ante cualquier situación de riesgo en el ambiente laboral como fuera del mismo.',
                        'icono' => '<i class="fa-solid fa-user"></i>',
                    ],
                ]),
                'activo' => true,

            ],
        ];

        foreach ($mostradores as $mostrador) {
            BeneficiosTrabajo::create($mostrador);
        }
    }
}
