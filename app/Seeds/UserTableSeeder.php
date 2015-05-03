<?php namespace rhwilr\mcUserAdminPortal\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use rhwilr\mcUserAdminPortal\Models\User;

/**
 * Class ServerTableSeeder
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
        $admin->name        = 'admin';
        $admin->email       = 'admin@example.com';
        $admin->password    = bcrypt('admin');
        $admin->save();

    }
}