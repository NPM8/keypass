<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if (!DB::table('users')->where('name','NPM8')->exists()) {
            DB::table('users')->insert([[
                'name' => 'NPM8',
                'email' => 'nnnp.dawid@gmail.com',
                'password' => bcrypt('admin'),
                'remember_token' => str_random(10),
            ],[
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin'),
                'remember_token' => str_random(10),
            ]]);
        }
    }
}
