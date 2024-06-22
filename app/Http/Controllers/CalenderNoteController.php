<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalenderNote;

class CalenderNoteController extends Controller
{
    public function index()
    {
        $notes = CalenderNote::all();
        return response()->json($notes);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'note' => 'nullable|string',
        ]);

        $note = CalenderNote::updateOrCreate(
            ['date' => $validatedData['date']],
            ['note' => $validatedData['note']]
        );

        return response()->json($note);
    }
}