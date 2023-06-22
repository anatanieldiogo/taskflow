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
        ]);
    }
}
