@extends('layouts.master')

@section('content')

<h1>{{ $task->title }} - logged in</h1>
<p class="lead">{{ $task->description }}</p>
<hr>

<div class="row">
    <div class="col-md-6">
        <a href="{{ route('tasks.index') }}" class="btn btn-info">Back to all tasks</a>
        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">Edit Task</a>
    </div>
    <div class="col-md-6 text-right">
        {!! Form::open([
            'method' => 'DELETE',
            'route' => ['tasks.destroy', $task->id]
        ]) !!}
            {!! Form::submit('Delete this task?', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
    <div>
        <!-- comment form -->
        {!! Form::open([
        'route' => 'guest.store'
        ]) !!}

        <div class="form-group">
            {!! Form::label('comment', 'Comment:', ['class' => 'control-label']) !!}
            {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}
        </div>

        {{ Form::hidden('id', Auth::id()) }}

        {!! Form::submit('Add New Story', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}

        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">Comment</a>
    </div>
</div>

@stop