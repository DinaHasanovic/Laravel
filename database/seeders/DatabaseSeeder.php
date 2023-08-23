<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Carbon\Carbon;
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
        $userBirthDate = Carbon::create(1990, 5, 15);

        $user = User::factory()->create([
            'name' => 'Ertan Muslic Admin',
            'email' => 'ertanmuslic@gmail.com',
            'role' => 'admin',
            'gender' => 'male',
            'place_of_birth' => 'Novi Pazar',
            'country' => 'Serbia',
            'birth_date' =>  $userBirthDate,
            'personal_number' => '123124124123',
            'phone_number' => '063-1662944',
            'picture' => "null",
        ]);

        $user = User::factory()->create([
            'name' => 'Ertan Muslic Professor',
            'email' => 'ertanmuslic@hotmail.com',
            'role' => 'professor',
            'gender' => 'male',
            'place_of_birth' => 'Novi Pazar',
            'country' => 'Serbia',
            'birth_date' =>  $userBirthDate,
            'personal_number' => '123124124123',
            'phone_number' => '063-1662944',
            'picture' => "null",
        ]);

        $user = User::factory()->create([
            'name' => 'Ertan Muslic Student',
            'email' => 'ertanmuslic@323gmail.com',
            'role' => 'student',
            'gender' => 'male',
            'place_of_birth' => 'Novi Pazar',
            'country' => 'Serbia',
            'birth_date' =>   $userBirthDate,
            'personal_number' => '123124124123',
            'phone_number' => '063-1662944',
            'picture' => "null",
        ]);

        // Courses::factory(6)->create([
        //     'user_id' => $user->id
        // ]);

        Courses::create([
            'title' => 'Laravel Senior Developer',
            'tags' => 'laravel,javascript',
            'user_id'=> $user->id,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'duration' => 4,
            'price' => 199,
        ]);

        Courses::create([
            'title' => 'Full-Stack Engineer',
            'tags' => 'laravel,backend,api',
            'user_id'=> $user->id,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'duration' => 2,
            'price' => 300,
        ]);

       
    }
}
