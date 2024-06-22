<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all();
        return view('settings.index', compact('settings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required|unique:settings',
            'value' => 'required|image',
        ]);

        $path = $request->file('value')->store('backgrounds', 'public');

        Setting::create([
            'key' => $request->key,
            'value' => $path,
        ]);

        return redirect()->route('settings.index')->with('success', 'Setting created successfully');
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
            'key' => 'required|unique:settings,key,'.$setting->id,
            'value' => 'nullable|image',
        ]);

        if ($request->hasFile('value')) {
            // Delete old file
            if ($setting->value) {
                Storage::disk('public')->delete($setting->value);
            }

            // Upload new file
            $path = $request->file('value')->store('backgrounds', 'public');
            $setting->update([
                'key' => $request->key,
                'value' => $path,
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

        // Delete associated file
        if ($setting->value) {
            Storage::disk('public')->delete($setting->value);
        }

        $setting->delete();

        return redirect()->route('settings.index')->with('success', 'Setting deleted successfully');
    }

    public function changeBackground()
    {
        return view('settings.changeBackground');
    }

    public function brightness()
    {
        return view('settings.brightness');
    }
}
