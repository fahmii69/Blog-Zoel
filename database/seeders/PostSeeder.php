<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tags;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $faker->addProvider(new \Smknstd\FakerPicsumImages\FakerPicsumImagesProvider($faker));
        $widget = [
            'frontend/img/post-1.jpg',
            'frontend/img/post-2.jpg',
            'frontend/img/post-3.jpg',
            'frontend/img/post-4.jpg',
            'frontend/img/post-5.jpg',
            'frontend/img/post-6.jpg',
            'frontend/img/post-7.jpg',
            'frontend/img/post-8.jpg',
            'frontend/img/post-9.jpg',
            'frontend/img/post-10.jpg',
            'frontend/img/post-11.jpg',
            'frontend/img/post-12.jpg',
            'frontend/img/post-13.jpg',
        ];

        for ($i = 0; $i < 50; $i++) {
            $post = Post::create(
                [
                    'user_id'     => User::inRandomOrder()->first()->id,
                    'category_id' => Category::inRandomOrder()->first()->id,
                    // 'tag_id'      => Tags::inRandomOrder()->first()->id,
                    'post_title'  => $faker->sentence(),
                    // 'post_slug'   => $faker->paragraph(2),
                    'post_body'   => $faker->text(2000, true),
                    'post_image'  => $faker->imageUrl($width = 800, $height = 600),
                    'created_at'  => now()->toDateTimeString(),
                    'updated_at'  => now()->toDateTimeString(),
                ]
            );

            foreach (range(1, rand(1, 3)) as $k) {
                PostTag::create([
                    'tag_id'  => rand(1, 11),
                    'post_id' => $post->id,
                ]);
            }
        }
    }
}
