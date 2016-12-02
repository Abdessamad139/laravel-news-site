@extends('layouts.master')

@section('content')

<h1>{{ $task->title }}</h1>
<p class="lead">{{ $task->description }}</p>
<hr>

<div class="row">
    <div class="col-md-6">
        <a href="{{ route('home') }}" class="btn btn-default">Back to all tasks</a>
        <hr>

        <!-- list comments -->
        <div>
            <ul>
                @foreach($comments as $comment)
                <li>
                    <table>
                        <td><h5>{{ $comment->userid }}</h5></td>
                        <td><p>{{ $comment->content }}</p></td>
                        @if(Auth::id()=$comment->userid)
                        <td>
                            <!-- edit comment -->
                            <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-defult">Edit</a>
                            <!-- delete comment -->
                            {!! Form::open([
                            'method' => 'DELETE',
                            'route' => ['comments.destroy', $comment->id]
                            ]) !!}
                            {!! Form::submit('Delete this comment?', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                        @endif
                    </table>
                </li>
                @endforeach
            </ul>
        </div>
        @if (Auth::guest())

        @else
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
        @endif


    </div>
</div>

@stop