<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Exceptions\HttpResponseException;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mapel = Mapel::all();

        return view('components.DataMapel', compact('mapel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'mapel' => ['required', 'string', 'max:255'],
        ]);

        $uumapel = (string) Str::uuid();

        $mapel = new Mapel();
        $mapel->uu_mapel = $uumapel;
        $mapel->mapel = $request->mapel;
        $mapel->save();

        return redirect('mapel')->with('success', 'Berhasil Menambahkan Mata Pelajaran ' . $request->mapel . '.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($uu_mapel)
    {
        $mapels = Mapel::where('uu_mapel', $uu_mapel)
        ->first();

        if ($mapels === null) {
            throw new HttpResponseException(abort(404, 'Page not found.'));
        }

        return view('components.edit.Mapel', compact('mapels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mapel $uu_mapel)
    {
        DB::table('mapels')->where('uu_mapel', $request->uu_mapel)
        ->update([
            'uu_mapel' => $request->uu_mapel,
            'mapel' => $request->mapel,
            'status' => $request->status
        ]);

        return redirect('mapel')->with('success', 'Berhasil Mengubah Mata Pelajaran ' . $request->mapel . '.');
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
