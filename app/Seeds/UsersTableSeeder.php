<?php

namespace rhwilr\mcUserAdminPortal\Seeds;

use Carbon\Carbon;
use GrahamCampbell\Credentials\Facades\Credentials;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeding.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        $user = [
            'first_name'   => 'UAP',
            'last_name'    => 'Admin',
            'email'        => 'admin@rhwilr.ch',
            'password'     => 'password',
            'activated'    => 1,
            'activated_at' => Carbon::now(),
        ];
        Credentials::getUserProvider()->create($user);

        $user = [
            'first_name'   => 'UAP',
            'last_name'    => 'User',
            'email'        => 'user@rhwilr.ch',
            'password'     => 'password',
            'activated'    => 1,
            'activated_at' => Carbon::now(),
        ];
        Credentials::getUserProvider()->create($user);
    }
}
