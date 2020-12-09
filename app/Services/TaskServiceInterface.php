<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Task;

interface TaskServiceInterface
{
    public function getAllTasks();

    public function createTask(Request $request);

    public function destroyTask(Task $task);

    public function showTask(Task $task);
}
