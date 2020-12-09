@extends('layouts.app')

@section('title', $task->title)

@section('content')

<div class="card" style="width: 18rem;">
  <div class="card-body">

    <h5 class="card-title mb-4 ">{{$task->title}}</h5>
    <h6 class="card-subtitle mb-2 text-muted">{{$task->create_at}}</h6>
    <p class="card-text">{{$task->description}}</p>

    @foreach($task->groups as $group)
        <span class="badge bg-success">{{$group}}</span>
    @endforeach

    <hr />

    <div class="mt-2">
        <a href="/tasks/{{$task->id}}/edit">Edit Task</a>
        ·
        <a data-id="{{$task->id}}" class="delete-task" href="javascript:void(0)">Delete Task</a>
    </div>
  </div>
</div>

@endsection
