<?php

namespace Database\Seeders;

use App\Models\Distrito;
use App\Models\Sede;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SedeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Crear 2 sedes en distritos que pertenecen a la provincia con provincia_id = 134 HUAURA
        for ($i = 0; $i < 2; $i++) {
            Sede::create([
                'nombre' => $faker->company,
                'distrito_id' => Distrito::where('provincia_id', 134)->inRandomOrder()->first()->id, // Distrito de la provincia_id = 135
                'celular' => $faker->phoneNumber,
                'google_maps' => $faker->url,
                'direccion' => $faker->address,
                'referencia' => $faker->sentence,
                'imagen_ruta' => $faker->imageUrl(640, 480, 'business', true),
                'activo' => $faker->boolean,
            ]);
        }

        // Crear 3 sedes en distritos que pertenecen a la provincia con provincia_id = 135 LIMA
        for ($i = 0; $i < 3; $i++) {
            Sede::create([
                'nombre' => $faker->company,
                'distrito_id' => Distrito::where('provincia_id', 135)->inRandomOrder()->first()->id, // Distrito de la provincia_id = 135
                'celular' => $faker->phoneNumber,
                'google_maps' => $faker->url,
                'direccion' => $faker->address,
                'referencia' => $faker->sentence,
                'imagen_ruta' => $faker->imageUrl(640, 480, 'business', true),
                'activo' => $faker->boolean,
            ]);
        }

        // Crear 5 sedes en distritos de cualquier provincia (aleatorios)
        for ($i = 0; $i < 5; $i++) {
            Sede::create([
                'nombre' => $faker->company,
                'distrito_id' => Distrito::inRandomOrder()->first()->id, // Distrito aleatorio de cualquier provincia
                'celular' => $faker->phoneNumber,
                'google_maps' => $faker->url,
                'direccion' => $faker->address,
                'referencia' => $faker->sentence,
                'imagen_ruta' => $faker->imageUrl(640, 480, 'business', true),
                'activo' => $faker->boolean,
            ]);
        }
    }
}
