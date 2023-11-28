<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Raport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Exceptions\HttpResponseException;

class AkademikController extends Controller
{
    public function index()
    {
        return view('components.Akademik');
    }

    public function tahun_ajaran_nilai()
    {
        $mapels = Mapel::where('status', 0)->get();

        $tahun_ajar = DB::table('nilais')
            ->select('tahun_ajaran')
            ->groupBy('tahun_ajaran')
            ->get();

        return view('components.AkademikNilai', compact('mapels', 'tahun_ajar'));
    }

    public function tahun_ajaran_absen()
    {
        $tahun_ajar = DB::table('absensis')
            ->select('tahun_ajaran')
            ->groupBy('tahun_ajaran')
            ->get();

        return view('components.AkademikAbsen', compact('tahun_ajar'));
    }

    public function tahun_nilai($tahun_ajar)
    {
        $mapels = DB::table('mapels')
            ->whereExists(function ($query) use ($tahun_ajar) {
                $query->select(DB::raw(1))
                    ->from('mapels')
                    ->leftJoin('nilais', 'mapels.uu_mapel', '=', 'nilais.uu_mapel')
                    ->leftJoin('nilais_attrs', 'mapels.uu_mapel', '=', 'nilais_attrs.uu_mapel')
                    ->whereColumn('mapels.uu_mapel', 'nilais.uu_mapel')
                    ->where('tahun_ajaran', $tahun_ajar);
            })
            ->get();

        if ($mapels->isEmpty()) {
            return response()->view(abort(404, 'Page not found.'));
        }

        return view('components.AkademikMapel', compact('mapels', 'tahun_ajar'));
    }

    public function tahun_absen($tahun_ajar)
    {
        $absen = DB::table('absensis')
            ->select('tanggal', 'kehadiran', 'uuid_m')
            ->where('uuid_m', Auth::user()->murid->uuid_m)
            ->where('tahun_ajaran', $tahun_ajar)
            ->orderBy('tanggal', 'desc')
            ->get();


        if ($absen->isEmpty()) {
            return response()->view(abort(404, 'Page not found.'));
        }

        $uuid_m = Auth::user()->murid->uuid_m;

        $total_hadir = DB::table('absensis')
            ->where('uuid_m', $uuid_m)
            ->where('kehadiran', 1)
            ->where('tahun_ajaran', $tahun_ajar)
            ->count();

        $total_izin = DB::table('absensis')
            ->where('uuid_m', $uuid_m)
            ->where('kehadiran', 2)
            ->where('tahun_ajaran', $tahun_ajar)
            ->count();

        $total_sakit = DB::table('absensis')
            ->where('uuid_m', $uuid_m)
            ->where('kehadiran', 3)
            ->where('tahun_ajaran', $tahun_ajar)
            ->count();

        $total_alpa = DB::table('absensis')
            ->where('uuid_m', $uuid_m)
            ->where('kehadiran', 4)
            ->where('tahun_ajaran', $tahun_ajar)
            ->count();

        $total_kehadiran = $total_hadir + $total_alpa + $total_izin + $total_sakit;

        if ($total_kehadiran === 0) {
            // Jika total_kehadiran sama dengan nol, anggap semua persentase sebagai 0
            $persentase_hadir = 0;
            $persentase_izin = 0;
            $persentase_sakit = 0;
            $persentase_alpa = 0;
        } else {
            // Menghitung persentase hanya jika total_kehadiran tidak nol
            $persentase_hadir = ($total_hadir * 100 / $total_kehadiran) * 1;

            // Menghindari pembagian dengan nol dengan mengecek total_kehadiran - total_alpa
            if ($total_kehadiran !== 0) {
                $persentase_hadir = ($total_hadir * 100) / $total_kehadiran;
                $persentase_izin = ($total_izin * 100) / $total_kehadiran;
                $persentase_sakit = ($total_sakit * 100) / $total_kehadiran;
                $persentase_alpa = ($total_alpa * 100) / $total_kehadiran;
            } else {
                $persentase_hadir = 0;
                $persentase_izin = 0;
                $persentase_sakit = 0;
                $persentase_alpa = 0;
            }
        }

        $persentase_hadir_formatted = number_format($persentase_hadir, 1);
        $persentase_izin_formatted = number_format($persentase_izin, 1);
        $persentase_sakit_formatted = number_format($persentase_sakit, 1);
        $persentase_alpa_formatted = number_format($persentase_alpa, 1);

        return view('components.show.AkademikAbsen', compact('absen', 'persentase_hadir_formatted', 'persentase_izin_formatted', 'persentase_sakit_formatted', 'persentase_alpa_formatted'));
    }

