<?php namespace rhwilr\mcUserAdminPortal\Commands;

use rhwilr\mcUserAdminPortal\Commands\Command;
use rhwilr\mcUserAdminPortal\Models\User;
use rhwilr\mcUserAdminPortal\Models\Server;
use Illuminate\Contracts\Bus\SelfHandling;
use rhwilr\mcUserAdminPortal\Classes\Rcon;

class ActivateSubscription extends Command implements SelfHandling {

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
		$server = Server::find(78);
		$rcon = new Rcon($server);
		$rcon->activate_player($this->minecraft_username);
	}

}
