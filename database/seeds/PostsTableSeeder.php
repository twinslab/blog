<?php

use Illuminate\Database\Seeder;
use App\Post as Post;
use League\CommonMark\CommonMarkConverter;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder {


    /**
     * The constructor.
     *
     * @param CommonMarkConverter $converter
     */
    public function __construct(CommonMarkConverter $converter)
    {
        $this->converter = $converter;
    }

    /**
     * Run the users table seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('posts')->truncate();

        $faker = Faker\Factory::create();

        for ($i = 0; $i < 20; $i++)
        {
            // Post's title
            $title = rtrim($faker->sentence(), '.');

            // Create post's slug from title
            $slug = Str::slug($title);

            // Randomly generated markdown post's content
            $content_md = "## " . rtrim($faker->sentence(), '.') . "\n" . $faker->text();

            Post::create([
                'title' => $title,
                'slug' => $slug,
                'content_md' => $content_md,
                'content_html' => $this->converter->convertToHtml($content_md)
            ]);
        }
    }

}
