<?php

namespace Database\Seeders;

use App\Models\Analyst;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnalystSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Analyst::factory()->count(5)->create();
    }
}
