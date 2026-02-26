<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product1 = new Product();
        $product1->name = "Mouse";
        $product1->price = 90000;
        $product1->description = "Esto es un Mouse Inalambrico";
        $product1->category_id = Category::inRandomOrder()->first()->id;


        $product1->save();

        $product2 = new Product();
        $product2->name = "Computador";
        $product2->price = 290000;
        $product2->description = "Esto es un computador";
        $product2->category_id = Category::inRandomOrder()->first()->id;

        $product2->save();
    }
}
