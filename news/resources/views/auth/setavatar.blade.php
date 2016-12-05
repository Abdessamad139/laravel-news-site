@extends('layouts.master')

@section('content')

<h1> Set Avatar </h1>
<p class="lead">View/Choose your avatar below. </p>
<hr>

<!-- messages -->
@include('partials.alerts.errors')

<div class="center">
	<p>{{$avatar}}</p>
<img class="img-responsive" src="/img/avatars/{{ $avatar }}" style="width:300px;height:300px;">
</div>

<!-- file upload form -->

{!! Form::open(
    array(
        'route' => 'users.store', 
        'class' => 'form', 
        'novalidate' => 'novalidate', 
        'files' => true)) !!}


<div class="form-group">
    {!! Form::label('Upload New Image') !!}
    {!! Form::file('image', null) !!}
</div>

<div class="form-group">
    {!! Form::submit('Set Avatar') !!}
</div>
{!! Form::close() !!}
</div>

@stop