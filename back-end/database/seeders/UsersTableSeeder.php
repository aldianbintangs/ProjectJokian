<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\models\User::create([
            'username'	=> 'admin2',
            'email'	=> 'admin2@example.com',
            'password' => bcrypt('121212'),
            'role'	=> 'admin',
        ]);
    }
}
