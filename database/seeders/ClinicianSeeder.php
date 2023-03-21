<?php

namespace Database\Seeders;

use App\Models\Clinician;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClinicianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Clinician::factory()->count(100)->create();
    }
}
