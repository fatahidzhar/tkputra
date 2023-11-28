<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Categories_attr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Exceptions\HttpResponseException;

class CategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categorie::all();
        return view('components.Categori', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cg = Categorie::uucategori();
        $categories_attrs = Categories_attr::all();
        return view('components.create.Categori', compact(['categories_attrs', 'cg']));
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
            'name' => ['required', 'string', 'max:255', 'unique:categories'],
            'uu_categori_attrs' => ['required', 'string', 'max:255'],
        ]);

        $uu_categori = Categorie::uucategori();

        $catagories = new Categorie();
        $catagories->uu_categori = $uu_categori;
        $catagories->uu_categori_attrs = $request->uu_categori_attrs;
        $catagories->name = $request->name;
        $catagories->save();

        return redirect('categori')->with('success', 'Berhasil menambahkan Categori.');
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
    public function edit($uu_categori)
    {
        $categori = Categorie::where('uu_categori', $uu_categori)->first();

        if ($categori === null) {
            throw new HttpResponseException(abort(404, 'Page not found.'));
        }

        $categories_attrs = Categorie::all();

        return view('components.edit.Categori', compact('categori', 'categories_attrs'));
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
        DB::table('categories')->where('uu_categori', $request->uu_categori)
            ->update([
                'uu_categori' => $request->uu_categori,
                'name' => $request->name,
                'status' => $request->status
            ]);

        return redirect('categori')->with('success', 'Berhasil Mengubah Categori ' . $request->name . '.');
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
