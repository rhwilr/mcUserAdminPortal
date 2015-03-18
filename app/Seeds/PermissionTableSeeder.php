<?php namespace rhwilr\mcUserAdminPortal\Seeds;

use rhwilr\mcUserAdminPortal\Models\Permission;
use rhwilr\mcUserAdminPortal\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class RoleTableSeeder
 * @package rhwilr\mcUserAdminPortal\Seeds
 */
class PermissionTableSeeder extends Seeder
{

    /**
     * Run the database seeding
     */
    public function run()
    {

        DB::table('permission_role')->delete();
        DB::table('permissions')->delete();

        $editUser = new Permission();
        $editUser->name         = 'edit-user';
        $editUser->display_name = 'Edit Users'; // optional
// Allow a user to...
        $editUser->description  = 'edit existing users'; // optional
        $editUser->save();

        $adminServer = new Permission();
        $adminServer->name         = 'admin-server';
        $adminServer->display_name = 'Admin Server'; // optional
// Allow a user to...
        $adminServer->description  = 'admin the server'; // optional
        $adminServer->save();

        $canChat = new Permission();
        $canChat->name         = 'can-chat';
        $canChat->display_name = 'Can Chat'; // optional
// Allow a user to...
        $canChat->description  = 'can use the online chat'; // optional
        $canChat->save();


        $admin = Role::where('name', '=', 'admin')->first();
        $admin->attachPermission($editUser);
        $admin->attachPermission($adminServer);

        $premium = Role::where('name', '=', 'premium')->first();
        $premium->attachPermission($canChat);
    }
}