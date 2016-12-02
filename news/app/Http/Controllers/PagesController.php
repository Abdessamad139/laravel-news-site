<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class PagesController extends Controller
{
  //
	public function home()
	{
		$tasks = Task::all();

		return view('pages.home')->withTasks($tasks);
	}

}
