<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        // Validasi input (opsional tapi bagus)

        // Loop semua input
        foreach ($request->except('_token') as $key => $value) {
            // Gunakan updateOrCreate agar data tersimpan meski sebelumnya kosong
            Setting::updateOrCreate(
                ['key' => $key], // Cari berdasarkan key
                ['value' => $value] // Update value-nya
            );
        }

        // PENTING: Hapus cache agar frontend langsung berubah
        // (Opsional, tapi sangat membantu jika pakai cache driver)
        \Illuminate\Support\Facades\Cache::forget('site_settings');

        return back()->with('success', 'Settings updated successfully.');
    }
}
