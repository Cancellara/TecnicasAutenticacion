<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Admin::class)->create([
            'name' => 'Miguel',
            'email' => 'miguelintxi@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        factory(\App\User::class)->create([
            'name' => 'Miguel',
            'email' => 'miguelintxi@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
