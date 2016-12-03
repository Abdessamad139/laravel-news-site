@extends('layouts.master')

@section('content')

<!-- the CSS styles for this page is inspired by Ravindu Jayalath's blog post at http://awithit.blogspot.com/2014/09/how-to-create-simple-comment-box-in.html -->

<a href="{{$task->url}}"><h1 class="story-grid-titles">{{ $task->title }}</h1></a>
<p class="date sub-text" id="dt">on {{$task->updated_at}}</p>                    
<p class="lead">{{ $task->description }}</p>

<hr>

<div class="row">
    <div class="col-md-6">
        <a href="{{ route('home') }}" class="btn btn-default">Back to all stories</a>
        <hr>

        <!-- list comments -->
        <div class="actionBox">
            <ul class="commentList">             
                @if (!empty($comments))
                @foreach ($comments as $cm)
                <div class="commentAnswerBox" style="background-color:#ade5f4"></div>
                <li>               
                    <div class="commentText">                    
                        <p class="" >{{$cm->content}}</p> 
                        <div style="margin-top:10px">                    
                            <p class="date sub-text" id="dt">on {{$cm->updated_at}}</p>                    
                        </div>
                    </div>
                    @if (Auth::id()==$cm->userid)
                    <br>
                    <div>
                        <span>
                        {!! Form::open([
                        'method' => 'DELETE',
                        'route' => ['comments.destroy', $cm->id]
                        ]) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-default']) !!}
                        {!! Form::close() !!}
                        </span>
                        <a href="{{ route('comments.edit', $cm->id) }}" class="btn btn-default">&nbsp;&nbsp;Edit&nbsp;&nbsp;&nbsp;</a>
                    </div>
                    @endif
                </li>              
                @endforeach  
                @endif
            </ul>      
        </div>

        <!-- add comments -->
        @if (Auth::guest())

        @else
        <div>

            <div class="actionBox">
                {{ Form::open(array('url'=>'/postcomment', 'method' => 'post' , 'class' => 'form-inline' )) }}        
                <div class="form-group" style="width:100%; position:relative">                             
                    {{ Form::textarea('commentText', null, ['class' => 'form-control', 'placeholder' => 'Add your comment', 'rows' => '4']) }}
                </div>
                {{ Form::hidden('storyid', $task->id) }}
                <div class="form-group">                
                    {{ Form::submit('Post Comment', array('class' => 'btn btn-block btn-primary' , 'style' => 'width:220px')) }}
                </div>
                {{ Form::close() }}         
            </div>
            <!-- check if input is valid -->
            @include('partials.alerts.errors')

        </div>
        @endif

    </div>
</div>

@stop