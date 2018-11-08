<?php

use Illuminate\Database\Seeder;

class PublicPasswordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('public_passwords')->truncate();
        factory(App\Passwords::class, 20)->create();
    }
}
