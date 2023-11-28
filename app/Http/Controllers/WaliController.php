<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WaliController extends Controller
{
    public function home()
    {
        $user = Auth::user();
        $role = $user->role; 

        $date = Carbon::now()->subDays(1);

        $nilais = DB::table('mapels')
            ->select('mapels.mapel', 'nilais.tanggal', 'mapels.uu_mapel', 'nilais.tahun_ajaran', 'nilais_attrs.kegiatan', 'aspek_k_d_s.kd', DB::raw('MAX(GREATEST(nilais.cl, nilais.hk, nilais.ca)) AS nilai_hasil'))
            ->leftJoin('nilais', 'mapels.uu_mapel', '=', 'nilais.uu_mapel')
            ->leftJoin('nilais_attrs', 'mapels.uu_mapel', '=', 'nilais_attrs.uu_mapel')
            ->leftJoin('aspek_k_d_s', 'nilais_attrs.uu_kd', '=', 'aspek_k_d_s.uu_kd')
            ->where('nilais.tanggal', '>=', $date)
            ->where('nilais_attrs.tanggal', '>=', $date)
            ->where('nilais.uuid_m', Auth::user()->uuid)
            ->groupBy('mapels.mapel', 'nilais.tanggal', 'mapels.uu_mapel', 'nilais_attrs.kegiatan', 'aspek_k_d_s.kd', 'nilais.tahun_ajaran')
            ->get();

        // $informasi = Information::where('status', 0)->orderBy('created_at', 'desc')->get();   

        $informasi = DB::table('information')
            ->select('title', 'text', 'status', 'created_at', 'id')
            ->take(3)
            ->where('status', 3)
            ->orderBy('created_at', 'desc')
            ->get();


        $infopush = DB::table('information')
            ->select('title', 'text', 'status', 'created_at', 'id')
            ->where('status', 0)
            ->take(1)
            ->inRandomOrder()
            ->get();

        $now = Carbon::now();

        foreach ($informasi as $info) {
            $timestamp = Carbon::createFromTimeString($info->created_at);
            $diffInHours = $timestamp->diffInHours($now);
            if ($diffInHours >= 3) {
                $info->created_at = $timestamp->diffForHumans(['short' => true]);
            } else {
                $info->created_at = $timestamp->diffForHumans(['short' => true, 'parts' => 2]);
            }
        }

        foreach ($infopush as $info) {
            $timestamp = Carbon::createFromTimeString($info->created_at);
            $diffInHours = $timestamp->diffInHours($now);
            if ($diffInHours >= 3) {
                $info->created_at = $timestamp->diffForHumans(['short' => true]);
            } else {
                $info->created_at = $timestamp->diffForHumans(['short' => true, 'parts' => 2]);
            }
        }

        $informasi_class = DB::table('information')
            ->select('title', 'text', 'status', 'created_at', 'id')
            ->where('status', 0)
            ->where('uu_class', $user->murid->uu_class)
            ->take(3)
            ->orderBy('created_at', 'desc')
            ->get();


        $infopush_class = DB::table('information')
            ->select('title', 'text', 'status', 'created_at', 'id')
            ->where('status', 0)
            ->where('uu_class', $user->murid->uu_class)
            ->take(1)
            ->inRandomOrder()
            ->get();

        $now = Carbon::now();

        foreach ($informasi_class as $info_class) {
            $timestamp = Carbon::createFromTimeString($info_class->created_at);
            $diffInHours = $timestamp->diffInHours($now);
            if ($diffInHours >= 3) {
                $info_class->created_at = $timestamp->diffForHumans(['short' => true]);
            } else {
                $info_class->created_at = $timestamp->diffForHumans(['short' => true, 'parts' => 2]);
            }
        }

        foreach ($infopush_class as $info_class) {
            $timestamp = Carbon::createFromTimeString($info_class->created_at);
            $diffInHours = $timestamp->diffInHours($now);
            if ($diffInHours >= 3) {
                $info_class->created_at = $timestamp->diffForHumans(['short' => true]);
            } else {
                $info_class->created_at = $timestamp->diffForHumans(['short' => true, 'parts' => 2]);
            }
        }

        $current_time = Carbon::now();
        $greeting = '';

        if ($current_time->hour >= 0 && $current_time->hour < 12) {
            $greeting = 'Selamat pagi';
        } elseif ($current_time->hour >= 12 && $current_time->hour < 15) {
            $greeting = 'Selamat siang';
        } elseif ($current_time->hour >= 15 && $current_time->hour < 18) {
            $greeting = 'Selamat sore';
        } else {
            $greeting = 'Selamat malam';
        }

        return view('wali.home', compact('nilais', 'informasi', 'infopush', 'greeting', 'informasi_class', 'infopush_class'));
    }
}
