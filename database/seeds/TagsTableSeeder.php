<?php

use Illuminate\Database\Seeder;
use App\Tag as Tag;

class TagsTableSeeder extends Seeder {

    /**
     * Run the users table seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->delete();

        Tag::create([
            'name' => 'php',
        ]);

        Tag::create([
            'name' => 'laravel',
        ]);

        Tag::create([
            'name' => 'random',
        ]);
    }

}
