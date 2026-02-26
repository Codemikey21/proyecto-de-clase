<?php

namespace Database\Seeders;

use App\Models\CartItem;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /**$this->call([
            CategorySeeder::class,
            ProductSeeder::class
        ]);**/

        Category::factory(10000)->create();
        CartItem::Factory(20000)->create();
    }
}
