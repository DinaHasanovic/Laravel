<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Courses;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $user = User::factory()->create([
            'name' => 'Ertan Muslic',
            'email' => 'ertanmuslic@gmail.com'
        ]);

        // Courses::factory(6)->create([
        //     'user_id' => $user->id
        // ]);

        Courses::create([
            'title' => 'Laravel Senior Developer',
            'tags' => 'laravel,javascript',
            'user_id'=> $user->id,
            'description' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."',
            'duration' => 4,
            'price' => 199,
        ]);

        Courses::create([
            'title' => 'Full-Stack Engineer',
            'tags' => 'laravel,backend,api',
            'user_id'=> $user->id,
            'description' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."',
            'duration' => 2,
            'price' => 300,
        ]);

       
    }
}
