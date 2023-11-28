<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {

        $murid = DB::table('users')
            ->leftJoin('siswas', 'users.uuid', '=', 'siswas.uuid_m')
            ->leftJoin('classes', 'siswas.uu_class', '=', 'classes.uu_class')
            ->leftJoin('gurus', 'users.uuid', '=', 'gurus.uuid_g')
            ->where('users.uuid', Auth::user()->uuid)
            ->first();

        return view('components.Profile', compact('murid'));
    }

    public function update(Request $request)
    {
        DB::table('siswas')->where('uuid_m', $request->uuid_m)
            ->update([
                'cita_cita' => $request->filled('cita_cita') ? $request->cita_cita : DB::raw('cita_cita'),
                'hobby' => $request->filled('hobby') ? $request->hobby : DB::raw('hobby'),
            ]);

        return redirect('profile')->with('success', 'Berhasil mengubah.');
    }
}
