<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        //sleep(3);
        //$posts = Post::whereDate('created_at', Carbon::today())->get();
        $tasks = Task::query()->with('list')->withCount('subtasks')->get();

        return response()->json([
            'tasks' => $tasks,
        ]);
    }

    public function show($task_id)
    {
        $task = Task::query()->where('id', $task_id)->with('list', 'subtasks')->get();

        return response()->json([
            'task' => $task,
        ]);
    }

    public function store(Request $request)
    {
        $attrs = $request->validate([
            'task_name' => 'required|string',
        ]);

        $task = Task::query()->create([
            'task_name' => $attrs['task_name']
        ]);

        return response()->json([
            'task' => $task,
        ]);
    }
}
