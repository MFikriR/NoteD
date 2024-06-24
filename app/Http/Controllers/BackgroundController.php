<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackgroundController extends Controller
{
    public function showForm()
    {
        return view('background');
    }

    public function changeBackground(Request $request)
    {
        $request->validate([
            'color' => 'required|string',
        ]);

        $color = $request->input('color');
        return view('background', ['color' => $color]);
    }
}
