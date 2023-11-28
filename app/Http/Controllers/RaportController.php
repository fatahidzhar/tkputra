<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Classe;
use App\Models\Mapel;
use App\Models\Raport;
use App\Models\Raports_attrs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RaportController extends Controller
{
    public function index()
    {

        $tahun_ajar = DB::table('nilais')
            ->select('tahun_ajaran')
            ->groupBy('tahun_ajaran')
            ->get();

        return view('components.DataRaport', compact('tahun_ajar'));
    }

    public function tahun_ajar($tahun_ajar)
    {
        $user = Auth::user();
        $role = $user->role;

        $classe = Classe::where('uu_class', $user->guru->uu_class)->get();
        $mapels = Mapel::where('status', 0)->get();

        $resultsAttrs = DB::table('mapels')
            ->selectRaw("SUBSTRING_INDEX(users.full_name, ' ', 1) AS full_name")
            ->leftJoin('nilais', 'mapels.uu_mapel', '=', 'nilais.uu_mapel')
            ->leftJoin('siswas', 'nilais.uuid_m', '=', 'siswas.uuid_m')
            ->leftJoin('users', 'siswas.uuid_m', '=', 'users.uuid')
            ->leftJoin('classes', 'siswas.uu_class', '=', 'classes.uu_class')
            ->leftJoin('nilais_attrs', 'mapels.uu_mapel', '=', 'nilais_attrs.uu_mapel')
            ->leftJoin('aspek_k_d_s', 'nilais_attrs.uu_kd', '=', 'aspek_k_d_s.uu_kd')
            ->where('siswas.uu_class', $user->guru->uu_class)
            ->groupBy('users.full_name', 'nilais_attrs.tanggal');

        $results = DB::table('mapels')
            ->selectRaw("SUBSTRING_INDEX(users.full_name, ' ', 1) AS full_name, siswas.uuid_m")
            ->leftJoin('nilais', 'mapels.uu_mapel', '=', 'nilais.uu_mapel')
            ->leftJoin('siswas', 'nilais.uuid_m', '=', 'siswas.uuid_m')
            ->leftJoin('users', 'siswas.uuid_m', '=', 'users.uuid')
            ->leftJoin('classes', 'siswas.uu_class', '=', 'classes.uu_class')
            ->leftJoin('nilais_attrs', 'mapels.uu_mapel', '=', 'nilais_attrs.uu_mapel')
            ->leftJoin('aspek_k_d_s', 'nilais_attrs.uu_kd', '=', 'aspek_k_d_s.uu_kd')
            ->where('siswas.uu_class', $user->guru->uu_class)
            ->where('nilais.tahun_ajaran', $tahun_ajar)
            ->groupBy('users.full_name', 'siswas.uuid_m');

        foreach ($mapels as $mapel) {
            $resultsAttrs->addSelect(DB::raw('MAX(IF(mapels.mapel = "' . $mapel->mapel . '", aspek_k_d_s.no_kd, 0)) AS ' . str_replace(' ', '_', $mapel->mapel) . '_uu_kd'));
            $resultsAttrs->addSelect(DB::raw('MAX(IF(mapels.mapel = "' . $mapel->mapel . '", nilais_attrs.kegiatan, 0)) AS ' . str_replace(' ', '_', $mapel->mapel) . '_uu_keg'));
        }


        foreach ($mapels as $mapel) {
            $results->addSelect(DB::raw('MAX(IF(mapels.mapel = "' . $mapel->mapel . '", aspek_k_d_s.no_kd, 0)) AS ' . str_replace(' ', '_', $mapel->mapel) . '_uu_kd'));
            $results->addSelect(DB::raw('MAX(IF(mapels.mapel = "' . $mapel->mapel . '", nilais_attrs.kegiatan, 0)) AS ' . str_replace(' ', '_', $mapel->mapel) . '_uu_keg'));
            $results->addSelect(DB::raw('MAX(IF(mapels.mapel = "' . $mapel->mapel . '", nilais.cl, 0)) AS ' . str_replace(' ', '_', $mapel->mapel) . '_nilai_cl'));
            $results->addSelect(DB::raw('MAX(IF(mapels.mapel = "' . $mapel->mapel . '", nilais.hk, 0)) AS ' . str_replace(' ', '_', $mapel->mapel) . '_nilai_hk'));
            $results->addSelect(DB::raw('MAX(IF(mapels.mapel = "' . $mapel->mapel . '", nilais.ca, 0)) AS ' . str_replace(' ', '_', $mapel->mapel) . '_nilai_ca'));
            $results->addSelect(DB::raw('GREATEST(
                    MAX(IF(mapels.mapel = "' . $mapel->mapel . '", nilais.cl, 0)),
                    MAX(IF(mapels.mapel = "' . $mapel->mapel . '", nilais.hk, 0)),
                    MAX(IF(mapels.mapel = "' . $mapel->mapel . '", nilais.ca, 0))
                ) AS ' . str_replace(' ', '_', $mapel->mapel) . '_nilai_nh'));
            $results->addSelect(DB::raw('MAX(IF(mapels.mapel = "' . $mapel->mapel . '", nilais.uu_mapel, NULL)) AS ' . str_replace(' ', '_', $mapel->mapel)));
        }

        $resultsAttrs = $resultsAttrs->get();
        $results = $results->get();

        $absensis = DB::table('absensis')
            ->select(
                'uuid_m',
                DB::raw("SUBSTRING_INDEX(users.full_name, ' ', 1) AS full_name"),
                DB::raw("COUNT(CASE WHEN kehadiran = '1' THEN 1 END) AS total_hadir"),
                DB::raw("COUNT(CASE WHEN kehadiran = '2' THEN 2 END) AS total_izin"),
                DB::raw("COUNT(CASE WHEN kehadiran = '3' THEN 3 END) AS total_sakit"),
                DB::raw("COUNT(CASE WHEN kehadiran = '4' THEN 4 END) AS total_alpha")
            )
            ->leftJoin('users', 'absensis.uuid_m', '=', 'users.uuid')
            ->leftJoin('gurus', 'users.uuid', '=', 'absensis.uuid_m')
            ->where('gurus.uuid_g', Auth::user()->uuid)
            ->where('absensis.tahun_ajaran', $tahun_ajar)
            ->groupBy('full_name', 'uuid_m');



        $absensis = $absensis->get();

        // dd($absensis);
        return view('components.show.Raport', compact('classe', 'mapels', 'results', 'resultsAttrs', 'absensis'));
    }

    public function store(Request $request)
    {
        $uuid = (string) Str::uuid();
        try {
            DB::transaction(function () use ($request, $uuid) {


                foreach ($request->nilais as $results => $resultsData) {
                    foreach ($resultsData as $innerData) {
                        $nilais = new Raports_attrs();

                        $nilais->uu_raport = $uuid;
                        $nilais->uuid_g = $innerData['uuid_g'];
                        $nilais->uuid_m = $innerData['uuid_m'];
                        $nilais->uu_mapel = $innerData['uu_mapel'];
                        $nilais->nilai = $innerData['nilai'];
                        $nilais->save();
                    }
                }
                foreach ($request->absensis as $index => $input) {
                    $absensis = new Raport();

                    $absensis->uu_raport = $uuid;
                    $absensis->uuid_m = $input['uuid_m'];
                    $absensis->izin = $input['izin'];
                    $absensis->sakit = $input['sakit'];
                    $absensis->alpha = $input['alpha'];
                    $absensis->tanggal = date('Y-m-d');
                    $absensis->save();
                }
            });
        } catch (\Illuminate\Database\QueryException $ex) {
            // Menghilangkan pesan kesalahan SQL yang mungkin sulit dimengerti oleh pengguna akhir
            $error_message = 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi atau hubungi administrator.';
            if (strpos($ex->getMessage(), 'rekaps_uu_rekap_unique') !== false) {
                $error_message = 'Duplikasi data ditemukan. Silakan periksa kembali data yang diinput.';
            }

            // Mengembalikan pesan kesalahan ke halaman sebelumnya
            return redirect()->back()->withErrors([$error_message]);
        }

        return redirect('raport')->with('success', 'Berhasil Membuat E-Raport.');
    }
}
