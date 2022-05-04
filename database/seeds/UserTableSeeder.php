<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker =         $faker = Faker\Factory::create()->unique();

        $user =  \App\User::create([
            'name'     => $faker->name,
            'username'       => 'jerry',
            'email'          => $faker->companyEmail,
            'email_verified_at'         =>now('Africa/Lagos'),
            'password' => Hash::make('bad-ass'),
        ]);
    }
}
