<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Guru;
use App\Models\Pengaduan;
use App\Models\Siswa;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function kepsek()
    {

        $countguru = Guru::all()->count();
        $countmurid = Siswa::where('status', '=', 1)->count();
        $imagemurid = Siswa::where('status', '=', 1)->take(4)->inRandomOrder()->get();
        $countpengaduan = Pengaduan::all()->count();
        $countkritik_saran = Faq::all()->count();

        $faqs = DB::table('faqs')
            ->leftJoin('siswas', 'faqs.uuid_m', '=', 'siswas.uuid_m')
            ->leftJoin('categories', 'faqs.uu_categori', '=', 'categories.uu_categori')
            ->leftJoin('users', 'siswas.uuid_m', '=', 'users.uuid')
            ->leftJoin('classes', 'siswas.uu_class', '=', 'classes.uu_class')
            ->select('categories.name', 'faqs.text', 'users.full_name', 'siswas.image', 'users.uuid', 'faqs.created_at', 'classes.name_class', 'faqs.id', 'siswas.cita_cita', 'siswas.hobby')
            ->orderBy('created_at', 'desc')
            ->where('faqs.status', 0)
            ->take(3)
            ->get();

        $now = Carbon::now();
        foreach ($faqs as $faq) {
            $timestamp = Carbon::parse($faq->created_at);
            $diffInHours = $timestamp->diffInHours($now);
            if ($diffInHours >= 3) {
                $faq->created_at = $timestamp->diffForHumans(['short' => true]);
            } else {
                $faq->created_at = $timestamp->diffForHumans(['short' => true, 'parts' => 2]);
            }
        }

        return view('kepsek.home', compact('countguru', 'countmurid', 'imagemurid', 'countpengaduan', 'faqs', 'countkritik_saran'));
    }

    public function guru_dashboard()
    {
        $user = Auth::user();
        $role = $user->role;

        $countmurid = Siswa::leftJoin('users', 'siswas.uuid_m', 'users.uuid')
            ->leftJoin('classes', 'siswas.uu_class', 'classes.uu_class')
            ->leftJoin('gurus', 'classes.uu_class', 'gurus.uu_class')
            ->where('gurus.uuid_g', Auth::user()->guru->uuid_g)
            ->where('siswas.status', 1)
            ->count();

        $imagemurid = Siswa::leftJoin('classes', 'siswas.uu_class', 'classes.uu_class')
            ->select('siswas.image as image_murid')
            ->leftJoin('gurus', 'classes.uu_class', 'gurus.uu_class')
            ->where('gurus.uuid_g', Auth::user()->guru->uuid_g)
            ->where('siswas.status', 1)
            ->take(4)
            ->inRandomOrder()
            ->get();

        $murid = DB::table('users')
            ->leftJoin('siswas', 'users.uuid', '=', 'siswas.uuid_m')
            ->leftJoin('classes', 'siswas.uu_class', '=', 'classes.uu_class')
            ->leftJoin('gurus', 'users.uuid', '=', 'gurus.uuid_g')
            ->select('users.full_name', 'siswas.telp_rumah', 'siswas.gender', 'classes.name_class', 'siswas.uuid_m', 'siswas.status')
            ->where('users.role', '=', 'wali')
            ->where('siswas.status', '=', 1)
            ->where('siswas.uu_class', $user->guru->uu_class)
            ->paginate(20);

        return view('guru.home', compact('countmurid', 'imagemurid', 'murid'));
    }
}
