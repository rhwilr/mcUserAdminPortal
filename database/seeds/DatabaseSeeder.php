<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('rhwilr\mcUserAdminPortal\Seeds\UserTableSeeder');
		$this->call('rhwilr\mcUserAdminPortal\Seeds\RoleTableSeeder');
		$this->call('rhwilr\mcUserAdminPortal\Seeds\PermissionTableSeeder');
		$this->call('rhwilr\mcUserAdminPortal\Seeds\ServerTableSeeder');
	}

}
