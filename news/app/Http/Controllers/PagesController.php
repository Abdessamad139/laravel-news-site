<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Like;

class PagesController extends Controller
{
  //
	public function home()
	{
		$tasks = Task::all();
		$likes = Like::all();

		$data = array(
			'tasks' => $tasks,
			'likes' => $likes
			);
		return view('pages.home')->with($data);
	}

}
