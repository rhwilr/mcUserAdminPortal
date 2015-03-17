<?php

namespace rhwilr\mcUserAdminPortal\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PageController extends AbstractController
{
    /**
     * The home page path.
     *
     * @var string
     */
    protected $path;
    /**
     * Create a new instance.
     *
     * @param string $path
     *
     * @return void
     */
    public function __construct($path)
    {
        $this->path = $path;

        $this->setPermissions([
            'create'  => 'admin',
            'store'   => 'admin',
            'edit'    => 'admin',
            'update'  => 'admin',
            'destroy' => 'admin',
        ]);
        parent::__construct();
    }
    /**
     * Redirect to the homepage.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Session::flash('', ''); // work around laravel bug if there is no session yet
        Session::reflash();
        return Redirect::to($this->path);
    }
    /**
     * Show the specified page.
     *
     * @param string $slug
     *
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        $this->checkPage($slug);
        return View::make('pages.'.$slug);
    }

    protected function checkPage($slug)
    {
        if (!$slug) {
            if ($slug == 'home') {
                throw new \Exception('The Homepage Is Missing');
            }
            throw new NotFoundHttpException('Page Not Found');
        }
    }
}