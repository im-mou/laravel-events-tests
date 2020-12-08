<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\TaskServiceInterface;
use App\Models\Task;

class TaskService implements TaskServiceInterface
{
    public function getAllTasks()
    {
        return Task::all();
    }

    public function createTask(Request $request)
    {
        // validate

        // convert groups to pipes

        // new model using resources
    }
}
