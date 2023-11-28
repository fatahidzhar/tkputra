<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classe;
use App\Models\Mapel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;

class PDFRekapController extends Controller
{
    public function exportPDFRekap(Request $request)
    {
        $user = Auth::user();
        $role = $user->role;

        $classe = Classe::where('uu_class', $user->guru->uu_class)->get();
        $mapels = Mapel::where('status', 0)->get();

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $date_range = $request->input('date_range');
        $selected_dates = '';

        if ($date_range || $start_date || $end_date) {
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
                ->selectRaw("SUBSTRING_INDEX(users.full_name, ' ', 1) AS full_name")
                ->leftJoin('nilais', 'mapels.uu_mapel', '=', 'nilais.uu_mapel')
                ->leftJoin('siswas', 'nilais.uuid_m', '=', 'siswas.uuid_m')
                ->leftJoin('users', 'siswas.uuid_m', '=', 'users.uuid')
                ->leftJoin('classes', 'siswas.uu_class', '=', 'classes.uu_class')
                ->leftJoin('nilais_attrs', 'mapels.uu_mapel', '=', 'nilais_attrs.uu_mapel')
                ->leftJoin('aspek_k_d_s', 'nilais_attrs.uu_kd', '=', 'aspek_k_d_s.uu_kd')
                ->where('siswas.uu_class', $user->guru->uu_class)
                ->groupBy('users.full_name', 'nilais.tanggal');

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

            if ($start_date && $end_date) {
                $formatted_start_date = Carbon::parse($start_date)->toDateTimeString();
                $formatted_end_date = Carbon::parse($end_date)->toDateTimeString();
                $results->whereBetween('nilais_attrs.tanggal', [$formatted_start_date, $formatted_end_date]);
                $selected_dates = Carbon::parse($start_date)->format('d M Y') . ' - ' . Carbon::parse($end_date)->format('d M Y');
            } elseif ($start_date) {
                $formatted_start_date = Carbon::parse($start_date)->toDateTimeString();
                $results->where('nilais_attrs.tanggal', '>=', $formatted_start_date);
                $selected_dates = Carbon::parse($start_date)->format('d M Y') . ' - ' . Carbon::today()->format('d M Y');
            }

            if ($date_range) {
                if ($date_range == 1) {
                    $start_date = Carbon::today()->now()->toDateTimeString();
                    $end_date = Carbon::today()->toDateTimeString();
                    $results->whereBetween('nilais.tanggal', [$start_date, $end_date]);
                    $selected_dates = 'Today';
                } elseif ($date_range == 7) {
                    $start_date = Carbon::today()->subDays(7)->toDateTimeString();
                    $end_date = Carbon::today()->toDateTimeString();
                    $results->whereBetween('nilais.tanggal', [$start_date, $end_date]);
                    $selected_dates = 'Last 7 days';
                } elseif ($date_range == 30) {
                    $start_date = Carbon::today()->subDays(30)->toDateTimeString();
                    $end_date = Carbon::today()->toDateTimeString();
                    $results->whereBetween('nilais.tanggal', [$start_date, $end_date]);
                    $selected_dates = 'Last 30 days';
                }
            } else {
                // $start_date = Carbon::today()->subDays(1)->toDateTimeString();
                // $end_date = Carbon::today()->toDateTimeString();
                // $date = Carbon::today()->now();
                // $results->where('nilais.tanggal', $date);
            }

            $resultsAttrs = $resultsAttrs->get();
            $results = $results->get();
        } else {
            abort(404, 'Data rekap tidak ditemukan');
        }

        $pdf = PDF::loadView('components.PDFRekap', compact('classe', 'mapels', 'results', 'resultsAttrs', 'selected_dates', 'start_date', 'end_date'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('rekap-laporan ' . $start_date . '_' . $end_date . '.pdf');
    }

    public function exportPDFAbsen(Request $request)
    {

        $user = Auth::user();
        $classe = Classe::where('uu_class', $user->guru->uu_class)->get();

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $selected_dates = '';

        $role = $user->role;
        // $date = Carbon::now()->subDays(7);
        if ($start_date || $end_date) {
            $murid = DB::table('siswas')
                ->leftJoin('users', 'siswas.uuid_m', 'users.uuid')
                ->leftJoin('classes', 'siswas.uu_class', '=', 'classes.uu_class')
                ->leftJoin('gurus', 'classes.uu_class', '=', 'gurus.uu_class')
                ->leftJoin('absensis', 'siswas.uuid_m', '=', 'absensis.uuid_m')
                ->where('siswas.uu_class', $user->guru->uu_class)
                ->where('gurus.uuid_g', Auth::user()->uuid)
                ->orderBy('absensis.tanggal', 'desc');

            $absensis = DB::table('absensis')
                ->select(
                    'full_name',
                    DB::raw("COUNT(CASE WHEN kehadiran = '1' THEN 1 END) AS total_hadir"),
                    DB::raw("COUNT(CASE WHEN kehadiran = '2' THEN 2 END) AS total_izin"),
                    DB::raw("COUNT(CASE WHEN kehadiran = '3' THEN 3 END) AS total_sakit"),
                    DB::raw("COUNT(CASE WHEN kehadiran = '4' THEN 4 END) AS total_alpha")
                )
                ->leftJoin('users', 'absensis.uuid_m', '=', 'users.uuid')
                ->leftJoin('gurus', 'users.uuid', '=', 'absensis.uuid_m')
                ->where('gurus.uuid_g', Auth::user()->uuid)
                ->groupBy('full_name');

            if (request()->start_date && request()->end_date) {
                $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
                $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
                $murid->whereBetween('absensis.tanggal', [$start_date, $end_date]);
                $absensis->whereBetween('absensis.tanggal', [$start_date, $end_date]);
            }

            $murid = $murid->get();

            $absensis = $absensis->get();
        } else {
            abort(404, 'Data rekap tidak ditemukan');
        }

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $pdf = PDF::loadView('components.PDFRekapAbsen', compact('classe', 'murid', 'start_date', 'end_date', 'selected_dates', 'absensis'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('rekap-laporan ' . date('Y-m-d', strtotime($start_date)) . '_' . date('Y-m-d', strtotime($end_date)) . '.pdf');
    }
}
