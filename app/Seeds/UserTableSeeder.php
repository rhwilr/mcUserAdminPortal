<?php namespace rhwilr\mcUserAdminPortal\Seeds;

use rhwilr\mcUserAdminPortal\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class RoleTableSeeder
 * @package rhwilr\mcUserAdminPortal\Seeds
 */
class UserTableSeeder extends Seeder
{

    /**
     * Run the database seeding
     */
    public function run()
    {

        DB::table('users')->delete();
        $admin = new User();
        $admin->name         = 'admin';
        $admin->email   = 'admin@rhwilr.ch'; // optional
        $admin->password  = bcrypt('123456'); // optional
        $admin->save();

    }
}