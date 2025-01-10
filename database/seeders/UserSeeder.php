<?php

namespace Database\Seeders;

use App\Models\Work;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for($i = 0; $i < 10; $i++) {
            $user = User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'phone_number' => $faker->phoneNumber,
                'gender' => $faker->randomElement(['male', 'female']),
                'linkedin' => $faker->userName,
                'password' => bcrypt('password'),
            ]);

            $works = Work::inRandomOrder()->take(3)->pluck('id');
            $user->works()->attach($works);
        }

        $justin = User::create([
            'name' => 'Justin',
            'email' => 'justinreg13@gmail.com',
            'phone_number' => '081',
            'gender' => 'male',
            'linkedin' => 'bejustin.r',
            'password' => bcrypt('password'),
        ]);

        $works = Work::inRandomOrder()->take(3)->pluck('id');
        $justin->works()->attach($works);
    }
}
