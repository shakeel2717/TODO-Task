<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // getting all taks
        $tasks  = Task::get();
        return view('task.index', compact("tasks"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'task' => 'required|string',
        ]);

        // saving data to database
        $task = new Task();
        $task->task = $validatedData['task'];
        $task->save();

        return redirect()->route('task.index')->with('success', 'New Task Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::find($id);
        return view("task.edit", compact("task"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'task' => 'required|string'
        ]);

        $task = Task::find($id);
        $task->task = $validatedData['task'];
        $task->save();

        return redirect()->route('task.index')->with('success', 'Task Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::find($id);
        $task->delete();

        return back()->with('success', 'Task Deleted Successfully');
    }
}
