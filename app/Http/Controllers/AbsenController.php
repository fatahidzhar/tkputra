<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Classe;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AbsenController extends Controller
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
            $role = $user->role;

            if ($role == 'kepsek') {

                $classe = Classe::all();

                $start_date = $request->input('start_date');
                $end_date = $request->input('end_date');

                $murid = DB::table('siswas')
                    ->select('siswas.uuid_m', 'users.full_name', 'absensis.tanggal', 'absensis.kehadiran')
                    ->leftJoin('users', 'siswas.uuid_m', 'users.uuid')
                    ->leftJoin('classes', 'siswas.uu_class', '=', 'classes.uu_class')
                    ->leftJoin('gurus', 'classes.uu_class', '=', 'gurus.uu_class')
                    ->leftJoin('absensis', 'siswas.uuid_m', '=', 'absensis.uuid_m')
                    ->where('users.role', '=', 'wali')
                    ->where('siswas.status', '=', 1)
                    ->groupBy('siswas.uuid_m', 'users.full_name', 'absensis.tanggal', 'absensis.kehadiran')
                    ->orderBy('absensis.tanggal', 'desc');

                if (request()->start_date && request()->end_date) {
                    $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
                    $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
                    $murid->whereBetween('absensis.tanggal', [$start_date, $end_date]);
                }

                $murid = $murid->paginate(20)->appends([
                    'start_date' => request()->start_date,
                    'end_date' => request()->end_date
                ]);
            } elseif ($role == 'guru') {
                $classe = Classe::where('uu_class', $user->guru->uu_class)->get();

                $start_date = $request->input('start_date');
                $end_date = $request->input('end_date');

                // $date = Carbon::now()->subDays(7);

                $murid = DB::table('siswas')
                    ->select('siswas.uuid_m', 'users.full_name', 'absensis.tanggal', 'absensis.kehadiran')
                    ->leftJoin('users', 'siswas.uuid_m', 'users.uuid')
                    ->leftJoin('classes', 'siswas.uu_class', '=', 'classes.uu_class')
                    ->leftJoin('gurus', 'classes.uu_class', '=', 'gurus.uu_class')
                    ->leftJoin('absensis', 'siswas.uuid_m', '=', 'absensis.uuid_m')
                    ->where('siswas.uu_class', $user->guru->uu_class)
                    ->where('gurus.uuid_g', Auth::user()->uuid)
                    // ->where('absensis.tanggal', '>=', $date)
                    ->groupBy('siswas.uuid_m', 'users.full_name', 'absensis.tanggal', 'absensis.kehadiran')
                    ->orderBy('absensis.tanggal', 'desc');

                if (request()->start_date && request()->end_date) {
                    $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
                    $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
                    $murid->whereBetween('absensis.tanggal', [$start_date, $end_date]);
                }

                $murid = $murid->paginate(10)->appends([
                    'start_date' => request()->start_date,
                    'end_date' => request()->end_date
                ]);
            } elseif ($role == 'kepsek') {
                // Tambahkan logika untuk role 'kepsek' di sini.
            } elseif ($role == 'siswa') {
                // Tambahkan logika untuk role 'siswa' di sini.
            }

            return view('components.DataAbsen', compact('classe', 'murid', 'start_date', 'end_date'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $uu_class)
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

        if (Auth::check()) {
            $user = Auth::user();
            $role = $user->role; // Ambil nilai kolom 'role' pada tabel 'users'.

            if ($role == 'kepsek') {

                $classe = Classe::all();
            } elseif ($role == 'guru') {
                $classe = Classe::where('uu_class', $user->guru->uu_class)->get();
            } elseif ($role == 'kepsek') {
                // Tambahkan logika untuk role 'kepsek' di sini.
            } elseif ($role == 'siswa') {
                // Tambahkan logika untuk role 'siswa' di sini.
            }

            $murid = DB::table('users')
                ->leftJoin('siswas', 'users.uuid', '=', 'siswas.uuid_m')
                ->leftJoin('gurus', 'users.uuid', '=', 'gurus.uuid_g')
                ->leftJoin('classes', 'siswas.uu_class', '=', 'classes.uu_class')
                ->leftJoin('absensis', function ($join) use ($date) {
                    $join->on('siswas.uuid_m', '=', 'absensis.uuid_m')
                        ->where('absensis.tanggal', $date);
                })
                ->select('users.full_name', 'siswas.uuid_m', 'gurus.uuid_g', 'absensis.kehadiran')
                ->where('classes.uu_class', $uu_class)
                ->groupBy('users.full_name', 'siswas.uuid_m', 'gurus.uuid_g', 'absensis.kehadiran')
                ->get();

            return view('components.create.Absen', compact('classe', 'murid', 'date'));
        }
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
            'absen.*.uu_absen' => 'uniquie:absensis',
            'absen.*.uuid_g' => 'required',
            'absen.*.uuid_m' => 'required',
            'absen.*.kehadiran' => 'nullable',
        ]);

        $uuid = (string) Str::uuid();

        foreach ($request->absen as $index => $input) {
            if (isset($input['kehadiran']) && !empty($input['kehadiran'])) {
                $uu_absen = $input['uuid_m'] . '-' . $index . '-' . $input['tanggal'];

                // Menambahkan record baru atau meng-update record yang sudah ada
                Absensi::updateOrCreate(
                    ['uu_absen' => $uu_absen], // Field untuk mencocokkan record yang sudah ada
                    [
                        'uuid_g' => $input['uuid_g'],
                        'uuid_m' => $input['uuid_m'],
                        'kehadiran' => $input['kehadiran'],
                        'tanggal' => $input['tanggal']
                    ]   // Field yang ingin diubah pada record yang sudah ada atau pada record baru
                );
            } else {
                $kehadiran = null;
            }

            // if ($nilai->id) {
            //     // nilai berhasil disimpan
            // } else {
            //     // terjadi kesalahan saat menyimpan nilai
            // }

        }

        return redirect('absen')->with('success', 'Berhasil Absen ' . date('Y-m-d'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
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
