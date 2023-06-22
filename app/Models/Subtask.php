<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subtask extends Model
{
    use HasFactory;

    protected $fillable = [
        'subtask_name',
        'subtask_task_id',
    ];
    
    public function task(){
        return $this->belongsTo(Task::class, 'subtask_task_id');
    }
}
