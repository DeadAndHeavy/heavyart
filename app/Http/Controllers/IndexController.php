<?php namespace App\Http\Controllers;

class IndexController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        var_dump('111');die;
    }

    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function index()
    {
        var_dump('1111');die;
        return view('Index page');
    }

}
