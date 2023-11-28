<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Exceptions\HttpResponseException;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengaduan = Pengaduan::all();

        return view('components.Pengaduan', compact('pengaduan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pengaduan = Pengaduan::where('uuid_m', Auth::user()->uuid)->get();

        return view('components.create.Pengaduan', compact('pengaduan'));
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
            'text' => ['required'],
        ]);

        $pengaduan = new Pengaduan();
        $pengaduan->uuid_m = $request->uuid_m;
        $pengaduan->text = $request->text;
        $pengaduan->save();

        return redirect('layanan/pengaduan')->with('success', 'Pengaduan Berhasil Terkirim.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengaduans = Pengaduan::where('id', $id)->first();

        if ($pengaduans === null) {
            throw new HttpResponseException(abort(404, 'Page not found.'));
        }

        if ($pengaduans) {
            DB::table('pengaduans')
                ->where('id', $id)
                ->update(['status' => 1]);
        }

        return view('components.show.Pengaduan', compact('pengaduans'));
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
        $pengaduan = Pengaduan::find($request->id);
        $pengaduan->status1 = $request->status1;
        $pengaduan->text_tanggapan = $request->text_tanggapan;
        $pengaduan->tgl_tanggapan = date('Y-m-d');
        $pengaduan->save();

        return redirect('pengaduan/' . $request->id)->with('success', 'Berhasil Memberi Tanggapan.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengaduan $id)
    {
        $id->delete();
        return redirect('layanan/pengaduan')->with('success', 'Pengaduan Berhasil di Hapus.');
    }
}
