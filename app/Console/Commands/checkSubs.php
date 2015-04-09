<?php namespace rhwilr\mcUserAdminPortal\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class checkSubs extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'checksubs';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Check the Subscriptions and deactivate.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		\Bus::dispatch(
		new \rhwilr\mcUserAdminPortal\Commands\CheckSubscriptions()
		);
	}

}
