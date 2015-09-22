<?php namespace App\Http\Controllers;

use App\Comics;
use App\User;
use Illuminate\Support\Facades\Hash;

class PeopleController extends Controller {

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
    public function getIndex()
    {
        $users = User::all();

        return view('people.index',
            [
                'users' => $users,
            ]
        );
    }

}
