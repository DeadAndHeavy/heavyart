<?php namespace App\Http\Controllers;

use App\Comics;
use App\Comment;
use App\Like;
use App\Http\Requests\addCommentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ComicsController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show comics gallery.
     *
     * @return Response
     */
    public function index()
    {
        $comicses = Comics::orderBy('created_at', 'DESC')->get();

        return view('comics.index',
            [
                'comicses' => $comicses,
            ]
        );
    }

    public function page($id)
    {
        $currentComics = Comics::findOrFail($id);
        $otherComicses = Comics::where('id', '!=', $id)->get();
        $comments = $currentComics->comments()->orderBy('created_at')->get();

        if ($user = Auth::user()) {

            $liked = DB::table('likes')
                ->where('user_id', $user->id)
                ->where('comics_id', $id)
                ->first();
        } else {
            $liked = null;
        }

        return view('comics.page',
            [
                'comics' => $currentComics,
                'otherComicses' => $otherComicses,
                'comments' => $comments,
                'liked' => $liked,
            ]
        );
    }

    public function comment(addCommentRequest $request)
    {
        if($request->ajax()) {
            if ($user = Auth::user()) {
                $userId = $user->id;

                Comment::create([
                    'user_id' => $userId,
                    'comics_id' => $request['comics_id'],
                    'comment_text' => $request['comment_text'],
                ]);

                $currentComics = Comics::findOrFail($request['comics_id']);
                $comments = $currentComics->comments()->orderBy('created_at')->get();
                $commentsCount = count($comments);

                $returnHTML = view('sections.comics_comments')->with('comments', $comments)->render();

                return response()->json(array('success' => true, 'html' => $returnHTML, 'comments_count' => $commentsCount));
            }
        }
    }

    public function like(Request $request)
    {
        if($request->ajax()) {
            if ($user = Auth::user()) {

                $userId = $user->id;

                DB::Table('comicses')->whereId($request['comics_id'])->increment('likes');

                Like::create([
                    'user_id' => $userId,
                    'comics_id' => $request['comics_id'],
                ]);

                $comics = Comics::find($request['comics_id']);

                $returnHTML = view('sections.comics_likes')->with(['comics' => $comics, 'liked' => true])->render();

                return response()->json(array('success' => true, 'html' => $returnHTML, 'likes_count' => $comics->likes));
            }
        }
    }

}
