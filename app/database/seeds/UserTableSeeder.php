<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
            $user = new User();
            $user->username = "admin";
            $user->email = "jarbitlira@gmail.com";
            $user->password = Hash::make("admin");
            $user->first_name = "Jarbit";
            $user->last_name = "Lira";
            $user->save();
//        User::create();
	}

}