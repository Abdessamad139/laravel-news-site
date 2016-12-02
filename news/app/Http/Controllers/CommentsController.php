<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CommentsController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth', ['except' => 'index']);
	}

	public function get($id)
	{
		// $comments = DB::table('comments')
		// ->where('storyid', '=', $id)
		// ->get();

		return Response::json(Comment::get());

	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    	return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Comment::create(array(
            'userid' => Auth::id(),
            'storyid' => Input::get('storyid'),
            'content' => Input::get('text')
        ));
    
        return Response::json(array('success' => true));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    	$task = Task::findOrFail($id);

    	return view('tasks.show')->withTask($task);    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    	$task = Task::findOrFail($id);

    	return view('tasks.edit')->withTask($task);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    	$task = Task::findOrFail($id);

    	$this->validate($request, [
    		'title' => 'required',
    		'description' => 'required'
    		]);

    	$input = $request->all();

    	$task->fill($input)->save();

    	Session::flash('flash_message', 'Task successfully added!');

    	return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    	$comment = Comment::findOrFail($id);

    	$comment->delete();

    	Session::flash('flash_message', 'Comment successfully deleted!');

    	return redirect()->route('tasks.index');
    }
  }
