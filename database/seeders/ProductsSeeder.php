<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductsSeeder extends Seeder
{
    public function run(): void
    {
        $bathroom = Category::where('name', 'Санузел')->first();
        $hallway = Category::where('name', 'Прихожая')->first();

        Product::insertOrIgnore([
            [
                'name' => 'Раковина',
                'price' => 120.50,
                'category_id' => $bathroom->id,
                'in_stock' => true,
                'rating' => 4.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Зеркало',
                'price' => 80.00,
                'category_id' => $bathroom->id,
                'in_stock' => true,
                'rating' => 4.2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Вешалка',
                'price' => 45.99,
                'category_id' => $hallway->id,
                'in_stock' => false,
                'rating' => 4.0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}