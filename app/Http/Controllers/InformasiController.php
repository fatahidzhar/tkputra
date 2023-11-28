<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Exceptions\HttpResponseException;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $role = $user->role;

        $informasi =  Information::where('uuid_g', $user->guru->uuid_g)->get();

        $informasi_guru = Information::where('uu_class', $user->guru->uu_class)
            ->where('uuid_g', $user->guru->uuid_g)
            ->get();

        return view('components.DataInformasi', compact('informasi', 'informasi_guru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('components.create.Informasi');
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
            'title' => 'required',
            'text' => 'required'
        ]);

        $informasi = new Information();
        $informasi->uuid_g = Auth::user()->uuid;
        $informasi->title = $request->title;
        $informasi->text = $request->text;
        $informasi->status = $request->status;
        $informasi->uu_class = $request->uu_class;
        $informasi->save();

        return redirect('informasi')->with('success', 'Berhasil Menambahkan ' . $request->title . '.');
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
    public function edit($id)
    {
        $informasi = Information::find($id);

        if ($informasi === null) {
            throw new HttpResponseException(abort(404, 'Page not found.'));
        }

        return view('components.edit.Informasi', compact('informasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Information $informasi)
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required'
        ]);

        $informasi->update($request->all());

        return redirect('informasi')->with('success', 'Berhasil Mengubah ' . $request->title . '.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Information $informasi)
    {
        $informasi->delete();

        return redirect()->route('informasi.index')->with('success', 'Informasi Berhasil di Hapus.');
    }
}
