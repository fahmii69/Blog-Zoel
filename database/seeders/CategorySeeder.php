<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = ['Lifestyle', 'Fashion', 'Technology', 'Travel', 'Health'];

        foreach ($category as $k => $v) {
            Category::insert(
                [
                    'category_name' => $v,
                    'created_at'    => now()->toDateTimeString(),
                    'updated_at'    => now()->toDateTimeString(),
                ]
            );
        }
    }
}
