<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Posts;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

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
            'name' => 'Almedina Hasanovic Admin',
            'email' => 'almedinahasanovic001@gmail.com',
            'role' => 'admin',
            'gender' => 'female',
            'place_of_birth' => 'Novi Pazar',
            'country' => 'Serbia',
            'birth_date' =>  $userBirthDate,
            'personal_number' => '123124124123',
            'phone_number' => '0655327491',
            'picture' => asset('storage/profile_pictures/N0126ejhjrxZmhZCdMYnxVYmlEplFMgLh0ZpD0SE.jpg'),
        ]);

        $user = User::factory()->create([
            'name' => 'Almedina Hasanovic Moderator',
            'email' => 'almedinahasanovic002@gmail.com',
            'role' => 'moderator',
            'gender' => 'female',
            'place_of_birth' => 'Novi Pazar',
            'country' => 'Serbia',
            'birth_date' =>  $userBirthDate,
            'personal_number' => '123124124123',
            'phone_number' => '0655327491',
            'picture' => asset('storage/profile_pictures/N0126ejhjrxZmhZCdMYnxVYmlEplFMgLh0ZpD0SE.jpg'),
        ]);

        $user = User::factory()->create([
            'name' => 'Almedina Hasanovic Student',
            'email' => 'almedinahasanovic00@gmail.com',
            'role' => 'student',
            'gender' => 'female',
            'place_of_birth' => 'Novi Pazar',
            'country' => 'Serbia',
            'birth_date' =>   $userBirthDate,
            'personal_number' => '123124124123',
            'phone_number' => '0655327491',
            'picture' => asset('storage/profile_pictures/N0126ejhjrxZmhZCdMYnxVYmlEplFMgLh0ZpD0SE.jpg'),
        ]);

        // Courses::factory(6)->create([
        //     'user_id' => $user->id
        // ]);

        Posts::create([
            'title' => 'Laravel Senior Developer',
            //'tags' => 'laravel,javascript',
            'user_id'=> $user->id,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'duration' => 4,
            'price' => 199,
            'image' => 'image'
        ]);

        Posts::create([
            'title' => 'Full-Stack Engineer',
            //'tags' => 'laravel,backend,api',
            'user_id'=> $user->id,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'duration' => 2,
            'price' => 300,
            'image' => 'image'
        ]);


    }
}
