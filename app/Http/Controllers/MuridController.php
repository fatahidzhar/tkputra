<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Mapel;
use App\Models\Siswa;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Exceptions\HttpResponseException;

class MuridController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $role = $user->role;

            if ($role == 'kepsek') {
                $murid = DB::table('users')
                    ->leftJoin('siswas', 'users.uuid', '=', 'siswas.uuid_m')
                    ->leftJoin('classes', 'siswas.uu_class', '=', 'classes.uu_class')
                    ->leftJoin('gurus', 'users.uuid', '=', 'gurus.uuid_g')
                    ->select('users.full_name', 'siswas.telp_rumah', 'siswas.gender', 'classes.name_class', 'siswas.uuid_m', 'siswas.status')
                    ->where('users.role', '=', 'wali')
                    ->where('siswas.status', '=', 1)
                    ->paginate(20);

                $countmurid = Siswa::all()->count();
            } elseif ($role == 'guru') {
                $murid = DB::table('users')
                    ->leftJoin('siswas', 'users.uuid', '=', 'siswas.uuid_m')
                    ->leftJoin('classes', 'siswas.uu_class', '=', 'classes.uu_class')
                    ->leftJoin('gurus', 'users.uuid', '=', 'gurus.uuid_g')
                    ->select('users.full_name', 'siswas.telp_rumah', 'siswas.gender', 'classes.name_class', 'siswas.uuid_m', 'siswas.status')
                    ->where('users.role', '=', 'wali')
                    ->where('siswas.status', '=', 1)
                    ->where('siswas.uu_class', $user->guru->uu_class)
                    ->paginate(20);
                $countmurid = Siswa::all()->count();
            } elseif ($role == 'yayasan') {
                $murid = DB::table('users')
                    ->leftJoin('siswas', 'users.uuid', '=', 'siswas.uuid_m')
                    ->leftJoin('classes', 'siswas.uu_class', '=', 'classes.uu_class')
                    ->leftJoin('gurus', 'users.uuid', '=', 'gurus.uuid_g')
                    ->select('users.full_name', 'siswas.telp_rumah', 'siswas.gender', 'classes.name_class', 'siswas.uuid_m', 'siswas.status')
                    ->where('users.role', '=', 'wali')
                    ->where('siswas.status', '=', 1)
                    ->paginate(20);

                $countmurid = Siswa::all()->count();
            }

            return view('components.DataMurid', compact(['murid', 'countmurid']));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories_gender = DB::table('categories')
            ->select('uu_categori', 'uu_categori_attrs', 'name', 'status')
            ->where('uu_categori_attrs', '=', 'GE')
            ->Where('status', '=', 0)
            ->get();

        $categories_agama = DB::table('categories')
            ->select('uu_categori', 'uu_categori_attrs', 'name', 'status')
            ->where('uu_categori_attrs', '=', 'AG')
            ->Where('status', '=', 0)
            ->get();

        $categories_parent = DB::table('categories')
            ->select('uu_categori', 'uu_categori_attrs', 'name', 'status')
            ->where('uu_categori_attrs', '=', 'PW')
            ->Where('status', '=', 0)
            ->get();

        $classes = Classe::all();

        return view('components.create.Murid', compact('categories_gender', 'categories_agama', 'categories_parent', 'classes'));
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
            'full_name' => ['required', 'string', 'max:255'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $input['image'] = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $input['image']);
            $image_path = '/images/' . $input['image'];
        } else {
            $image_path = '/images/default.jpg';
        }

        $uuid = (string) Str::uuid();
        $role = 'wali';
        $password = Hash::make('123456');

        DB::transaction(function () use ($request, $uuid, $image_path, $role, $password) {
            $user = new User();
            $user->uuid = $uuid;
            $user->full_name = $request->full_name;
            $user->email = $request->email;
            $user->password = $password;
            $user->role = $role;
            $user->save();

            $siswa = new Siswa();
            $siswa->uuid_m = $uuid;
            $siswa->domisili = $request->domisili;
            $siswa->agama = $request->agama;
            $siswa->tahun_lahir = $request->tahun_lahir;
            $siswa->gender = $request->gender;
            $siswa->image = $image_path;
            $siswa->telp_rumah = $request->telp_rumah;
            $siswa->kewarganegaraan = $request->kewarganegaraan;
            // $siswa->parent_name = $request->parent_name;
            // $siswa->parent_number = $request->parent_number;
            // $siswa->parent_work = $request->parent_work;
            $siswa->save();
        });

        return redirect('datamurid')->with('success', 'Berhasil menambahkan Murid ' . $request->full_name);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $uuid)
    {

        $uuid_m = $uuid;

        $total_hadir = DB::table('absensis')
            ->where('uuid_m', $uuid_m)
            ->where('kehadiran', 1)
            ->count();

        $total_alpa = DB::table('absensis')
            ->where('uuid_m', $uuid_m)
            ->where('kehadiran', 2)
            ->count();

        $total_izin = DB::table('absensis')
            ->where('uuid_m', $uuid_m)
            ->where('kehadiran', 3)
            ->count();

        $total_sakit = DB::table('absensis')
            ->where('uuid_m', $uuid_m)
            ->where('kehadiran', 4)
            ->count();

        if ($total_hadir + $total_alpa + $total_izin + $total_sakit == 0) {
        } else {
            $total_kehadiran = $total_hadir + $total_alpa + $total_izin + $total_sakit;

            $persentase_hadir = ($total_hadir * 100 / $total_kehadiran) * 1;
            $persentase_izin = ($total_izin * 100 / ($total_kehadiran - $total_alpa)) * 0.75;
            $persentase_sakit = ($total_sakit * 100 / ($total_kehadiran - $total_alpa)) * 0.5;
            $persentase_alpa = 100 - $persentase_hadir - $persentase_izin - $persentase_sakit;

            $persentase_hadir_formatted = number_format($persentase_hadir, 1);
            $persentase_izin_formatted = number_format($persentase_izin, 1);
            $persentase_sakit_formatted = number_format($persentase_sakit, 1);
            $persentase_alpa_formatted = number_format($persentase_alpa, 1);
        }
        if (Auth::check()) {
            $user = Auth::user();
            $role = $user->role; // Ambil nilai kolom 'role' pada tabel 'users'.

            if ($role == 'kepsek') {

                $classe = Classe::where('uu_class', $user->guru->uu_class)->get();

                if ($classe === null) {
                    throw new HttpResponseException(abort(404, 'Page not found.'));
                }

                $uuid_m = $uuid;

                $total_hadir = DB::table('absensis')
                    ->where('uuid_m', $uuid_m)
                    ->where('kehadiran', 1)
                    ->count();

                $total_izin = DB::table('absensis')
                    ->where('uuid_m', $uuid_m)
                    ->where('kehadiran', 2)
                    ->count();

                $total_sakit = DB::table('absensis')
                    ->where('uuid_m', $uuid_m)
                    ->where('kehadiran', 3)
                    ->count();

                $total_alpa = DB::table('absensis')
                    ->where('uuid_m', $uuid_m)
                    ->where('kehadiran', 4)
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

                $start_date = $request->input('start_date');
                $end_date = $request->input('end_date');
                $selected_dates = '';

                $mapels = Mapel::where('status', 0)->get();

                $date = Carbon::today()->subDays(7);

                $shortcut = DB::table('users')
                    ->leftJoin('siswas', 'users.uuid', '=', 'siswas.uuid_m')
                    ->leftJoin('classes', 'siswas.uu_class', '=', 'classes.uu_class')
                    ->where('users.role', 'wali')
                    ->where('siswas.status', 1)
                    ->inRandomOrder()
                    ->take(5)
                    ->get();

                $results = DB::table('mapels')
                    ->addSelect(DB::raw('SUBSTRING_INDEX(GROUP_CONCAT(DISTINCT COALESCE(nilais.nilai, 0) ORDER BY COALESCE(nilais.nilai, 0) DESC), ",", 1) AS nilai'))
                    ->select('nilais.tanggal')
                    ->leftJoin('nilais', 'mapels.uu_mapel', '=', 'nilais.uu_mapel')
                    ->leftJoin('siswas', 'nilais.uuid_m', '=', 'siswas.uuid_m')
                    ->leftJoin('users', 'siswas.uuid_m', '=', 'users.uuid')
                    ->leftJoin('classes', 'siswas.uu_class', '=', 'classes.uu_class')
                    ->leftJoin('nilais_attrs', 'mapels.uu_mapel', '=', 'nilais_attrs.uu_mapel')
                    ->where('users.uuid', $uuid)
                    ->where('nilais.tanggal', '>=', $date)
                    ->groupBy('users.full_name', 'nilais.tanggal')
                    ->orderBy('nilais.tanggal', 'desc');

                foreach ($mapels as $mapel) {
                    $results->addSelect(DB::raw('MAX(IF(mapels.mapel = "' . $mapel->mapel . '", nilais.cl, 0)) AS ' . str_replace(' ', '_', $mapel->mapel) . '_nilai_cl'));
                    $results->addSelect(DB::raw('MAX(IF(mapels.mapel = "' . $mapel->mapel . '", nilais.hk, 0)) AS ' . str_replace(' ', '_', $mapel->mapel) . '_nilai_hk'));
                    $results->addSelect(DB::raw('MAX(IF(mapels.mapel = "' . $mapel->mapel . '", nilais.ca, 0)) AS ' . str_replace(' ', '_', $mapel->mapel) . '_nilai_ca'));
                    $results->addSelect(DB::raw('GREATEST(
                        MAX(IF(mapels.mapel = "' . $mapel->mapel . '", nilais.cl, 0)),
                        MAX(IF(mapels.mapel = "' . $mapel->mapel . '", nilais.hk, 0)),
                        MAX(IF(mapels.mapel = "' . $mapel->mapel . '", nilais.ca, 0))
                    ) AS ' . str_replace(' ', '_', $mapel->mapel) . '_nilai_nh'));
                }

                if ($start_date && $end_date) {
                    $formatted_start_date = Carbon::parse($start_date)->toDateTimeString();
                    $formatted_end_date = Carbon::parse($end_date)->toDateTimeString();
                    $results->whereBetween('nilais.tanggal', [$formatted_start_date, $formatted_end_date]);
                    $selected_dates = Carbon::parse($start_date)->format('d M Y') . ' - ' . Carbon::parse($end_date)->format('d M Y');
                }

                $results = $results->get();

                $tanggal_terpilih = $request->input('tanggal_terpilih');
            } elseif ($role == 'guru') {

                $classe = Classe::where('uu_class', $user->guru->uu_class)->get();

                if ($classe === null) {
                    throw new HttpResponseException(abort(404, 'Page not found.'));
                }

                $uuid_m = $uuid;

                $total_hadir = DB::table('absensis')
                    ->where('uuid_m', $uuid_m)
                    ->where('kehadiran', 1)
                    ->count();

                $total_izin = DB::table('absensis')
                    ->where('uuid_m', $uuid_m)
                    ->where('kehadiran', 2)
                    ->count();

                $total_sakit = DB::table('absensis')
                    ->where('uuid_m', $uuid_m)
                    ->where('kehadiran', 3)
                    ->count();

                $total_alpa = DB::table('absensis')
                    ->where('uuid_m', $uuid_m)
                    ->where('kehadiran', 4)
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

                $start_date = $request->input('start_date');
                $end_date = $request->input('end_date');
                $selected_dates = '';

                $mapels = Mapel::where('status', 0)->get();

                $date = Carbon::today()->subDays(7);

                $shortcut = DB::table('users')
                    ->leftJoin('siswas', 'users.uuid', '=', 'siswas.uuid_m')
                    ->leftJoin('classes', 'siswas.uu_class', '=', 'classes.uu_class')
                    ->where('users.role', 'wali')
                    ->where('siswas.status', 1)
                    ->where('classes.uu_class', Auth::user()->guru->uu_class)
                    ->inRandomOrder()
                    ->take(5)
                    ->get();

                $results = DB::table('mapels')
                    ->addSelect(DB::raw('SUBSTRING_INDEX(GROUP_CONCAT(DISTINCT COALESCE(nilais.nilai, 0) ORDER BY COALESCE(nilais.nilai, 0) DESC), ",", 1) AS nilai'))
                    ->select('nilais.tanggal')
                    ->leftJoin('nilais', 'mapels.uu_mapel', '=', 'nilais.uu_mapel')
                    ->leftJoin('siswas', 'nilais.uuid_m', '=', 'siswas.uuid_m')
                    ->leftJoin('users', 'siswas.uuid_m', '=', 'users.uuid')
                    ->leftJoin('classes', 'siswas.uu_class', '=', 'classes.uu_class')
                    ->leftJoin('nilais_attrs', 'mapels.uu_mapel', '=', 'nilais_attrs.uu_mapel')
                    ->where('users.uuid', $uuid)
                    ->where('nilais.tanggal', '>=', $date)
                    ->groupBy('users.full_name', 'nilais.tanggal')
                    ->orderBy('nilais.tanggal', 'desc');

                foreach ($mapels as $mapel) {
                    $results->addSelect(DB::raw('MAX(IF(mapels.mapel = "' . $mapel->mapel . '", nilais.cl, 0)) AS ' . str_replace(' ', '_', $mapel->mapel) . '_nilai_cl'));
                    $results->addSelect(DB::raw('MAX(IF(mapels.mapel = "' . $mapel->mapel . '", nilais.hk, 0)) AS ' . str_replace(' ', '_', $mapel->mapel) . '_nilai_hk'));
                    $results->addSelect(DB::raw('MAX(IF(mapels.mapel = "' . $mapel->mapel . '", nilais.ca, 0)) AS ' . str_replace(' ', '_', $mapel->mapel) . '_nilai_ca'));
                    $results->addSelect(DB::raw('GREATEST(
                        MAX(IF(mapels.mapel = "' . $mapel->mapel . '", nilais.cl, 0)),
                        MAX(IF(mapels.mapel = "' . $mapel->mapel . '", nilais.hk, 0)),
                        MAX(IF(mapels.mapel = "' . $mapel->mapel . '", nilais.ca, 0))
                    ) AS ' . str_replace(' ', '_', $mapel->mapel) . '_nilai_nh'));
                }

                if ($start_date && $end_date) {
                    $formatted_start_date = Carbon::parse($start_date)->toDateTimeString();
                    $formatted_end_date = Carbon::parse($end_date)->toDateTimeString();
                    $results->whereBetween('nilais.tanggal', [$formatted_start_date, $formatted_end_date]);
                    $selected_dates = Carbon::parse($start_date)->format('d M Y') . ' - ' . Carbon::parse($end_date)->format('d M Y');
                }

                $results = $results->get();

                $tanggal_terpilih = $request->input('tanggal_terpilih');
            } elseif ($role == 'kepsek') {
                $classe = Classe::where('uu_class', $user->guru->uu_class)->get();

                if ($classe === null) {
                    throw new HttpResponseException(abort(404, 'Page not found.'));
                }

                $start_date = $request->input('start_date');
                $end_date = $request->input('end_date');
                $selected_dates = '';

                $mapels = Mapel::where('status', 0)->get();

                $date = Carbon::today()->subDays(7);

                $shortcut = DB::table('users')
                    ->leftJoin('siswas', 'users.uuid', '=', 'siswas.uuid_m')
                    ->leftJoin('classes', 'siswas.uu_class', '=', 'classes.uu_class')
                    ->where('users.role', 'wali')
                    ->where('classes.uu_class', Auth::user()->guru->uu_class)
                    ->inRandomOrder()
                    ->take(5)
                    ->get();

                $results = DB::table('mapels')
                    ->addSelect(DB::raw('SUBSTRING_INDEX(GROUP_CONCAT(DISTINCT COALESCE(nilais.nilai, 0) ORDER BY COALESCE(nilais.nilai, 0) DESC), ",", 1) AS nilai'))
                    ->select('nilais.tanggal')
                    ->leftJoin('nilais', 'mapels.uu_mapel', '=', 'nilais.uu_mapel')
                    ->leftJoin('siswas', 'nilais.uuid_m', '=', 'siswas.uuid_m')
                    ->leftJoin('users', 'siswas.uuid_m', '=', 'users.uuid')
                    ->leftJoin('classes', 'siswas.uu_class', '=', 'classes.uu_class')
                    ->leftJoin('nilais_attrs', 'mapels.uu_mapel', '=', 'nilais_attrs.uu_mapel')
                    ->where('users.uuid', $uuid)
                    ->where('nilais.tanggal', '>=', $date)
                    ->groupBy('users.full_name', 'nilais.tanggal')
                    ->orderBy('nilais.tanggal', 'desc');

                foreach ($mapels as $mapel) {
                    $results->addSelect(DB::raw('MAX(IF(mapels.mapel = "' . $mapel->mapel . '", nilais.cl, 0)) AS ' . str_replace(' ', '_', $mapel->mapel) . '_nilai_cl'));
                    $results->addSelect(DB::raw('MAX(IF(mapels.mapel = "' . $mapel->mapel . '", nilais.hk, 0)) AS ' . str_replace(' ', '_', $mapel->mapel) . '_nilai_hk'));
                    $results->addSelect(DB::raw('MAX(IF(mapels.mapel = "' . $mapel->mapel . '", nilais.ca, 0)) AS ' . str_replace(' ', '_', $mapel->mapel) . '_nilai_ca'));
                    $results->addSelect(DB::raw('GREATEST(
                        MAX(IF(mapels.mapel = "' . $mapel->mapel . '", nilais.cl, 0)),
                        MAX(IF(mapels.mapel = "' . $mapel->mapel . '", nilais.hk, 0)),
                        MAX(IF(mapels.mapel = "' . $mapel->mapel . '", nilais.ca, 0))
                    ) AS ' . str_replace(' ', '_', $mapel->mapel) . '_nilai_nh'));
                }

                if ($start_date && $end_date) {
                    $formatted_start_date = Carbon::parse($start_date)->toDateTimeString();
                    $formatted_end_date = Carbon::parse($end_date)->toDateTimeString();
                    $results->whereBetween('nilais.tanggal', [$formatted_start_date, $formatted_end_date]);
                    $selected_dates = Carbon::parse($start_date)->format('d M Y') . ' - ' . Carbon::parse($end_date)->format('d M Y');
                }

                $results = $results->get();

                $tanggal_terpilih = $request->input('tanggal_terpilih');
            } elseif ($role == 'siswa') {
                // Tambahkan logika untuk role 'siswa' di sini.
            }
        }

        $murid = DB::table('users')
            ->leftJoin('siswas', 'users.uuid', '=', 'siswas.uuid_m')
            ->leftJoin('classes', 'siswas.uu_class', '=', 'classes.uu_class')
            ->where('users.role', 'wali')
            ->where('users.uuid', $uuid)
            ->first();

        if (!$murid) {
            abort(404);
        }

        $absen = DB::table('siswas')
            ->select('siswas.uuid_m', 'users.full_name', 'absensis.created_at', 'absensis.kehadiran', 'absensis.tanggal')
            ->leftJoin('users', 'siswas.uuid_m', 'users.uuid')
            ->leftJoin('classes', 'siswas.uu_class', '=', 'classes.uu_class')
            ->leftJoin('gurus', 'classes.uu_class', '=', 'gurus.uu_class')
            ->leftJoin('absensis', 'siswas.uuid_m', '=', 'absensis.uuid_m')
            ->where('siswas.uuid_m', $uuid)
            ->groupBy('siswas.uuid_m', 'users.full_name', 'absensis.created_at', 'absensis.kehadiran', 'absensis.tanggal');

        if (request()->start_date && request()->end_date) {
            $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
            $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
            $absen->whereBetween('nilais.created_at', [$start_date, $end_date]);
        }

        $absen = $absen->get();

        $tanggal_lahir = Carbon::createFromFormat('Y-m-d', $murid->tahun_lahir);
        $umur = $tanggal_lahir->age;
        $murid->umur = $umur;

        return view('components.show.Murid', compact('murid', 'shortcut', 'umur', 'absen', 'mapels', 'results', 'selected_dates', 'persentase_hadir_formatted', 'persentase_izin_formatted', 'persentase_sakit_formatted', 'persentase_alpa_formatted'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {

        $murid = DB::table('users')
            ->leftJoin('siswas', 'users.uuid', '=', 'siswas.uuid_m')
            ->leftJoin('categories', 'siswas.gender', '=', 'categories.uu_categori')
            ->leftJoin('classes', 'siswas.uu_class', '=', 'classes.uu_class')
            ->where('users.role', '=', 'wali')
            ->where('users.uuid', '=', $uuid)
            ->first();

        if ($murid === null) {
            throw new HttpResponseException(abort(404, 'Page not found.'));
        }

        $tanggal_lahir = Carbon::createFromFormat('Y-m-d', $murid->tahun_lahir);
        $umur = $tanggal_lahir->age;
        $murid->umur = $umur;

        $class = Classe::where('status', 0)->get();

        $categories_gender = DB::table('categories')
            ->select('uu_categori', 'uu_categori_attrs', 'name', 'status')
            ->where('uu_categori_attrs', '=', 'GE')
            ->Where('status', '=', 0)
            ->get();

        $shortcut = DB::table('users')
            ->leftJoin('siswas', 'users.uuid', '=', 'siswas.uuid_m')
            ->leftJoin('classes', 'siswas.uu_class', '=', 'classes.uu_class')
            ->where('users.role', 'wali')
            ->where('siswas.status', 1)
            ->inRandomOrder()
            ->take(5)
            ->get();

        return view('components.edit.Murid', compact(['murid', 'shortcut', 'umur', 'class', 'categories_gender']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'nik' => ['string', 'max:255'],
            'full_name' => ['string', 'max:255'],
            'image' => ['mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'email' => ['string', 'email', 'max:255'],
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $input['image'] = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $input['image']);
            $image_path = '/images/' . $input['image'];
        } else {
            $image_path = '/images/default.jpg';
        }

        $siswa = DB::table('siswas')->where('uuid_m', $request->uuid_m)->first();

        if ($siswa->image && !$request->hasFile('image')) {
            $image_path = $siswa->image;
        }

        DB::table('users')->where('uuid', $request->uuid_m)
            ->update([
                'full_name' => $request->filled('full_name') ? $request->full_name : DB::raw('full_name'),
                'email' => $request->filled('email') ? $request->email : DB::raw('email')
            ]);

        DB::table('siswas')->where('uuid_m', $request->uuid_m)
            ->update([
                'nik' => $request->filled('nik') ? $request->nik : DB::raw('nik'),
                'domisili' => $request->filled('domisili') ? $request->domisili : DB::raw('domisili'),
                'agama' => $request->filled('agama') ? $request->agama : DB::raw('agama'),
                'tempat_lahir' => $request->filled('tempat_lahir') ? $request->tempat_lahir : DB::raw('tempat_lahir'),
                'tahun_lahir' => $request->filled('tahun_lahir') ? $request->tahun_lahir : DB::raw('tahun_lahir'),
                'gender' => $request->filled('gender') ? $request->gender : DB::raw('gender'),
                'telp_rumah' => $request->filled('telp_rumah') ? $request->telp_rumah : DB::raw('telp_rumah'),
                'kecamatan' => $request->filled('kecamatan') ? $request->rt : DB::raw('kecamatan'),
                'kota' => $request->filled('kota') ? $request->rw : DB::raw('kota'),
                'kelurahan' => $request->filled('kelurahan') ? $request->kelurahan : DB::raw('kelurahan'),
                'provinsi' => $request->filled('provinsi') ? $request->provinsi : DB::raw('provinsi'),
                'hobby' => $request->filled('hobby') ? $request->hobby : DB::raw('hobby'),
                'cita_cita' => $request->filled('cita_cita') ? $request->cita_cita : DB::raw('cita_cita'),
                'f_parent_name' => $request->filled('f_parent_name') ? $request->f_parent_name : DB::raw('f_parent_name'),
                'f_parent_edu' => $request->filled('f_parent_edu') ? $request->f_parent_edu : DB::raw('f_parent_edu'),
                'f_parent_work' => $request->filled('f_parent_work') ? $request->f_parent_work : DB::raw('f_parent_work'),
                'f_parent_birth' => $request->filled('f_parent_birth') ? $request->f_parent_birth : DB::raw('f_parent_birth'),
                'm_parent_name' => $request->filled('m_parent_name') ? $request->m_parent_name : DB::raw('m_parent_name'),
                'm_parent_edu' => $request->filled('m_parent_edu') ? $request->m_parent_edu : DB::raw('m_parent_edu'),
                'm_parent_work' => $request->filled('m_parent_work') ? $request->m_parent_work : DB::raw('m_parent_work'),
                'm_parent_birth' => $request->filled('m_parent_birth') ? $request->m_parent_birth : DB::raw('m_parent_birth'),
                'image' => $image_path,
                'anak_ke' => $request->filled('anak_ke') ? $request->anak_ke : DB::raw('anak_ke'),
                'bb' => $request->filled('bb') ? $request->bb : DB::raw('bb'),
                'tb' => $request->filled('tb') ? $request->tb : DB::raw('tb'),
                'lk' => $request->filled('lk') ? $request->lk : DB::raw('lk'),
                'j_saudara_k' => $request->filled('j_saudara_k') ? $request->j_saudara_k : DB::raw('j_saudara_k'),
                'uu_class' => $request->filled('uu_class') ? $request->uu_class : DB::raw('uu_class'),
                'status' => $request->filled('status') ? $request->status : DB::raw('status'),
            ]);

        return redirect('datamurid')->with('success', 'Berhasil mengubah ' . $request->full_name . '.');
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
