<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'deadline' => 'required|date|after_or_equal:start_date',
        ]);

        // Buat tugas baru
        Task::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'start_date' => $validated['start_date'],
            'deadline' => $validated['deadline'],
        ]);

        // Redirect ke halaman daftar tugas dengan pesan sukses
        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil ditambahkan!');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'deadline' => 'required|date',
        ]);

        $task->update($validatedData);

        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index');
    }

    public function complete(Task $task)
    {
        $task->completed = true;
        $task->save();

        $user = Auth::user();
        $currentDate = now();
        $deadline = $task->deadline;

        if ($currentDate <= $deadline) {
            $user->exp += $task->quest->exp;
        } else {
            $user->exp -= $task->quest->exp;
        }

        $user->save();

        return redirect()->route('tasks.index')->with('success', 'Task completed!');
    }

    
}
