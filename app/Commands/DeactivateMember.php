<?php namespace rhwilr\mcUserAdminPortal\Commands;

use rhwilr\mcUserAdminPortal\Commands\Command;
use rhwilr\mcUserAdminPortal\Models\User;
use rhwilr\mcUserAdminPortal\Models\Server;
use Illuminate\Contracts\Bus\SelfHandling;
use rhwilr\mcUserAdminPortal\Classes\Rcon;

class DeactivateMember extends Command implements SelfHandling {

	protected $minecraft_username;
	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($minecraft_username)
	{
		$this->minecraft_username = $minecraft_username;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
		$servers = Server::all();
		foreach($servers as $server)
		{
			$rcon = new Rcon($server);
			$rcon->deactivate_member($this->minecraft_username);
		}
	}

}
