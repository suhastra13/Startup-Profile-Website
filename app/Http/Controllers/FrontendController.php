<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\BlogPost;
use App\Models\TeamMember;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class FrontendController extends Controller
{
    public function index()
    {
        // Data untuk Homepage
        $services = Service::where('is_active', true)->orderBy('order')->limit(3)->get();
        $portfolios = Portfolio::where('is_active', true)->where('is_featured', true)->latest()->limit(6)->get();
        $posts = BlogPost::where('is_published', true)->latest()->limit(3)->get();

        return view('frontend.home', compact('services', 'portfolios', 'posts'));
    }

    public function about()
    {
        $page = Page::where('slug', 'about')->first();
        $team = TeamMember::where('is_active', true)->orderBy('order')->get();
        return view('frontend.about', compact('page', 'team'));
    }

    public function services()
    {
        $services = Service::where('is_active', true)->orderBy('order')->get();
        return view('frontend.services', compact('services'));
    }

    public function portfolio(Request $request)
    {
        // Ambil semua kategori unik untuk tombol filter
        $categories = Portfolio::where('is_active', true)
            ->select('category')
            ->distinct()
            ->pluck('category');

        // Query dasar
        $query = Portfolio::where('is_active', true);

        // Jika ada request filter kategori
        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }

        $portfolios = $query->latest()->paginate(9)->withQueryString();

        return view('frontend.portfolio', compact('portfolios', 'categories'));
    }

    public function blog()
    {
        $posts = BlogPost::where('is_published', true)->latest()->paginate(6);
        return view('frontend.blog', compact('posts'));
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function serviceShow($slug)
    {
        $service = Service::where('slug', $slug)->where('is_active', true)->firstOrFail();
        return view('frontend.service_detail', compact('service'));
    }

    // DETAIL PORTFOLIO
    public function portfolioShow($slug)
    {
        $portfolio = Portfolio::where('slug', $slug)->where('is_active', true)->firstOrFail();
        // Ambil project lain untuk "Related Projects"
        $related = Portfolio::where('is_active', true)
            ->where('id', '!=', $portfolio->id)
            ->limit(3)
            ->get();

        return view('frontend.portfolio_detail', compact('portfolio', 'related'));
    }

    // DETAIL BLOG
    public function blogShow($slug)
    {
        $post = BlogPost::where('slug', $slug)->where('is_published', true)->firstOrFail();

        // Tambah view counter
        $post->increment('views');

        return view('frontend.blog_detail', compact('post'));
    }

    public function contactStore(Request $request)
    {
        // 1. Validasi (Sama seperti sebelumnya)
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // 2. Simpan ke Database (Sama seperti sebelumnya)
        ContactMessage::create(array_merge($data, ['is_read' => false]));

        // 3. KIRIM EMAIL (INI BAGIAN BARUNYA)
        // Ganti email di bawah dengan email admin penerima
        try {
            Mail::to('admin_wokiltech@gmail.com')->send(new ContactFormMail($data));
        } catch (\Exception $e) {
            // Biarkan kosong agar jika internet mati, user tidak error,
            // atau log errornya: Log::error($e->getMessage());
        }

        return redirect()->back()->with('success', 'Pesan terkirim! Admin telah dinotifikasi.');
    }
}
