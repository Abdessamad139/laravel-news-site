<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use DB;

class UsersController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function showAvatarPage()
    {
      // allows user to choose avatar
    	$user = Auth::user();
    	$avatar = $user->avatar;
    	return view('auth.setavatar')->withAvatar($avatar);
    }

    public function store(Request $request)
    {
    	$uid = Auth::id();
    	$imageName = $uid . '.' . $request->file('image')->getClientOriginalExtension();

    	// $path = 'img/avatars/'.$imageName;
    	// $request->file('image')->move(
    	// 	base_path() . '/public/img/avatars/', $imageName
    	// 	);
    	$request->file('image')->move(
    		'img/avatars/', $imageName
    		);

    	DB::table('users')->where('id', $uid)->update(['avatar' => $imageName]);

    	Session::flash('flash_message', 'New avater is set!');

    	return redirect()->back();

    }

    public function show($id)
    {
        //
    	$task = Task::findOrFail($id);

    	return view('tasks.show')->withTask($task);    
    }

    public function edit($id)
    {
        //
    	$task = Task::findOrFail($id);

    	return view('tasks.edit')->withTask($task);

    }

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

  }
