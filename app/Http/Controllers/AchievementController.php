<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Achievement;

class AchievementController extends Controller
{
    public function index()
    {
        $achievements = Achievement::all();
        return view('achievements.index', compact('achievements'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Achievement::create($request->all());

        return redirect()->route('achievements.index')->with('success', 'Achievement created successfully.');
    }
}
