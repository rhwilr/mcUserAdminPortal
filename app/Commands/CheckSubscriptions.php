<?php namespace rhwilr\mcUserAdminPortal\Commands;

use rhwilr\mcUserAdminPortal\Commands\Command;
use rhwilr\mcUserAdminPortal\Models\User;
use Illuminate\Contracts\Bus\SelfHandling;
use Carbon\Carbon;

class CheckSubscriptions extends Command implements SelfHandling {

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
		$users = User::where('patron_active', '=', 1)->where('plan_ends_at', '<=', Carbon::now())->get();

		foreach ($users as $user)
		{
			\Bus::dispatch(
				new \rhwilr\mcUserAdminPortal\Commands\DeactivateSubscription($user->minecraft_username)
			);
			$user->deactivate();
		}


	}

}
