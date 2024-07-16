<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'user_id' => 'required'
        ]);

        Task::create($validatedData);

        return redirect()->route('tasks.index')
            ->with('success', 'Task created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::find($id);

        if (empty($task)) {
            return redirect()->route('tasks.index')->with('errors', 'Tarea no encontrada.');
        }

        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = auth()->user();

        $task = Task::find($id);

        if (empty($task)) {
            return redirect()->route('tasks.index')->with('errors', 'Tarea no encontrada.');
        }

        // Verifica si el usuario tiene permiso para actualizar la tarea
        if (!Gate::allows('update-task', $task)) {
            abort(403, 'No tienes permiso para actualizar esta tarea.');
        }

        // Validar los datos de entrada
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'user_id' => 'required'
        ]);

        $task->update($validatedData);

        return redirect()->route('tasks.index', $task)->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $user = auth()->user();

        if (empty($task)) {
            return redirect()->route('tasks.index')->with('success', 'Tarea no encontrada.');
        }

        // Verifica si el usuario tiene permiso para eliminar la tarea
        if (!Gate::allows('delete-task', $task)) {
            abort(403, 'No tienes permiso para eliminar esta tarea.');
        }

        $task->delete();

        return redirect()->route('tasks.index', $task)->with('success', 'Task delete successfully.');
    }
}
