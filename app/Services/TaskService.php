<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use App\Services\TaskServiceInterface;
use App\Models\Task;

use App\Http\Resources\Task as TaskResource;

class TaskService implements TaskServiceInterface
{
    public function getAllTasks()
    {
        return Task::all();
    }

    public function createTask(Request $request)
    {

        $task_data = $request->all();

        // validate
        $validator = Validator::make($task_data, [
            'title' => 'required',
            'description' => 'required',
            'groups' => 'sometimes|array',
        ]);

        if ($validator->fails()) {
            return redirect('/tasks/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        //Create new task
        $task = TaskResource::fromArray($task_data);
        if($task->save()) {
            return redirect('/tasks')->with('message', 'Task created succesfully');
        }
    }

    public function destroyTask(Task $task)
    {
        if ($task->delete()){
            return response()->json([
                'message' => 'Deleted succesfully'
            ], 200);
        }else{
            return response()->json([
                'message' => 'Error while updating sample'
            ], 422);
        }
    }

    public function showTask(Task $task) {

        if ($task->first()) {
            return $task;
        }else{
            return response('Task not found', 404)
                  ->header('Content-Type', 'text/plain');
        }
    }
}
