<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Session;
use Auth;
use DB;

class TasksController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $uid = Auth::id();

        $tasks = DB::table('tasks')
                     ->where('userid', '=', $uid)
                     ->orderBy('created_at', 'desc')
                     ->get();

        // $tasks = Task::all();

        return view('tasks.index')->withTasks($tasks);
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
        //validate input
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'url' => 'required'
            ]);
        // adding news to database
        $input = $request->all();

        $title = $request->input('title');
        $description = $request->input('description');
        $url = $request->input('url');
        $userid = Auth::id();

        // Task::create($input);
        Task::create(['title' => $title, 'description' => $description, 'url' => $url, 'userid' => $userid]);

        Session::flash('flash_message', 'Story successfully added!');

        return redirect()->back();

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

        return view('tasks.show')->withTask($task);    }

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
        $task = Task::findOrFail($id);

        $task->delete();

        Session::flash('flash_message', 'Task successfully deleted!');

        return redirect()->route('tasks.index');
    }
}
