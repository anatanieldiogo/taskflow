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
        $tasks = Task::query()->with('list')->withCount('subtasks')->orderBy('id', 'desc')->get();

        return view('welcome', compact('tasks'));

        // return response()->json([
        //     'tasks' => $tasks,
        // ]);
    }

    public function show($task_id)
    {
        $task = Task::query()->where('id', $task_id)->with('list', 'subtasks')->get();

        return response()->json([
            'task' => $task,
        ]);
    }

    public function search($search)
    {
        $task = Task::query()->where('task_name', 'like', '%' . $search . '%')
        ->with('list', 'subtasks')->orWhereHas('list', function ($query) use ($search) {
            $query->where('list_name', 'like', '%'.$search.'%');
        })->get();

        return response()->json([
            'task' => $task,
        ], 200);
    }

    public function store(Request $request)
    {
        $attrs = $request->validate([
            'task_name' => 'required|string',
            'task_list_id' => 'nullable',
        ]);

        $task = Task::query()->create([
            'task_name' => $attrs['task_name'],
            'task_list_id' => $attrs['task_list_id']
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

        $task = Task::query()->find($attrs['task_id']);

        $task->update([
            'task_name' => $attrs['task_name'],
            'task_description' => $attrs['task_description'],
            'task_list_id' => $attrs['task_list'],
            'task_due_date' => $attrs['task_due_date'],
        ]);

        //Refatorar esta action, deve somente atualizar e nao ficar tambem com a responsabilidade de mostrar o dados atualizado

        $task = Task::query()->where('id', $attrs['task_id'])->with('list')->withCount('subtasks')->get();

        return response()->json([
            'task' => $task,
        ]);
    }

    public function markTaskAsDone(Request $request)
    {
        $attrs = $request->validate([
            'task_id' => 'required|integer',
            'new_value' => 'required|integer|between:0,1',
        ]);

        $task = Task::query()->where('id', $attrs['task_id'])->update([
            'task_status' => $attrs['new_value'],
        ]);

        return response()->json([
            'change' => $task,
        ]);
    }

    public function toDay()
    {
        //Carbon::setLocale('pt');
        $tasks = Task::whereDate('created_at', Carbon::today())->with('list')->withCount('subtasks')->orderBy('id', 'desc')->get();

        return view('today', compact('tasks'));
    }

    public function destroy($task_id)
    {

        $task = Task::query()->where('id', $task_id)->delete();

        return response()->json([
            'task' => $task,
        ]);
    }
}
