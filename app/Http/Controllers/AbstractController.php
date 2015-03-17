<?php

namespace rhwilr\mcUserAdminPortal\Http\Controllers;

use rhwilr\mcUserAdminPortal\Http\Middleware\Auth\Admin;
use GrahamCampbell\Credentials\Http\Controllers\AbstractController as Controller;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Foundation\Validation\ValidatesRequests;
/**
 * This is the abstract controller class.
 *
 * @author Graham Campbell <graham@mineuk.com>
 */
abstract class AbstractController extends Controller
{
    use DispatchesCommands, ValidatesRequests;
    /**
     * A list of methods protected by admin permissions.
     *
     * @var string[]
     */
    protected $admins = [];

    /**
     * Create a new instance.
     *
     */
    public function __construct()
    {
        parent::__construct();
        if ($this->admins) {
            $this->middleware(Admin::class, ['only' => $this->admins]);
        }
    }
}