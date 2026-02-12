<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Import Model yang dibutuhkan untuk statistik
use App\Models\Project;
use App\Models\BlogPost;
use App\Models\ContactMessage;
use App\Models\Portfolio;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Ambil Statistik (Jumlah Data)
        $stats = [
            // Hitung project yang sedang aktif (pending atau in_progress)
            'projects_active' => Project::whereIn('status', ['pending', 'in_progress'])->count(),

            // Hitung blog yang statusnya published
            'blogs_published' => BlogPost::where('is_published', true)->count(),

            // Hitung pesan masuk yang belum dibaca
            'messages_unread' => ContactMessage::where('is_read', false)->count(),

            // Hitung total portfolio
            'portfolio_total' => Portfolio::count(),
        ];

        // 2. Ambil 5 Project Terbaru untuk tabel "Recent Projects"
        $recent_projects = Project::latest()->limit(5)->get();

        // 3. Kirim data ke View (path: admin/dashboard/index)
        return view('admin.dashboard.index', compact('stats', 'recent_projects'));
    }
}
