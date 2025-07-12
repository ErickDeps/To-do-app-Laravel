<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())->where('status', null)->paginate(4);

        return view('index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        $data = $request->validated();

        $data['user_id'] = Auth::id();

        Task::create($data);

        return redirect()->route('index')->with('success', 'Task created successfully !');
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $task = Task::findOrFail($id);
        return view('show', compact('task'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $task = Task::findOrFail($id);
        return view('edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, string $id)
    {
        $task = Task::findOrFail($id);
        $task->update($request->validated());
        return redirect()->route('edit', $id)->with('success', 'Task updated successfully !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('index')->with('success', 'Task deleted succcessfully !');
    }

    public function showCompletedTasks()
    {
        $tasks = Task::where('user_id', Auth::id())->where('status', 'completed')->paginate(4);

        return view('completed_tasks', compact('tasks'));
    }

    public function completed(String $id)
    {
        $task = Task::where('id', $id)->whereNull('status')->firstOrFail();
        $task->update(['status' => 'completed']);
        return redirect()->route('index')->with('success', 'Task completed successfully !');
    }

    public function noCompleted(String $id)
    {
        $task = Task::where('id', $id)->where('status', 'completed')->firstOrFail();
        $task->update(['status' => null]);
        return redirect()->route('completed.tasks')->with('success', 'Task restored successfully !');
    }
}
