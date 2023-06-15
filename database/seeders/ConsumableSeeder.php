<?php

namespace Database\Seeders;

use App\Models\Consumable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConsumableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Consumable::create([
            'name'  => 'Strip Gula',
            'in'    => 10,
            'out'   => 20,
            'expired'   => 30,
            'notes' => 'Tidak ada catatan'
        ]);
        Consumable::create([
            'name'  => 'Reagen AU',
            'in'    => 120,
            'out'   => 220,
            'expired'   => 303,
            'notes' => 'Tidak ada catatan'
        ]);
        Consumable::create([
            'name'  => 'Reagen Kolesterol',
            'in'    => 140,
            'out'   => 120,
            'expired'   => 31,
            'notes' => 'Tidak ada catatan'
        ]);
    }
}
