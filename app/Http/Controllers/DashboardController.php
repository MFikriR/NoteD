<?php

// DashboardController.php
namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use App\Models\Setting; // Import model Setting
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data catatan dari database
        $notes = Note::latest()->limit(3)->get();

        // Ambil data background dari pengaturan
        $background = Setting::where('key', 'dashboard_background')->first();

        // Kirim data catatan dan background ke view
        return view('dashboard', compact('notes', 'background'));
    }

    public function showDataPengguna()
    {
        $data['users'] = User::all();

        return view('data_pengguna',$data);
    }
}
