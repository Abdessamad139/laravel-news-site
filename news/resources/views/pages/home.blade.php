@extends('layouts.master')

@section('content')

<h1>stories</h1>
<p class="lead">View all posts. <a href="{{ route('tasks.create') }}">Add a new one?</a></p>
<hr>

<div class="container-fluid">
	<!-- list of tasks -->
	<div class="row">
		@foreach($tasks as $task)
		<div class="col-sm-4 story-grid">
			<a href="{{$task->url}}"><h3 class="story-grid-titles">{{ $task->title }}</h3></a>
			<div style="height: 150px;">
				<p class="date sub-text" id="dt">on {{$task->updated_at}}</p>                    
				
				<p>{{ $task->description}}</p>
			</div>

			<table>
				<td>
					<!-- like feature -->
					@if(Auth::guest())

					<button type="button" class="btn btn-default glyphicon glyphicon-heart-empty" disabled>&nbsp;{{$task->likes->count()}}</button>
					@else

					@if (in_array(Auth::id(), $task->likes->pluck('userid')->toArray()))
					<!-- this user likes the post -->
					{{ Form::open(['route' => ['unlike', Auth::id(), $task->id]]) }}
					{{ Form::hidden('userid', Auth::id()) }}
					{{ Form::hidden('storyid', $task->id) }}
					<button type="submit" class="btn btn-default glyphicon glyphicon-heart">&nbsp;{{$task->likes->count()}}</button>
					{{ Form::close() }}

					@else
					<!-- this user hasnt liked the post -->
					{{ Form::open(['route' => 'likes.store']) }}
					{{ Form::hidden('userid', Auth::id()) }}
					{{ Form::hidden('storyid', $task->id) }}
					<button type="submit" class="btn btn-default glyphicon glyphicon-heart-empty">&nbsp;{{$task->likes->count()}}</button>
					{{ Form::close() }}
					@endif
					@endif
				</td>
				
				<td>
					<a href="{{ route('getcomments', $task->id) }}" class="btn btn-default">Comments</a>
				</td>
			</table>
			
			
			
			<hr>
		</div>
		@endforeach
	</div>
</div>

@stop