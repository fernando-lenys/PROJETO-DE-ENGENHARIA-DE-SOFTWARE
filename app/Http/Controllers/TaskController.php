<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        
        $tasks = $user->tasks;
        
        return view('tasks.index')->with("tasks",$tasks);
    }

    public function create()
    {
      return view('tasks.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $task_data = $request->all();
        $task_data["user_id"] = $request->user()->id;
        $task_data["status"] = 1;
        Task::create($task_data);
        return redirect()->route('tasks.index')
            ->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::find($id);
        return view('tasks.show', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task = Task::find($id);
        $task->update($request->all());
        return redirect()->route('tasks.index')
            ->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect()->route('tasks.index')
          ->with('success', 'Task deleted successfully');
    }

    public function edit($id)
    {
      $task = Task::find($id);
      return view('tasks.edit', compact('task'));
    }
}
