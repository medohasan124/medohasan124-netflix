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
         User::factory(10)->create();

           $user =  User::factory()->create([
             'name' => 'Mohamed',
             'email' => 'superAdmin@gmail.com',
             'password' => bcrypt('123123'),
         ]);
         $user->addRole('superAdmin');
         
    }
}
