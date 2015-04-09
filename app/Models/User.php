<?php namespace rhwilr\mcUserAdminPortal\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;
	use EntrustUserTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password', 'patron_active', 'patron_plan', 'plan_ends_at', 'minecraft_username'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	public function subscribe($plan, $end)
	{
		$this->deactivate();
		$this->patron_plan = $plan;
		$this->plan_ends_at = $end;
		return $this->save();
	}

	public function activate()
	{
		$this->patron_active = 1;
		return $this->save();
	}
	public function deactivate()
	{
		$this->patron_active = 0;
		$this->patron_plan = null;
		$this->plan_ends_at = null;
		return $this->save();
	}
}
