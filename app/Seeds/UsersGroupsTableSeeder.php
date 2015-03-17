<?php

namespace rhwilr\mcUserAdminPortal\Seeds;

use GrahamCampbell\Credentials\Facades\Credentials;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UsersGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeding.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_groups')->truncate();

        $this->matchUser('admin@rhwilr.ch', 'Admins');
        $this->matchUser('user@rhwilr.ch', 'Users');
    }

    /**
     * Add the user by email to a group.
     *
     * @param string $email
     * @param string $group
     *
     * @return void
     */
    protected function matchUser($email, $group)
    {
        return Credentials::getUserProvider()->findByLogin($email)
            ->addGroup(Credentials::getGroupProvider()->findByName($group));
    }
}
