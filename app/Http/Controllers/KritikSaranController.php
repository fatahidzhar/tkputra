<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Exceptions\HttpResponseException;

class KritikSaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $request->get('query');

        $faqs = Faq::leftJoin('siswas', 'faqs.uuid_m', '=', 'siswas.uuid_m')
            ->leftJoin('categories', 'faqs.uu_categori', '=', 'categories.uu_categori')
            ->leftJoin('users', 'siswas.uuid_m', '=', 'users.uuid')
            ->select('categories.name', 'faqs.text', 'users.full_name', 'siswas.image', 'users.uuid', 'faqs.created_at', 'faqs.status', 'faqs.id', 'faqs.status1')
            ->where('faqs.text', 'LIKE', '%' . $query . '%')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('components.KritikSaran', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories_parent = DB::table('categories')
            ->select('uu_categori', 'uu_categori_attrs', 'name', 'status')
            ->where('uu_categori_attrs', '=', 'KS')
            ->where('status', '=', 0)
            ->get();

        // $faq = Faq::where('uuid_m', Auth::user()->uuid)->first();

        $faqs = DB::table('faqs')
            ->leftJoin('categories', 'faqs.uu_categori', 'categories.uu_categori')
            ->select('categories.name', 'faqs.text', 'faqs.text_tanggapan', 'faqs.tgl_tanggapan', 'faqs.created_at', 'faqs.status', 'faqs.status1', 'faqs.id')
            ->where('faqs.uuid_m', Auth::user()->uuid)
            ->get();


        return view('components.create.KritikSaran', compact('categories_parent', 'faqs'));
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
            'uuid_m' => ['required', 'string', 'max:255'],
            'uu_categori' => ['required', 'string', 'max:255'],
            'text' => ['required'],
        ]);

        $kritiksaran = new Faq();
        $kritiksaran->uuid_m = $request->uuid_m;
        $kritiksaran->uu_categori = $request->uu_categori;
        $kritiksaran->text = $request->text;
        $kritiksaran->save();

        return redirect('layanan/kritiksaran')->with('success', 'Kritik & Saran Berhasil Terkirim.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $faqs = DB::table('faqs')
            ->leftJoin('siswas', 'faqs.uuid_m', '=', 'siswas.uuid_m')
            ->leftJoin('categories', 'faqs.uu_categori', '=', 'categories.uu_categori')
            ->leftJoin('users', 'siswas.uuid_m', '=', 'users.uuid')
            ->select('categories.name', 'faqs.text', 'faqs.text_tanggapan', 'users.full_name', 'users.uuid', 'faqs.created_at', 'faqs.status', 'faqs.status1', 'faqs.id')
            ->where('faqs.id', $id)
            ->first();

        if ($faqs === null) {
            throw new HttpResponseException(abort(404, 'Page not found.'));
        }

        if ($faqs) {
            DB::table('faqs')
                ->where('id', $id)
                ->update(['status' => 1]);
        }

        return view('components.show.KritikSaran', compact('faqs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        $faq = Faq::find($request->id);
        $faq->text_tanggapan = $request->text_tanggapan;
        $faq->tgl_tanggapan = date('Y-m-d');
        $faq->status1 = $request->status1;
        $faq->save();

        return redirect('kritiksaran/' . $request->id)->with('success', 'Berhasil Memberi Tanggapan.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $id)
    {
        $id->delete();

        return redirect('layanan/kritiksaran')->with('success', 'Kritik & Saran Berhasil di Hapus.');
    }
}
