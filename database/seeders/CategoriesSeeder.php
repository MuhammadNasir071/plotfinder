<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Category::create([
            'name' => 'House',
            'slug' => 'house',
            'created_at' => now(),
        ]);
        \App\Models\Category::create([
            'name' => 'Flat',
            'slug' => 'flat',
            'created_at' => now(),
        ]);
        \App\Models\Category::create([
            'name' => 'Upper Portion',
            'slug' => 'upper-portion',
            'created_at' => now(),
        ]);
        \App\Models\Category::create([
            'name' => 'Lower Portion',
            'slug' => 'lower-portion',
            'created_at' => now(),
        ]);
        \App\Models\Category::create([
            'name' => 'Farm House',
            'slug' => 'farm-house',
            'created_at' => now(),
        ]);
        \App\Models\Category::create([
            'name' => 'Rooms',
            'slug' => 'rooms',
            'created_at' => now(),
        ]);
        \App\Models\Category::create([
            'name' => 'Penthouse',
            'slug' => 'penthouse',
            'created_at' => now(),
        ]);
    }
}
