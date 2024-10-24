<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call(RegionSeeder::class);
        $this->call(ProvinciaSeeder::class);
        $this->call(DistritoSeeder::class);
        $this->call(SedeSeeder::class);
        $this->call(SliderSeeder::class);
        $this->call(BeneficiosTrabajoSeeder::class);
        $this->call(WebFooterSeeder::class);
        $this->call(PlanesReservaSeeder::class);
    }
}
