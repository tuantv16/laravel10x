<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        $products = [
            ['name' => 'Laptop', 'description' => 'High performance laptop', 'price' => 1200.50, 'category_id' => 1],
            ['name' => 'Smartphone', 'description' => 'Latest model smartphone', 'price' => 799.99, 'category_id' => 1],
            ['name' => 'Headphones', 'description' => 'Noise-cancelling headphones', 'price' => 199.50, 'category_id' => 1],
            ['name' => 'Smartwatch', 'description' => 'Waterproof smartwatch', 'price' => 249.99, 'category_id' => 1],
            ['name' => 'Camera', 'description' => 'DSLR professional camera', 'price' => 999.99, 'category_id' => 1],
            ['name' => 'Fiction Book', 'description' => 'An engaging novel', 'price' => 15.99, 'category_id' => 2],
            ['name' => 'Science Book', 'description' => 'Educational science book', 'price' => 25.00, 'category_id' => 2],
            ['name' => 'Biography Book', 'description' => 'Inspiring life story', 'price' => 20.50, 'category_id' => 2],
            ['name' => 'Cookbook', 'description' => 'Recipes from around the world', 'price' => 30.00, 'category_id' => 2],
            ['name' => 'Mystery Book', 'description' => 'Thrilling mystery novel', 'price' => 18.75, 'category_id' => 2],
            ['name' => 'T-shirt', 'description' => '100% cotton t-shirt', 'price' => 9.99, 'category_id' => 3],
            ['name' => 'Jeans', 'description' => 'Denim jeans for men', 'price' => 49.99, 'category_id' => 3],
            ['name' => 'Jacket', 'description' => 'Winter jacket with hood', 'price' => 89.99, 'category_id' => 3],
            ['name' => 'Sweater', 'description' => 'Woolen sweater', 'price' => 29.99, 'category_id' => 3],
            ['name' => 'Hat', 'description' => 'Sun hat for summer', 'price' => 12.99, 'category_id' => 3],
            ['name' => 'Sunglasses', 'description' => 'Polarized sunglasses', 'price' => 19.99, 'category_id' => 1],
            ['name' => 'Tablet', 'description' => 'Portable touch-screen tablet', 'price' => 499.50, 'category_id' => 1],
            ['name' => 'Bluetooth Speaker', 'description' => 'Portable Bluetooth speaker', 'price' => 35.00, 'category_id' => 1],
            ['name' => 'Shoes', 'description' => 'Running shoes', 'price' => 59.99, 'category_id' => 3],
            ['name' => 'Backpack', 'description' => 'Multi-compartment backpack', 'price' => 39.99, 'category_id' => 3],
            ['name' => 'Mouse', 'description' => 'Wireless mouse', 'price' => 15.00, 'category_id' => 1],
            ['name' => 'Keyboard', 'description' => 'Mechanical keyboard', 'price' => 45.50, 'category_id' => 1],
        ];

        DB::table('products')->insert($products);

    }
}
