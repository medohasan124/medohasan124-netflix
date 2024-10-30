<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Http\Requests\profile\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Artisan::call('migrate:fresh');



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


         Artisan::call('get:genra');
         Artisan::call('get:movies');

    }
}
