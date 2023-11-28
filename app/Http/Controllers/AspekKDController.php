<?php

namespace App\Http\Controllers;

use App\Models\AspekKD;
use App\Models\Mapel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AspekKDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aspek = DB::table('mapels')
            ->leftJoin('aspek_k_d_s', 'mapels.uu_mapel', 'aspek_k_d_s.uu_mapel')
            ->get();
        return view('components.AspekKD', compact('aspek'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mapel = Mapel::where('status', '0')->get();
        return view('components.create.AspekKD', compact('mapel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $uukd = (string) Str::uuid();

        $aspek = new AspekKD();
        $aspek->uu_kd = $uukd;
        $aspek->uu_mapel = $request->uu_mapel;
        $aspek->no_kd = $request->no_kd;
        $aspek->kd = $request->kd;
        $aspek->save();

        return redirect('aspek')->with('success', 'Berhasil Menambahkan Aspek KD');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uu_mapel)
    {
        $aspek = AspekKD::where('uu_mapel', $uu_mapel)->get();
        return view('components.show.AspekKD', compact('aspek'));
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
