@extends('layouts.app')

@section('title', 'Create new task')

@section('content')
<h3>Create a new task</h3>
<form method="POST" action="/tasks">
    @csrf
    <div class="form-floating mb-3">
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Type task title here...">
        <label for="title">Title</label>
    </div>
    <div class="form-floating mb-3">
        <textarea class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Type task description here..." id="description" style="height: 100px"></textarea>
        <label for="description">Description</label>
    </div>

    <div class="form-floating mb-3">
        <select class="form-select @error('groups') is-invalid @enderror" name="groups[]" id="floatingSelect" multiple style="height: 160px; text-transform: capitalize;">
            <option selected><i>None</i></option>
            @foreach ($groups as $group)
                <option value="{{$group}}">{{$group}}</option>
            @endforeach
        </select>
        <label for="floatingSelect">Groups</label>
    </div>

    <button type="submit" class="btn btn-primary">Create</button>
    </form>
</form>

@endsection
