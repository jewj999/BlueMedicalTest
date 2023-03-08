<?php

namespace Database\Seeders;

use App\Models\VehicleType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VehicleType::create([
            'name' => 'Vehiculo Oficial',
            'price_per_minute' => 0,
        ]);

        VehicleType::create([
            'name' => 'Vehiculo Residente',
            'price_per_minute' => 0.05,
        ]);

        VehicleType::create([
            'name' => 'Vehiculo Invitado',
            'price_per_minute' => 0.5,
            'default' => true,
        ]);
    }
}
