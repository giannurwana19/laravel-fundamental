<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Gian nurwana',
            'username' => 'giannurwana',
            'email' => 'gian@gmail.com',
            'password' => bcrypt('password')
        ]);

        User::create([
            'name' => 'Dina Alenda',
            'username' => 'dina',
            'email' => 'dina@gmail.com',
            'password' => bcrypt('password')
        ]);
    }
}
