<?php

namespace App\Http\Controllers;

use App\Models\Subtask;
use Illuminate\Http\Request;

class SubtaskController extends Controller
{
    public function store(Request $request)
    {
        $attrs = $request->validate([
            'subtask_name' => 'required|string',
            'subtask_task_id' => 'required|int',
        ]);

        $subtask = Subtask::query()->create([
            'subtask_name' => $attrs['subtask_name'],
            'subtask_task_id' => $attrs['subtask_task_id']
        ]);

        return response()->json([
            'subtask' => $subtask,
            //'subtask' => $subtask->load('task'),
        ]);
    }

    public function update(Request $request)
    {
        $attrs = $request->validate([
            'subtask_id' => 'required|integer',
            'new_value' => 'required|integer|between:0,1',
        ]);

        $subtask = Subtask::query()->where('id', $attrs['subtask_id'])->update([
            'subtask_status' => $attrs['new_value'],
        ]);

        return response()->json([
            'change' => $subtask,
        ]);
    }
}
