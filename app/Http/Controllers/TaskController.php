<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        //sleep(3);
        Carbon::setLocale('pt');
        //$tasks = Task::whereDate('created_at', Carbon::today())->with('list')->withCount('subtasks')->get();
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

    public function update(Request $request)
    {

        $attrs = $request->validate([
            'task_id' => 'required|integer',
            'task_name' => 'required|string',
            'task_description' => 'present|string|nullable',
            'task_list' => 'present|integer|nullable',
            'task_due_date' => 'present|date|nullable',
        ]);

        $task = Task::query()->find( $attrs['task_id']);

        $task->update([
            'task_name' => $attrs['task_name'],
            'task_description' => $attrs['task_description'],
            'task_list_id' => $attrs['task_list'],
            'task_due_date' => $attrs['task_due_date'],
        ]);

        $task = Task::query()->where('id', $attrs['task_id'])->with('list')->withCount('subtasks')->get();

        return response()->json([
            'task' => $task,
        ]);
    }

    public function destroy($task_id)
    {

        $task = Task::query()->where('id', $task_id)->delete();

        return response()->json([
            'task' => $task,
        ]);
    }
}
