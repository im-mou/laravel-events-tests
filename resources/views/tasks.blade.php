@extends('layouts.app')

@section('title', 'Tasks')

@section('content')

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

    <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
        <div class="grid grid-cols-1 md:grid-cols-2">

            <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                <div class="flex items-center">
                    <div class="w-8 h-8 text-gray-500"></div>
                    <div class="ml-4 text-lg leading-7 font-semibold">Create a new task</div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                        Click here to create a new task
                    </div>
                    <a class="mt-2 btn btn-primary" href="/tasks/create" role="button">New task</a>
                </div>
            </div>


            @foreach ($tasks as $task)
                <div class="task-item-{{$task->id}}">
                    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <div class="ml-4 text-lg leading-7 font-semibold">{{ $task->title }}</div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">{{ $task->description }}</div>
                        </div>

                        <div class="ml-12 mt-3">

                            @foreach($task->groups as $group)
                                <span class="badge bg-success">{{$group}}</span>
                            @endforeach

                        </div>

                        <div class="ml-12 mt-3">
                            <a href="/tasks/{{$task->id}}">Show Task</a>
                            ·
                            <a href="/tasks/{{$task->id}}/edit">Edit Task</a>
                            ·
                            <a data-id="{{$task->id}}" class="delete-task" href="javascript:void(0)">Delete Task</a>
                        </div>
                    </div>
                </div>

            @endforeach

        </div>
    </div>

</div>

@endsection
