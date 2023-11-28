<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Exceptions\HttpResponseException;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $class = DB::table('classes as c')
            ->leftJoin(DB::raw('(SELECT uu_class, COUNT(*) AS total_siswa FROM siswas WHERE status = 1 GROUP BY uu_class) s'), 'c.uu_class', '=', 's.uu_class')
            ->leftJoin(DB::raw('(SELECT uu_class, COUNT(*) AS total_guru FROM gurus GROUP BY uu_class) g'), 'c.uu_class', '=', 'g.uu_class')
            ->select('s.total_siswa', 'g.total_guru', 'c.name_class', 'c.uu_class', 'c.status')
            ->orderBy('c.name_class')
            ->get();

        return view('components.Kelas', compact('class'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('components.create.Kelas');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $uuclass = (string) Str::uuid();

        $class = new Classe();
        $class->uu_class = $uuclass;
        $class->name_class = $request->name_class;
        $class->save();

        return redirect('kelas')->with('success', 'Berhasil Menambahkan Kelas ' . $request->name_class . '.');
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
    public function edit($uu_class)
    {
        $class = Classe::where('uu_class', $uu_class)
            ->first();
        if ($class === null) {
            throw new HttpResponseException(abort(404, 'Page not found.'));
        }


        return view('components.edit.Kelas', compact('class'));
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
        DB::table('classes')->where('uu_class', $request->uu_class)
            ->update([
                'uu_class' => $request->uu_class,
                'name_class' => $request->name_class,
                'status' => $request->status
            ]);

        return redirect('kelas')->with('success', 'Berhasil Mengubah Kelas ' . $request->name_class . '.');
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
