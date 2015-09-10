<?php namespace App\Http\Controllers;

use App\Comics;
use App\User;

class IndexController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function index()
    {
        $bestComicses = Comics::orderBy('likes', 'DESC')->take(3)->get();
        $lastAddedComicses = Comics::orderBy('created_at', 'DESC')->take(3)->get();

        return view('index.index',
            [
                'bestComicses' => $bestComicses,
                'lastAddedComicses' => $lastAddedComicses,
            ]
        );
    }

}
