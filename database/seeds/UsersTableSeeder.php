<?php

use Illuminate\Database\Seeder;
use App\User as User;

class UsersTableSeeder extends Seeder {

    /**
     * Run the users table seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        User::create([
            'name' => 'John Doe',
            'email' => 'sample@email.com',
            'password' => Hash::make('secret')
        ]);
    }

}
