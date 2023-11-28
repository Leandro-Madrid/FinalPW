<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'MOTU - Masters of the Universe™'],
            ['name' => 'Thundercats'],
            ['name' => 'Robotech'],
            ['name' => 'TMNT -  Teenage Mutant Ninja Turtles'],
            ['name' => 'Transformers'],
            ['name' => 'Consolas'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}

