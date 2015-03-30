<?php namespace rhwilr\mcUserAdminPortal\Seeds;

use rhwilr\mcUserAdminPortal\Models\Role;
use rhwilr\mcUserAdminPortal\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class RoleTableSeeder
 * @package rhwilr\mcUserAdminPortal\Seeds
 */
class RoleTableSeeder extends Seeder
{

    /**
     * Run the database seeding
     */
    public function run()
    {

        DB::table('role_user')->delete();
        DB::table('roles')->delete();


        $premium = new Role();
        $premium->name         = 'premium';
        $premium->display_name = 'Premium User'; // optional
        $premium->description  = 'User is a subscriber to the server'; // optional
        $premium->save();

        $admin = new Role();
        $admin->name         = 'admin';
        $admin->display_name = 'User Administrator'; // optional
        $admin->description  = 'User is allowed to manage and edit other users'; // optional
        $admin->save();


        $user1 = User::where('email', '=', 'admin@example.com')->first();
        $user1->attachRole($admin);
        
        $user2 = User::where('email', '=', 'premium@example.com')->first();
        $user2->attachRole($premium);
    }
}