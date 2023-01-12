<?php

namespace Database\Seeders;

use App\Models\Tags;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag =
            [
                'Social',
                'Lifestyle',
                'Blog',
                'Travel',
                'Technology',
                'Fashion',
                'Life',
                'News',
                'Magazine',
                'Food',
                'Health',
            ];

        foreach ($tag as $key => $v) {
            Tags::insert(
                [
                    'tag_name'   => $v,
                    'created_at' => now()->toDateTimeString(),
                    'updated_at' => now()->toDateTimeString(),
                ]
            );
        }
    }
}
