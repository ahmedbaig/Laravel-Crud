<?php

namespace App\Http\Controllers;
use App\Task;
use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // die(__METHOD__);
        $tasks = Task::all();
        return view('task.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
      // echo '<pre>';print_r($request->all());die;
      // var_dump($request->input('title'));die;
        // $create = Task::create([
        //   'title'=>$request->input('title'),
        //   'body'=>$request->input('body')
        // ]);

        $task = new Task;

        $task->title = $request->input('title');
        $task->body = $request->input('body');

        $task->save();

        return redirect()->route('task.index')->with('message', 'Task has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo 'show scene';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return view('task.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, Task $task)
    {

        $task->title = $request->title;
        $task->body = $request->body;
        $task->save();

        return redirect()->route('task.index')->with('message', 'Task has been updated');
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task){
        $task->delete();
        return redirect()->route('task.index')->with('message', 'Task has been delete');
    }
}
