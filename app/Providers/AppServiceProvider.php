<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use App\Models\ContactMessage;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     * 
     */
    public const HOME = '/admin/dashboard';
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // 1. Share Settings ke Frontend (Kode Lama)
        try {
            if (Schema::hasTable('settings')) {
                $settings = Setting::all()->pluck('value', 'key');
                View::share('site_settings', $settings);
            }
        } catch (\Exception $e) {
            // Biarkan kosong
        }

        // 2. Share Jumlah Pesan Belum Dibaca ke Admin Sidebar (KODE BARU DISINI)
        // Kita gunakan 'admin.layouts.app' agar query ini hanya jalan di halaman admin
        View::composer('admin.layouts.app', function ($view) {
            try {
                $unread_count = ContactMessage::where('is_read', false)->count();
                $view->with('unread_count', $unread_count);
            } catch (\Exception $e) {
                $view->with('unread_count', 0);
            }
        });
    }
}
