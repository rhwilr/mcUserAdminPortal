<?php namespace rhwilr\mcUserAdminPortal\Models;

use Illuminate\Database\Eloquent\Model;

class Server extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'servers';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'host', 'rcon_port', 'rcon_password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['rcon_password'];

}
