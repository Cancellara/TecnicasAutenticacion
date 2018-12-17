<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Miguel',
            'email' => 'miguelintxi@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
