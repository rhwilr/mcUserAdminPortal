<?php namespace rhwilr\mcUserAdminPortal\Seeds;

use rhwilr\mcUserAdminPortal\Models\Server;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class ServerTableSeeder
 * @package rhwilr\mcUserAdminPortal\Seeds
 */
class ServerTableSeeder extends Seeder
{

    /**
     * Run the database seeding
     */
    public function run()
    {

        DB::table('servers')->delete();
        
        $server1 = new Server();
        $server1->name          = 'FTB Ultimate ';
        $server1->host          = 'ultinamte.rhwilr.ch';
        $server1->rcon_port     = '2598';
        $server1->rcon_password = 'passwd';
        $server1->save();

        $server2 = new Server();
        $server2->name          = 'FTB Resuraction ';
        $server2->host          = 'resuraction.rhwilr.ch';
        $server2->rcon_port     = '2599';
        $server2->rcon_password = 'passwd';
        $server2->save();


    }
}