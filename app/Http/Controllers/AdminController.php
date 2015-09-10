<?php namespace App\Http\Controllers;

use App\Comics;
use App\Http\Requests\addComicsRequest;
use \Eventviva\ImageResize;

class AdminController extends Controller {

    public static $dimensions = [
        'gallery' => [
            'w' => 300,
            'h' => 188,
        ],
        'slider' => [
            'w' => 620,
            'h' => 305,
        ],
    ];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the admin panel.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.index');
    }

    public function getAddComics()
    {
        return view('admin.add_comics');
    }

    public function postAddComics(addComicsRequest $request)
    {

        /* @var Comics $comicsObject */
        $comicsObject = Comics::create([
            'name' => $request['comics_name'],
            'description' => $request['comics_description'],
            'likes' => 0,
        ]);

        $path = public_path('content/comics');

        //create gallery image
        $filename  = $comicsObject->id . '_gallery.jpg';
        $image = new ImageResize($request->file('comics_file')->getPathName());
        $image->crop(self::$dimensions['gallery']['w'], self::$dimensions['gallery']['h']);
        $image->save($path . '/' . $filename);

        //create slider image
        $filename  = $comicsObject->id . '_slider.jpg';
        $image->crop(self::$dimensions['slider']['w'], self::$dimensions['slider']['h']);
        $image->save($path . '/' . $filename);

        //create original image
        $filename  = $comicsObject->id . '_original.jpg';
        $request->file('comics_file')->move($path, $filename);

        return redirect('admin/add-comics')->with('message_ok', 'Комикс успешно создан');
    }
}
