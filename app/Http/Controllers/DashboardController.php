<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data catatan dari database
        $notes = Note::all();

        // Kirim data catatan ke view
        return view('dashboard', compact('notes'));
    }

    public function showDataPengguna()
    {
        $data['users'] = User::all();

        return view('data_pengguna',$data);
    }

}
