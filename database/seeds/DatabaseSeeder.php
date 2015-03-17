<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model as Eloquent;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('rhwilr\mcUserAdminPortal\Seeds\GroupsTableSeeder');
		$this->call('rhwilr\mcUserAdminPortal\Seeds\UsersTableSeeder');
		$this->call('rhwilr\mcUserAdminPortal\Seeds\UsersGroupsTableSeeder');
	}

}
