<?php namespace rhwilr\mcUserAdminPortal\Seeds;

use rhwilr\mcUserAdminPortal\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        
        $admin = new User();
        $admin->name        = 'user';
        $admin->email       = 'user@example.com';
        $admin->password    = bcrypt('user');
        $admin->save();
        
        $admin = new User();
        $admin->name        = 'premium';
        $admin->email       = 'premium@example.com';
        $admin->password    = bcrypt('premium');
        $admin->save();

    }
}