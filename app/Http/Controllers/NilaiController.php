<?php

namespace App\Http\Controllers;

use App\Models\AspekKD;
use App\Models\Classe;
use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Nilais_attrs;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Exceptions\HttpResponseException;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $role = $user->role; // Ambil nilai kolom 'role' pada tabel 'users'.

            if ($role == 'kepsek') {

                $classe = Classe::all();
                $mapels = Mapel::where('status', 0)->get();

                $murid = DB::table('mapels')
                    ->leftJoin('nilais', 'mapels.uu_mapel', '=', 'nilais.uu_mapel')
                    ->leftJoin('siswas', 'nilais.uuid_m', '=', 'siswas.uuid_m')
                    ->leftJoin('users', 'siswas.uuid_m', '=', 'users.uuid')
                    ->leftJoin('classes', 'siswas.uu_class', '=', 'classes.uu_class')
                    ->selectRaw("SUBSTRING_INDEX(users.full_name, ' ', 1) AS first_name")
                    ->groupBy('users.full_name')
                    ->get();

                $start_date = $request->input('start_date');
                $end_date = $request->input('end_date');
                $selected_dates = '';

                $date = Carbon::today()->subDays(6);

                $results = DB::table('mapels')
                    ->selectRaw("SUBSTRING_INDEX(users.full_name, ' ', 1) AS first_name, classes.name_class")
                    ->leftJoin('nilais', 'mapels.uu_mapel', '=', 'nilais.uu_mapel')
                    ->leftJoin('siswas', 'nilais.uuid_m', '=', 'siswas.uuid_m')
                    ->leftJoin('users', 'siswas.uuid_m', '=', 'users.uuid')
                    ->leftJoin('classes', 'siswas.uu_class', '=', 'classes.uu_class')
                    ->where('nilais.tanggal', '>=', $date)
                    ->groupBy('users.full_name', 'classes.name_class');

                foreach ($mapels as $mapel) {
                    $results->addSelect(DB::raw('MAX(IF(mapels.mapel = "' . $mapel->mapel . '", nilais.nilai, NULL)) AS ' . str_replace(' ', '_', $mapel->mapel)));
                    $results->addSelect(DB::raw('MAX(IF(mapels.mapel = "' . $mapel->mapel . '", nilais.nilai, 0)) AS ' . str_replace(' ', '_', $mapel->mapel) . '_nilai'));
                    $results->addSelect(DB::raw('MAX(IF(mapels.mapel = "' . $mapel->mapel . '", nilais.uu_nilai, 0)) AS ' . str_replace(' ', '_', $mapel->mapel) . '_uu_nilai'));
                }

                if ($start_date && $end_date) {
                    $formatted_start_date = Carbon::parse($start_date)->toDateTimeString();
                    $formatted_end_date = Carbon::parse($end_date)->toDateTimeString();
                    $results->whereBetween('nilais.tanggal', [$formatted_start_date, $formatted_end_date]);
                    $selected_dates = Carbon::parse($start_date)->format('d M Y') . ' - ' . Carbon::parse($end_date)->format('d M Y');
                }

                $results = $results->get();
            } elseif ($role == 'guru') {

                $classe = Classe::where('uu_class', $user->guru->uu_class)->get();
                $mapels = Mapel::where('status', 0)->get();

                $date = Carbon::now()->subDays(1);

                $start_date = $request->input('start_date');
                $end_date = $request->input('end_date');
                $date_range = $request->input('date_range');
                $selected_dates = '';


                $results = DB::table('mapels')
                    ->selectRaw("SUBSTRING_INDEX(users.full_name, ' ', 1) AS first_name")
                    ->leftJoin('nilais', 'mapels.uu_mapel', '=', 'nilais.uu_mapel')
                    ->leftJoin('siswas', 'nilais.uuid_m', '=', 'siswas.uuid_m')
                    ->leftJoin('users', 'siswas.uuid_m', '=', 'users.uuid')
                    ->leftJoin('classes', 'siswas.uu_class', '=', 'classes.uu_class')
                    ->leftJoin('nilais_attrs', 'mapels.uu_mapel', '=', 'nilais_attrs.uu_mapel')
                    ->leftJoin('aspek_k_d_s', 'nilais_attrs.uu_kd', '=', 'aspek_k_d_s.uu_kd')
                    ->where('siswas.uu_class', $user->guru->uu_class)
                    ->where('nilais.tanggal', '>=', $date)
                    ->groupBy('users.full_name', 'nilais.tanggal');

                foreach ($mapels as $mapel) {
                    $results->addSelect(DB::raw('MAX(IF(mapels.mapel = "' . $mapel->mapel . '", aspek_k_d_s.kd, 0)) AS ' . str_replace(' ', '_', $mapel->mapel) . '_uu_kd'));
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
                    $results->whereBetween('nilais.tanggal', [$formatted_start_date, $formatted_end_date]);
                    $selected_dates = Carbon::parse($start_date)->format('d M Y') . ' - ' . Carbon::parse($end_date)->format('d M Y');
                } elseif ($start_date) {
                    $formatted_start_date = Carbon::parse($start_date)->toDateTimeString();
                    $results->where('nilais.tanggal', '>=', $formatted_start_date);
                    $selected_dates = Carbon::parse($start_date)->format('d M Y') . ' - ' . Carbon::today()->format('d M Y');
                }

                if ($date_range) {
                    if ($date_range == 1) {
                        $start_date = Carbon::today()->now(0)->toDateTimeString();
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

                $results = $results->get();
            } elseif ($role == 'kepsek') {
                // Tambahkan logika untuk role 'kepsek' di sini.
            } elseif ($role == 'siswa') {
                // Tambahkan logika untuk role 'siswa' di sini.
            }
        }

        return view('components.DataNilai', compact('classe', 'mapels', 'results', 'selected_dates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $uu_class, $uu_mapel)
    {
        $now = Carbon::now();

        $date = $request->input('date');
        $tanggalDecoded = urldecode($date);
        $tanggalFormatted = str_replace('%2F', '-', $tanggalDecoded);

        if (!$date) {
            $date = $now->format('Y-m-d');
        }

        try {
            $date = Carbon::parse($date)->format('Y-m-d');
        } catch (\Exception $e) {
            $date = $now->format('Y-m-d');
        }

        $class = Classe::where('uu_class', $uu_class)->first();
        if ($class === null) {
            throw new HttpResponseException(abort(404, 'Page not found.'));
        }
        $mapels = Mapel::where('uu_mapel', $uu_mapel)->first();
        if ($mapels === null) {
            throw new HttpResponseException(abort(404, 'Page not found.'));
        }

        $nilais_attrs = Nilais_attrs::where('tanggal', $date)
            ->where('uu_class', $uu_class)
            ->where('uu_mapel', $uu_mapel)
            ->first();

        $aspek = AspekKD::where('uu_mapel', $uu_mapel)->get();

        if (Auth::check()) {
            $user = Auth::user();
            $role = $user->role;

            if ($role == 'kepsek') {
            } elseif ($role == 'guru') {
                $nilais = DB::table('classes')
                    ->leftJoin('gurus', 'classes.uu_class', '=', 'gurus.uu_class')
                    ->leftJoin('siswas', 'classes.uu_class', '=', 'siswas.uu_class')
                    ->leftJoin('users', 'siswas.uuid_m', '=', 'users.uuid')
                    ->leftJoin('nilais', function ($join) use ($uu_mapel, $date) {
                        $join->on('siswas.uuid_m', '=', 'nilais.uuid_m')
                            ->where('nilais.uu_mapel', $uu_mapel)
                            ->where('nilais.tanggal', $date);
                    })
                    ->leftJoin('mapels', 'nilais.uu_mapel', '=', 'mapels.uu_mapel')
                    ->where('siswas.uu_class', $uu_class)
                    ->where('gurus.uuid_g', Auth::user()->uuid)
                    ->get();
            } elseif ($role == 'kepsek') {
            } elseif ($role == 'siswa') {
                // Tambahkan logika untuk role 'siswa' di sini.
            }
        }

        return view('components.create.Nilai', compact('class', 'mapels', 'nilais', 'nilais_attrs', 'aspek', 'date'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nilais.*.uu_nilai' => 'uniquie:nilais',
            'nilais.*.uu_mapel' => 'required',
            'nilais.*.uuid_g' => 'required',
            'nilais.*.uuid_m' => 'required',
            'nilais.*.cl' => 'nullable',
            'nilais.*.kh' => 'nullable',
            'nilais.*.ca' => 'nullable',
            'uu_mapel' => 'required',
            'uu_class' => 'required',
            'kegiatan' => 'required'
        ]);

        $message = '';
        $uuattrs = (string) Str::uuid();
        foreach ($request->nilais as $index => $input) {
            if ($input['cl'] !== null & $input['hk'] !== null & $input['ca'] !== null) {
                $uu_nilai = $input['uuid_m'] . '-' . $input['uu_mapel'] . '-' . $index . '-' . $input['tanggal'];

                // Mengambil nama mapel
                $mapel_name = Mapel::where('uu_mapel', $input['uu_mapel'])->value('mapel');

                // Menambahkan record baru atau meng-update record yang sudah ada
                $nilais = Nilai::updateOrCreate(
                    ['uu_nilai' => $uu_nilai], // Field untuk mencocokkan record yang sudah ada
                    [
                        'uu_attrs' =>  $input['uu_mapel'] . '-' . $input['tanggal'],
                        'uuid_g' => $input['uuid_g'],
                        'uuid_m' => $input['uuid_m'],
                        'uu_mapel' => $input['uu_mapel'],
                        'cl' => $input['cl'],
                        'hk' => $input['hk'],
                        'ca' => $input['ca'],
                        'tanggal' => $input['tanggal']
                    ]   // Field yang ingin diubah pada record yang sudah ada atau pada record baru
                )->wasRecentlyCreated;

                // Menentukan pesan sukses
                $message = $nilais ? 'Berhasil Mengisi Nilai ' : 'Berhasil Mengubah Nilai ';
                $message .= $mapel_name;
            }
        }

        $uu_attrs = $input['uu_mapel'] . '-' . $input['tanggal'];
        // Menambahkan record baru atau meng-update record yang sudah ada
        Nilais_attrs::updateOrCreate(
            ['uu_attrs' => $uu_attrs], // Field untuk mencocokkan record yang sudah ada
            [
                'uu_attrs' => $uu_attrs,
                'uu_class' => $request->uu_class,
                'uu_mapel' => $request->uu_mapel,
                'uu_kd' => $request->uu_kd,
                'kegiatan' => $request->kegiatan,
                'tanggal' => $request->tanggal
            ]   // Field yang ingin diubah pada record yang sudah ada atau pada record baru
        );

        return redirect('nilai/' . $request->uu_class)->with('success', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uu_class)
    {

        if (Auth::check()) {
            $user = Auth::user();
            $role = $user->role; // Ambil nilai kolom 'role' pada tabel 'users'.

            if ($role == 'kepsek') {
                $classe = Classe::all();
                if ($classe === null) {
                    throw new HttpResponseException(abort(404, 'Page not found.'));
                }
                $mapels = Mapel::where('status', 0)->get();
                $class = Classe::where('uu_class', $uu_class)->first();
            } elseif ($role == 'guru') {

                $classe = Classe::where('uu_class', $uu_class)->first();
                if ($classe === null) {
                    throw new HttpResponseException(abort(404, 'Page not found.'));
                }

                $classe = Classe::where('uu_class', $user->guru->uu_class)->get();
                if ($classe === null) {
                    throw new HttpResponseException(abort(404, 'Page not found.'));
                }
                $class = Classe::where('uu_class', $user->guru->uu_class)->first();
                $classe = Classe::where('uu_class', $user->guru->uu_class)->first();
                $mapels = Mapel::where('status', 0)->get();
            } elseif ($role == 'kepsek') {
                $classe = Classe::all();
                if ($classe === null) {
                    throw new HttpResponseException(abort(404, 'Page not found.'));
                }
                $mapels = Mapel::where('status', 0)->get();
                $class = Classe::where('uu_class', $uu_class)->first();
            } elseif ($role == 'siswa') {
            }
        }

        return view('components.show.Nilai', compact('classe', 'mapels', 'class'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
