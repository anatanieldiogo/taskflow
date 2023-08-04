<?php

namespace App\Http\Controllers;

use App\Models\Lists;
use App\Models\Task;
use Illuminate\Http\Request;

class ListsController extends Controller
{
    public function index()
    {
        $lists = Lists::query()->withCount('tasks')->get();

        return response()->json([
            'lists' => $lists,
        ]);
    }

    public function store(Request $request)
    {

        $attrs = $request->validate([
            'list_name' => 'required|string',
            'list_color' => 'required|string|',
        ]);

        $list = Lists::query()->create([
            'list_name' => $attrs['list_name'],
            'list_color' => $attrs['list_color']
        ]);

        return response()->json([
            'list' => $list,
        ]);
    }

    public function show($list_id)
    {
        $list = Lists::query()->find($list_id);

        $tasks_from_this_list = Task::query()
            ->where('task_list_id', $list_id)
            ->with('list')->withCount('subtasks')->orderBy('id', 'desc')->get();

            //dd($list);

        return view('lists', compact('tasks_from_this_list', 'list'));
    }
}
