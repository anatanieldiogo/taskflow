<?php

namespace App\Http\Controllers;

use App\Models\Lists;
use Illuminate\Http\Request;

class ListsController extends Controller
{
    public function index(){
        $lists = Lists::query()->withCount('tasks')->get();

        return response()->json([
            'lists' => $lists,
        ]);
    }
}
