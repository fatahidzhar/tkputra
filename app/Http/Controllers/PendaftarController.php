<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class PendaftarController extends Controller
{
    public function index()
    {
        $murid = DB::table('users')
            ->leftJoin('siswas', 'users.uuid', '=', 'siswas.uuid_m')
            ->leftJoin('classes', 'siswas.uu_class', '=', 'classes.uu_class')
            ->where('users.role', '=', 'wali')
            ->where('siswas.status', '=', 0)
            ->paginate(20);

        $umur = [];
        foreach ($murid as $siswa) {
            $tanggal_lahir = Carbon::createFromFormat('Y-m-d', $siswa->tahun_lahir);
            $umur = $tanggal_lahir->age;
            $siswa->umur = $umur;
        }

        $countmurid = Siswa::all()->count();

        return view('components.DataPendaftar', compact(['murid', 'countmurid', 'umur']));
    }

    public function export() 
    {
        return Excel::download(new Siswa, 'users.csv');
    }
}
