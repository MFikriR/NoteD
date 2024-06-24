<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class SettingController extends Controller
{
    public function index()
    {
        $background = Setting::where('key', 'dashboard_background')->first();
        $settings = Setting::all(); 

        return view('settings.index', [
            'background' => $background,
            'settings' => $settings,
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required|string',
            'value' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->file('value')) {
            $filePath = $request->file('value')->store('public/background');
            $fileName = basename($filePath);
            
            // Cek apakah entri dengan kunci 'dashboard_background' sudah ada
            $setting = Setting::where('key', 'dashboard_background')->first();

            if ($setting) {
                // Jika ada, perbarui entri yang ada
                if ($setting->value && Storage::disk('public')->exists($setting->value)) {
                    Storage::disk('public')->delete($setting->value);
                }
                $setting->value = 'background/' . $fileName;
                $setting->save();
            } else {
                // Jika tidak ada, buat entri baru
                $setting = new Setting();
                $setting->key = $request->key;
                $setting->value = 'background/' . $fileName;
                $setting->save();
            }
        }

        return redirect()->route('settings.index')->with('success', 'Setting created or updated successfully.');
    }

    public function edit($id)
    {
        $setting = Setting::findOrFail($id);
        return view('settings.edit', compact('setting'));
    }



    public function update(Request $request, $id)
    {
        $setting = Setting::findOrFail($id);

        $request->validate([
            'key' => 'required|unique:settings,key,' . $setting->id,
            'value' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->file('value')) {
            if ($setting->value && Storage::disk('public')->exists($setting->value)) {
                Storage::disk('public')->delete($setting->value);
            }

            $filePath = $request->file('value')->store('public/background');
            $fileName = basename($filePath);

            $setting->update([
                'key' => $request->key,
                'value' => 'background/' . $fileName,
            ]);
        } else {
            $setting->update([
                'key' => $request->key,
            ]);
        }

        return redirect()->route('settings.index')->with('success', 'Setting updated successfully');
    }


    public function destroy($id)
    {
        $setting = Setting::findOrFail($id);

        if ($setting->value && Storage::disk('public')->exists($setting->value)) {
            Storage::disk('public')->delete($setting->value);
        }

        $setting->delete();

        return redirect()->route('settings.index')->with('success', 'Setting deleted successfully');
    }
}
