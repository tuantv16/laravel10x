<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Electronics', 'description' => 'Electronic items'],
            ['name' => 'Books', 'description' => 'Various genres of books'],
            ['name' => 'Clothing', 'description' => 'Men and women clothing'],
        ]);
    }
}
