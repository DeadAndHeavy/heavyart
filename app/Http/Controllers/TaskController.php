<?php namespace App\Http\Controllers;

use App\Http\Requests\addCommentRequest;
use App\Http\Requests\addTaskRequest;
use App\Task;
use App\TaskComment;
use App\User;
use App\TaskVote;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller {

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
    public function getIndex()
    {
        $tasks = Task::orderBy('created_at')->get();

        $userVotes = [];

        /* @var User $user */
        if ($user = Auth::user()) {
            $userVotes = $user->taskVotes->lists('task_id');
        }

        return view('task.index',
            [
                'tasks' => $tasks,
                'userVotes' => $userVotes,
            ]
        );
    }

    public function postAddTask(addTaskRequest $request)
    {
        if($request->ajax()) {
            if ($user = Auth::user()) {
                $userId = $user->id;

                Task::create([
                    'user_id' => $userId,
                    'task_text' => $request['task_text'],
                    'status' => 0,
                    'rating' => 0,
                ]);

                $tasks = Task::orderBy('created_at')->get();
                $userVotes = $user->taskVotes->lists('task_id');

                $returnHTML = view('sections.comics_tasks')->with('tasks', $tasks)->with('userVotes', $userVotes)->render();

                return response()->json(array('success' => true, 'html' => $returnHTML));
            }
        }
    }

    public function postVote(Request $request)
    {
        if($request->ajax()) {
            if ($user = Auth::user()) {

                $userId = $user->id;

                DB::Table('tasks')->whereId($request['task_id'])->increment('rating');

                TaskVote::create([
                    'user_id' => $userId,
                    'task_id' => $request['task_id'],
                ]);

                return response()->json(array('success' => true));
            }
        }
    }

    public function postUnvote(Request $request)
    {
        if($request->ajax()) {
            if ($user = Auth::user()) {

                $userId = $user->id;

                DB::Table('tasks')->whereId($request['task_id'])->decrement('rating');

                TaskVote::create([
                    'user_id' => $userId,
                    'task_id' => $request['task_id'],
                ]);

                return response()->json(array('success' => true));
            }
        }
    }

    public function postComment(addCommentRequest $request)
    {
        if($request->ajax()) {
            if ($user = Auth::user()) {
                $userId = $user->id;

                TaskComment::create([
                    'user_id' => $userId,
                    'task_id' => $request['task_id'],
                    'comment_text' => $request['comment_text'],
                ]);

                $currentTask = Task::findOrFail($request['task_id']);
                $taskComments = $currentTask->taskComments()->orderBy('created_at')->get();
                $taskCommentsCount = count($taskComments);

                $returnHTML = view('sections.comics_task_comments')->with('task', $currentTask)->render();

                return response()->json(array('success' => true, 'html' => $returnHTML, 'comments_count' => $taskCommentsCount));
            }
        }
    }
}
