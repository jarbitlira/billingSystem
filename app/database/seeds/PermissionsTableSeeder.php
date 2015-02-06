<?php

class PermissionsTableSeeder extends Seeder
{

    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        Permission::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        $actions = array("create", "read", "update", "delete");

        $sections = array(
            "billing",
            "product",
            "product_category",
            "provider",
            "client",
            "invoice",
            "user",
            "config",
            "role",
            "permission",
        );

        foreach ($sections as $section) {
            foreach ($actions as $action) {
                $permission = $action . "_" . $section;
                Permission::create(array(
                    "name" => $permission,
                    "display_name" => str_plural(ucfirst(str_replace("_", " ", $permission))),
                ));
            }
        }


    }

}