    public function uu_mapel(Request $request, $tahun_ajar, $uu_mapel)
    {

        $mapels = Mapel::where('uu_mapel', $uu_mapel)
            ->first();

        // if ($mapels === null) {
        //     throw new HttpResponseException(abort(404, 'Page not found.'));
        // }


        $tahun_ajaran = Nilai::where('tahun_ajaran', $tahun_ajar)->first();

        $tanggal_terpilih = $request->input('tanggal');

        $nilais = DB::table('mapels')
            ->select('mapels.mapel', 'nilais.tanggal', 'mapels.uu_mapel', 'nilais.cl', 'nilais.hk', 'nilais.ca', DB::raw('MAX(GREATEST(nilais.cl, nilais.hk, nilais.ca)) AS nilai_hasil'))
            ->leftJoin('nilais', 'mapels.uu_mapel', '=', 'nilais.uu_mapel')
            ->leftJoin('nilais_attrs', 'mapels.uu_mapel', '=', 'nilais_attrs.uu_mapel')
            ->where('nilais.uu_mapel', $uu_mapel)
            ->where('nilais.uuid_m', Auth::user()->murid->uuid_m)
            ->whereBetween('nilais.tahun_ajaran', [$tahun_ajar, $tahun_ajar + 1])
            ->orderBy('nilais.tanggal', 'desc')
            ->groupBy('mapels.mapel', 'nilais.tanggal', 'mapels.uu_mapel', 'nilais.cl', 'nilais.hk', 'nilais.ca')
            ->get();

        if ($nilais->isEmpty()) {
            return abort(404, 'Page not found.');
        }

        $attrs = DB::table('mapels')
            ->select('nilais_attrs.kegiatan', 'aspek_k_d_s.kd', 'nilais_attrs.tanggal')
            ->leftJoin('nilais_attrs', 'mapels.uu_mapel', 'nilais_attrs.uu_mapel')
            ->leftJoin('aspek_k_d_s', 'nilais_attrs.uu_kd', '=', 'aspek_k_d_s.uu_kd')
            ->whereIn('nilais_attrs.tanggal', $nilais->pluck('tanggal')->toArray())
            ->where('nilais_attrs.uu_mapel', $uu_mapel)
            ->get();

        // dd($attrs);

        return view('components.show.AkademikNilai', compact('mapels', 'nilais', 'attrs', 'tahun_ajaran'));
    }

    public function guru()
    {
        $guru = DB::table('users')
            ->leftJoin('gurus', 'users.uuid', '=', 'gurus.uuid_g')
            ->leftJoin('classes', 'gurus.uu_class', '=', 'classes.uu_class')
            ->select('users.full_name', 'gurus.image', 'classes.name_class', 'gurus.tahun', 'gurus.telp')
            ->where('gurus.uu_class', Auth::user()->murid->uu_class)
            ->get();

        foreach ($guru as $g) {
            $tahun = Carbon::createFromFormat('Y', $g->tahun);
            $tahun_ajar = $tahun->diffInYears(Carbon::now());
            $g->tahun_ajar = $tahun_ajar;
        }

        return view('components.AkademikGuru', compact('guru', 'tahun_ajar'));
    }

    public function e_raport()
    {
        $tahun_ajar = DB::table('raports')
            ->select('tahun_ajaran')
            ->groupBy('tahun_ajaran')
            ->get();

        return view('components.AkademikRaport', compact('tahun_ajar'));
    }

    public function e_raport_tahun($tahun_ajar)
    {

        $user = Auth::user();
        $role = $user->role;

        $raport = DB::table('raports_attrs')
            ->leftJoin('mapels', 'raports_attrs.uu_mapel', 'mapels.uu_mapel')
            ->leftJoin('raports', 'raports_attrs.uuid_m', 'raports.uuid_m')
            ->where('raports.uuid_m', $user->murid->uuid_m)
            ->where('raports.tahun_ajaran', $tahun_ajar)
            ->get();

        $absensis = Raport::where('tahun_ajaran', $tahun_ajar)->first();

        return view('components.show.E_Raport', compact('raport', 'absensis'));
    }
}
