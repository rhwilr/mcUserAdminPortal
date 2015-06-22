<?php namespace rhwilr\mcUserAdminPortal\Commands;

use rhwilr\mcUserAdminPortal\Commands\Command;
use rhwilr\mcUserAdminPortal\Models\User;
use Illuminate\Contracts\Bus\SelfHandling;
use Carbon\Carbon;

class UpdateWhitelist extends Command implements SelfHandling {

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
		$users = User::all();

		foreach ($users as $user)
		{
			\Bus::dispatch(
				new \rhwilr\mcUserAdminPortal\Commands\AddWhitelist($user->minecraft_username)
			);
		}


	}

}
