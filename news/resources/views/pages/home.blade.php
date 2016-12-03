@extends('layouts.master')

@section('content')

<h1>stories</h1>
<p class="lead">Manage your posts here. <a href="{{ route('tasks.create') }}">Add a new one?</a></p>
<hr>

<div class="container-fluid">
	<!-- list of tasks -->
	<div class="row">
		@foreach($tasks as $task)
		<div class="col-sm-4 story-grid">
			<h3 class="story-grid-titles">{{ $task->title }}</h3>
			<div style="height: 100px;">
			<p>{{ $task->description}}</p>
			</div>
			<p>
				<a href="{{ url('/getcommentpage', $task->id) }}" class="btn btn-default">Comments</a>
			</p>
			<hr>
		</div>
		@endforeach
	</div>
</div>

@stop