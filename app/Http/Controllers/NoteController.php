<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    public function index()
    {
        // Ambil semua catatan
        $notes = Note::all();

        // Kirim data catatan ke view
        return view('notes.index', compact('notes'));
    }

    public function show($id)
    {
        // Ambil catatan berdasarkan ID
        $note = Note::findOrFail($id);

        // Kirim data catatan ke view
        return view('notes.show', compact('note'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Note::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('notes.index')->with('success', 'Catatan berhasil ditambahkan');
    }

    public function edit(Note $note)
    {
        return view('notes.edit', compact('note'));
    }

    public function update(Request $request, Note $note)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $note->update($request->all());

        return redirect()->route('notes.index');
    }

    public function destroy(Note $note)
    {
        $note->delete();
        return redirect()->route('notes.index');
    }
    
}
