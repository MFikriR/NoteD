<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quest;

class QuestController extends Controller
{
    public function index()
    {
        $quests = Quest::all();
        return view('quests.index', compact('quests'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'exp_reward' => 'required|integer',
        ]);

        Quest::create($request->all());

        return redirect()->route('quests.index')->with('success', 'Quest created successfully.');
    }
}
