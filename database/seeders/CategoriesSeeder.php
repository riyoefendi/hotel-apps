<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categories;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categories::insert(
            [
                [
                    'name' => 'Junior Room',
                    'slug' => 'junior-room'
                ],
                [
                    'name' => 'Superior',
                    'slug' => 'superior'
                ],
                [
                    'name' => 'Deluxe Room',
                    'slug' => 'deluxe-room'
                ],
                [
                    'name' => 'Suite',
                    'slug' => 'suite'
                ],
                [
                    'name' => 'Deluxe Suite',
                    'slug' => 'deluxe-suite'
                ],

            ],
        );
    }
}
