<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\StoretaskRequest;
use App\Http\Requests\UpdatetaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            ['id' => 1, 'title' => 'Task 1', 'description' => 'Description 1'],
            ['id' => 2, 'title' => 'Task 2', 'description' => 'Description 2'],
            ['id' => 3, 'title' => 'Task 3', 'description' => 'Description 3'],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoretaskRequest $request)
    {
        $validated = $request->validated(
            $request->only(['title', 'description'])
        );

        return response()->json($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(task $task)
    {
    info('Task retrieved', $task);
        //return the task from index where id = $task->id
        return response()->json([
            'id' => $task->id,
            'title' => $task->title,
            'description' => $task->description,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatetaskRequest $request, task $task)
    {
        $validated = $request->validated(
            $request->only(['title', 'description'])
        );

        return response()->json($validated);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(task $task)
    {
        error_log('Task deleted', $task);
        return response()->json([
            'id' => $task->id,
            'title' => $task->title,
            'description' => $task->description,
        ]);
    }
}
