<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_name',
        'task_description',
        'task_list_id',
        'task_due_date',
    ];

    // protected $casts = [
    //     'task_due_date' => 'date:d M. y',
    //     'date' => 'date:ddmmyy'
    // ];
    
    public function list()
    {
        return $this->belongsTo(Lists::class, 'task_list_id');
    }

    public function subtasks()
    {
        return $this->hasMany(Subtask::class, 'subtask_task_id');
    }
}
