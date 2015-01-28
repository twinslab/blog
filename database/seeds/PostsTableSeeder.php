<?php

use Illuminate\Database\Seeder;
use App\Post as Post;

class PostsTableSeeder extends Seeder {

    /**
     * Run the users table seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->truncate();

        $faker = Faker\Factory::create();

        for ($i = 0; $i < 50; $i++)
        {
            Post::create([
                'title' => $faker->sentence(),
                'slug' => $faker->word,
                'content' => $faker->text()
            ]);
        }
    }

}
