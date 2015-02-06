<?php


class RolesTableSeeder extends Seeder
{

    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        Role::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        $roles = array(
            "Owner",
            "Admin",
            "Seller",
        );
        foreach ($roles as $roleName) {
            $role = Role::create(array(
                "name" => $roleName,
                "created_by" => 1,
                "updated_by" => 1,
            ));

            if ($roleName == "Owner" || $roleName == "Admin")
                $role->attachPermissions(Permission::all());
        }
    }

}