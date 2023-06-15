<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Category::create([
            'category_name' => 'Hematologi'
        ]);
        Category::create([
            'category_name' => 'Karbohidrat'
        ]);
        Category::create([
            'category_name' => 'Elektrolit'
        ]);
        Category::create([
            'category_name' => 'Fungsi Hati'
        ]);
        Category::create([
            'category_name' => 'Fungsi Ginjal'
        ]);
        Category::create([
            'category_name' => 'Kimia Darah'
        ]);
        Category::create([
            'category_name' => 'Serologi/Imunologi'
        ]);
        Category::create([
            'category_name' => 'Hemostasis'
        ]);
        Category::create([
            'category_name' => 'Urinalisa'
        ]);
        Category::create([
            'category_name' => 'Faeces'
        ]);
        Category::create([
            'category_name' => 'Tes Narkoba'
        ]);
        Category::create([
            'category_name' => 'Tes Kehamilan'
        ]);
        Category::create([
            'category_name' => 'Bakteriologi'
        ]);
    }
}
