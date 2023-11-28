<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InformasiWaliController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        $role = $user->role; 

        $informasi = Information::where('status', 3)
            ->orderBy('created_at', 'desc')
            ->get();

        $informasi_class = Information::where('status', 0)
            ->where('uu_class', $user->murid->uu_class)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('components.Informasi', compact('informasi', 'informasi_class'));
    }

    public function show($id)
    {
        $informasi = Information::findOrFail($id);

        return view('components.show.Informasi', compact('informasi'));
    }
}
