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
        factory(\App\Admin::class)->create([
            'name' => 'Miguel',
            'email' => 'miguelintxi@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
