<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\categories::factory(10)->create();

        \App\Models\categories::factory()->create([
            'name_er' => 'Test User',
            'name_en' => 'test@example.com',
        ]);
    }
}
