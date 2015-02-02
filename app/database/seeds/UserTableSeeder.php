<?php

use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
{

    public function run()
    {
        $user = new User();
        $user->username = "admin";
        $user->email = "jarbitlira@gmail.com";
        $user->password = "admin";
        $user->password_confirmation = "admin";
        $user->first_name = "Jarbit";
        $user->last_name = "Lira";
        $user->save();

        if (App::environment() == 'local') {
            $faker = Faker::create();

            foreach (range(0, 20) as $index) {
                $user = new User();
                $user->username = $faker->userName;
                $user->email = $faker->email;
                $user->password = "admin";
                $user->password_confirmation = "admin";
                $user->first_name = $faker->firstName;
                $user->last_name = $faker->lastName;
                $user->save();
            }
        }
    }

}