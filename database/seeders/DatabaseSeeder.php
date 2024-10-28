<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(LaratrustSeeder::class);


           $Super =  User::factory()->create([
             'name' => 'Mohamed',
             'email' => 'superAdmin@gmail.com',
             'password' => bcrypt('123123'),
         ]);
         $Super->addRole('superAdmin');

         $users = User::factory()->create();
         $users->addRole('user');

        $Admin = User::factory()->create();
         $Admin->addRole('admin');

         $setting = \App\Models\setting::factory()->create();

    }
}
