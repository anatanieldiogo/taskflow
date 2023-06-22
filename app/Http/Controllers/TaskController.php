<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        //sleep(3);
        $tasks = Task::query()->with('list')->withCount('subtasks')->get();

        return response()->json([
            'tasks' => $tasks,
        ]);
    }
}
