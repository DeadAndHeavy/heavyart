<?php namespace App\Http\Controllers;

use App\Http\Requests\addTaskRequest;
use App\Task;
use Illuminate\Support\Facades\Auth;

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

        return view('task.index',
            [
                'tasks' => $tasks,
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
                ]);

                $tasks = Task::orderBy('created_at')->get();

                $returnHTML = view('sections.comics_tasks')->with('tasks', $tasks)->render();

                return response()->json(array('success' => true, 'html' => $returnHTML));
            }
        }
    }
}
