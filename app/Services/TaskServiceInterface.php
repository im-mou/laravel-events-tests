<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

interface TaskServiceInterface
{
    public function getAllTasks();

    public function createTask(Request $request);
}
