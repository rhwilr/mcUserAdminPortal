<?php namespace rhwilr\mcUserAdminPortal\Models;

use GrahamCampbell\Credentials\Models\User as CredentialsUser;
/**
 * This is the user model class.
 */
class User extends CredentialsUser
{
	/**
	 * Get the presenter class.
	 *
	 * @return string
	 */
	public function getPresenterClass()
	{
		return 'rhwilr\mcUserAdminPortal\Presenters\UserPresenter';
	}
	/**
	 * Before deleting an existing model.
	 *
	 * @return void
	 */
	public function beforeDelete()
	{

	}
}
