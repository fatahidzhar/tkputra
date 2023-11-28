<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Exceptions\HttpResponseException;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gurus = DB::table('users')
            ->leftJoin('gurus', 'users.uuid', '=', 'gurus.uuid_g')
            ->leftJoin('categories', 'gurus.gender', '=', 'categories.uu_categori')
            ->leftJoin('classes', 'gurus.uu_class', '=', 'classes.uu_class')
            ->select('users.full_name', 'gurus.telp', 'gurus.gender', 'classes.name_class', 'gurus.uuid_g', 'users.role')
            ->where('users.role', '=', 'guru')
            ->paginate(10);

        return view('components.DataGuru', compact('gurus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories_gender = DB::table('categories')
            ->select('uu_categori', 'uu_categori_attrs', 'name', 'status')
            ->where('uu_categori_attrs', '=', 'GE')
            ->Where('status', '=', 0)
            ->get();

        $categories_agama = DB::table('categories')
            ->select('uu_categori', 'uu_categori_attrs', 'name', 'status')
            ->where('uu_categori_attrs', '=', 'AG')
            ->Where('status', '=', 0)
            ->get();

        $categories_pend = DB::table('categories')
            ->select('uu_categori', 'uu_categori_attrs', 'name', 'status')
            ->where('uu_categori_attrs', '=', 'PT')
            ->Where('status', '=', 0)
            ->get();

        return view('components.create.Guru', compact(['categories_gender', 'categories_agama', 'categories_pend']));
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
            'nip' => ['max:255', 'unique:gurus', 'nullable'],
            'nuptk' => ['string', 'max:255', 'unique:gurus', 'nullable'],
            'full_name' => ['required', 'string', 'max:255'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $input['image'] = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $input['image']);
            $image_path = '/images/' . $input['image'];
        } else {
            $image_path = '/images/default.jpg';
        }

        $uuid = (string) Str::uuid();
        $password = Hash::make('123456');

        DB::transaction(function () use ($request, $uuid, $image_path, $password) {
            $user = new User();
            $user->uuid = $uuid;
            $user->full_name = $request->full_name;
            $user->email = $request->email;
            $user->password = $password;
            $user->role = $request->role;
            $user->save();

            $guru = new Guru();
            $guru->uuid_g = $uuid;
            $guru->nip = $request->nip;
            $guru->nuptk = $request->nuptk;
            $guru->address = $request->address;
            $guru->agama = $request->agama;
            $guru->tempat_lahir = $request->tempat_lahir;
            $guru->tahun_lahir = $request->tahun_lahir;
            $guru->gender = $request->gender;
            $guru->image = $image_path;
            $guru->telp = $request->telp;
            $guru->rt = $request->rt;
            $guru->rw = $request->rw;
            $guru->kelurahan = $request->kelurahan;
            $guru->kecamatan = $request->kecamatan;
            $guru->tmt_kerja = $request->tmt_kerja;
            $guru->pend_terakhir = $request->pend_terakhir;
            $guru->ket = $request->ket;
            $guru->save();
        });

        return redirect('dataguru')->with('success', 'Berhasil menambahkan Guru ' . $request->full_name . '.');
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
    public function edit($uuid)
    {
        $guru = DB::table('users')
            ->leftJoin('gurus', 'users.uuid', '=', 'gurus.uuid_g')
            ->leftJoin('categories', 'gurus.gender', '=', 'categories.uu_categori')
            ->leftJoin('classes', 'gurus.uu_class', '=', 'classes.uu_class')
            ->select('users.full_name', 'gurus.telp', 'gurus.gender as jenis_kelamin', 'users.password', 'gurus.uu_class', 'gurus.pend_terakhir', 'gurus.agama', 'gurus.tempat_lahir', 'gurus.tmt_kerja', 'gurus.nip', 'gurus.nuptk', 'categories.uu_categori', 'categories.name', 'classes.name_class', 'gurus.uuid_g', 'gurus.telp', 'categories.name as gender', 'gurus.tahun_lahir', 'users.email', 'gurus.address', 'gurus.rt', 'gurus.rw', 'gurus.kelurahan', 'gurus.kecamatan', 'gurus.ket', 'users.role')
            ->where('users.uuid', '=', $uuid)
            ->first();

        if ($guru === null) {
            throw new HttpResponseException(abort(404, 'Page not found.'));
        }

        $role = explode(', ', $guru->role);

        $categories_pen_trakhir = DB::table('categories')
            ->select('uu_categori', 'uu_categori_attrs', 'name', 'status')
            ->where('uu_categori_attrs', '=', 'PT')
            ->where('status', '=', 0)
            ->get();

        $class = Classe::all();

        $categories_gender = DB::table('categories')
            ->select('uu_categori', 'uu_categori_attrs', 'name', 'status')
            ->where('uu_categori_attrs', '=', 'GE')
            ->where('status', '=', 0)
            ->get();

        $categories_agama = DB::table('categories')
            ->select('uu_categori', 'uu_categori_attrs', 'name', 'status')
            ->where('uu_categori_attrs', '=', 'AG')
            ->where('status', '=', 0)
            ->get();


        return view('components.edit.Guru', compact(['categories_gender', 'categories_agama', 'categories_pen_trakhir', 'class', 'role', 'guru']));
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
        $request->validate([
            'nip' => ['max:255', 'nullable'],
            'nuptk' => ['string', 'max:255', 'nullable'],
            'full_name' => ['required', 'string', 'max:255'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        DB::table('users')
            ->leftJoin('gurus', 'users.uuid', '=', 'gurus.uuid_g')
            ->where('uuid_g', $request->uuid_g)
            ->update([
                'full_name' => $request->full_name,
                'email' => $request->email,
                'role' => $request->role
            ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $input['image'] = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $input['image']);
            $image_path = '/images/' . $input['image'];
        } else {
            $image_path = '/images/default.jpg';
        }

        $guru = DB::table('gurus')->where('uuid_g', $request->uuid_g)->first();

        if ($guru->image && !$request->hasFile('image')) {
            $image_path = $guru->image;
        }

        DB::table('gurus')->where('uuid_g', $request->uuid_g)
            ->update([
                'nip' => $request->nip,
                'nuptk' => $request->nuptk,
                'address' => $request->address,
                'agama' => $request->agama,
                'tempat_lahir' => $request->tempat_lahir,
                'tahun_lahir' => $request->tahun_lahir,
                'gender' => $request->gender,
                'image' => $image_path,
                'telp' => $request->telp,
                'rt' => $request->rt,
                'rw' => $request->rw,
                'kelurahan' => $request->kelurahan,
                'kecamatan' => $request->kecamatan,
                'tmt_kerja' => $request->tmt_kerja,
                'pend_terakhir' => $request->pend_terakhir,
                'ket' => $request->ket,
                'uu_class' => $request->uu_class,
                // 'jabatan' => implode(', ', $request->jabatan)
            ]);

        return redirect('dataguru')->with('success', 'Berhasil mengubah Guru ' . $request->full_name . '.');
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
