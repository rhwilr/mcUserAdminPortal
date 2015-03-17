<?php

namespace rhwilr\mcUserAdminPortal\Seeds;

use GrahamCampbell\Credentials\Facades\Credentials;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeding.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->truncate();

        // users
        $permissions = ['user' => 1, 'admin' => 0];
        $group = ['name' => 'Users', 'permissions' => $permissions];
        Credentials::getGroupProvider()->create($group);

        // admins
        $permissions = ['user' => 1, 'admin' => 1];
        $group = ['name' => 'Admins', 'permissions' => $permissions];
        Credentials::getGroupProvider()->create($group);
    }
}
