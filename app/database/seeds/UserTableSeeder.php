<?php

class UserTableSeeder extends Seeder {

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
	}

}