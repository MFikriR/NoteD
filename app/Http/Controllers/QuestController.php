<?php

namespace App\Http\Controllers;

use App\Models\Quest;
use Illuminate\Http\Request;

class QuestController extends Controller
{
    public function index()
    {
        $quests = Quest::with('tasks')->get();

        return view('quests.index', compact('quests'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'due_date' => 'required|date',
        ]);

        Quest::create([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'exp' => 100, // contoh nilai EXP default
            'late_penalty' => 20, // contoh pengurangan EXP jika terlambat
        ]);

        return redirect()->route('quests.index');
    }

    // Metode lain untuk update dan complete quests
}
