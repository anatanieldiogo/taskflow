<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lists extends Model
{
    use HasFactory;

    protected $fillable = [
        'list_name',
        'list_color',
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class, 'task_list_id');
    }
}
