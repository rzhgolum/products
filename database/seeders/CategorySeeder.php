<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::insertOrIgnore([
            ['name' => 'Санузел'],
            ['name' => 'Прихожая'],
            ['name' => 'Кухня'],
            ['name' => 'Спальня'],
        ]);
    }
}