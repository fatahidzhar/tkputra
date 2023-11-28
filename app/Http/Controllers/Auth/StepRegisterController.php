<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Orang_tuas;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Exceptions\HttpResponseException;

class StepRegisterController extends Controller
{

    public function Step1()
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

        return view('auth.stepRegister.Step1', compact(['categories_gender', 'categories_agama']));
    }

    public function Step1Store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'full_name' => 'required',
            'nama_panggilan' => 'required',
            'gender' => 'required',
            'kewarganegaraan' => 'required',
            'nik' => 'required|unique:siswas',
            'no_kk' => 'required|unique:siswas',
            'register_akta_lahir' => 'nullable',
            'berkebutuhan_khusus' => 'nullable',
            'tempat_lahir' => 'required|nullable',
            'tahun_lahir' => 'required|nullable',
            'agama' => 'required',
            'file_kk' => 'required|file|mimetypes:application/pdf,image/jpeg,image/png|mimes:pdf,jpg,jpeg,png|max:5120',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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

        if ($request->hasFile('file_kk')) {
            $file_kk = $request->file('file_kk');
            $input['file_kk'] = Str::random(40) . '.' . $file_kk->getClientOriginalExtension();
            $destinationPath = public_path('/upload_berkas');
            $file_kk->move($destinationPath, $input['file_kk']);
            $filekk = '/upload_berkas/' . $input['file_kk'];
        }

        if ($request->hasFile('file_akta_lahir')) {
            $file_akta_lahir = $request->file('file_akta_lahir');
            $fileName2 = Str::random(40) . '.' . $file_akta_lahir->getClientOriginalExtension();
            $destinationPath = public_path('/upload_berkas');
            $file_akta_lahir->move($destinationPath, $fileName2);
            $fileakta_lahir = '/upload_berkas/' . $fileName2;
        }

        DB::beginTransaction();
        try {

            $uuid_m = Str::uuid();
            $role = 'wali';
            $password = Hash::make('123456');

            $user = new User();
            $user->uuid = $uuid_m;
            $user->full_name = $request->full_name;
            $user->email = $request->email;
            $user->password = $password;
            $user->role = $role;
            $user->save();

            // Create new student record
            $siswa = new Siswa();
            $siswa->uuid_m = $uuid_m;
            $siswa->image = $image_path;
            $siswa->file_kk = $filekk;
            $siswa->file_akta_lahir = $fileakta_lahir;
            $siswa->nama_panggilan = $validatedData['nama_panggilan'];
            $siswa->gender = $validatedData['gender'];
            $siswa->kewarganegaraan = $validatedData['kewarganegaraan'];
            $siswa->nik = $validatedData['nik'];
            $siswa->no_kk = $validatedData['no_kk'];
            $siswa->register_akta_lahir = $validatedData['register_akta_lahir'];
            $siswa->berkebutuhan_khusus = $validatedData['berkebutuhan_khusus'];
            $siswa->tempat_lahir = $validatedData['tempat_lahir'];
            $siswa->tahun_lahir = $validatedData['tahun_lahir'];
            $siswa->agama = $validatedData['agama'];
            $siswa->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        return redirect()->route('auth.stepRegister.Step2', ['uuid_m' => $uuid_m]);
    }


    public function Step2($uuid_m)
    {
        $siswa = Siswa::where('uuid_m', $uuid_m)->firstOrFail();    

        if ($siswa === null) {
            throw new HttpResponseException(abort(404, 'Page not found.'));
        }

        $basePath = storage_path('app/public/wilayah/');

        $provincesData = $this->parseCsvData($basePath . 'provinces.csv');

        return view('auth.stepRegister.Step2', compact('siswa', 'provincesData'));
    }

    public function Step2Store(Request $request)
    {

        $validatedData = $request->validate([
            'domisili' => 'nullable',
            'nama_dusun' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'kodepos' => 'required',
            'tempat_tinggal' => 'required',
            'transportasi' => 'required',
            'jarak' => 'required',
            'waktu_tempuh' => 'required',
            'uuid_m' => 'required',
        ]);

        DB::beginTransaction();
        try {
            // Lock row
            Siswa::where('uuid_m', $validatedData['uuid_m'])->lockForUpdate()->get();

            // Get latest student data that matches the input data
            $siswa = Siswa::where([
                ['uuid_m', $validatedData['uuid_m']],
            ])->latest()->first();

            if ($siswa === null) {
                throw new HttpResponseException(abort(404, 'Page not found.'));
            }

            $siswa->domisili = $validatedData['domisili'];
            $siswa->nama_dusun = $validatedData['nama_dusun'];
            $siswa->kecamatan = $validatedData['kecamatan'];
            $siswa->kelurahan = $validatedData['kelurahan'];
            $siswa->kota = $validatedData['kota'];
            $siswa->provinsi = $validatedData['provinsi'];
            $siswa->kodepos = $validatedData['kodepos'];
            $siswa->tempat_tinggal = $validatedData['tempat_tinggal'];
            $siswa->transportasi = $validatedData['transportasi'];
            $siswa->jarak = $validatedData['jarak'];
            $siswa->waktu_tempuh = $validatedData['waktu_tempuh'];
            $siswa->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        return redirect()->route('auth.stepRegister.Step3', ['uuid_m' => $validatedData['uuid_m']]);
    }

    private function parseCsvData($filePath)
    {
        $data = [];
        if (($handle = fopen($filePath, 'r')) !== false) {
            while (($row = fgetcsv($handle, 1000, ',')) !== false) {
                $data[] = $row;
            }
            fclose($handle);
        }
        return $data;
    }

    public function Step3($uuid_m)
    {
        $siswa = Siswa::where('uuid_m', $uuid_m)->firstOrFail();

        if ($siswa === null) {
            throw new HttpResponseException(abort(404, 'Page not found.'));
        }

        $categories_work = DB::table('categories')
            ->select('uu_categori', 'uu_categori_attrs', 'name', 'status')
            ->where('uu_categori_attrs', '=', 'PW')
            ->Where('status', '=', 0)
            ->get();

        $categories_edu = DB::table('categories')
            ->select('uu_categori', 'uu_categori_attrs', 'name', 'status')
            ->where('uu_categori_attrs', '=', 'PT')
            ->Where('status', '=', 0)
            ->get();

        return view('auth.stepRegister.Step3', compact(['siswa', 'categories_work', 'categories_edu']));
    }

    public function Step3Store(Request $request)
    {
        $validatedData = $request->validate([
            'f_parent_name' => 'nullable',
            'f_parent_nik' => 'nullable',
            'f_parent_tempat_lahir' => 'nullable',
            'f_parent_birth' => 'nullable',
            'f_parent_edu' => 'nullable',
            'f_parent_work' => 'nullable',
            'f_parent_penghasilan' => 'nullable',
            'f_parent_berkebutuhan' => 'nullable',
            'f_parent_address' => 'nullable',
            'f_parent_kelurahan' => 'nullable',
            'f_parent_kodepos' => 'nullable',
            'm_parent_name' => 'nullable',
            'm_parent_nik' => 'nullable',
            'm_parent_tempat_lahir' => 'nullable',
            'm_parent_birth' => 'nullable',
            'm_parent_edu' => 'nullable',
            'm_parent_work' => 'nullable',
            'm_parent_penghasilan' => 'nullable',
            'm_parent_berkebutuhan' => 'nullable',
            'm_parent_address' => 'nullable',
            'm_parent_kelurahan' => 'nullable',
            'm_parent_kodepos' => 'nullable',
            'telp_rumah' => 'required',
            'telp_ayah' => 'required',
            'telp_ibu' => 'required',
            'file_ktp1' => 'required|file|mimetypes:application/pdf,image/jpeg,image/png|mimes:pdf,jpg,jpeg,png|max:5120',
            'file_ktp2' => 'required|file|mimetypes:application/pdf,image/jpeg,image/png|mimes:pdf,jpg,jpeg,png|max:5120',
            'uuid_m' => 'required',
        ]);

        DB::beginTransaction();
        try {
            // Lock row
            Siswa::where('uuid_m', $validatedData['uuid_m'])->lockForUpdate()->get();

            // Get latest student data that matches the input data
            $siswa = Siswa::where([
                ['uuid_m', $validatedData['uuid_m']],
            ])->latest()->first();

            if ($siswa === null) {
                throw new HttpResponseException(abort(404, 'Page not found.'));
            }

            if ($request->hasFile('file_ktp1')) {
                $file_ktp1 = $request->file('file_ktp1');
                $fileName1 = Str::random(40) . '.' . $file_ktp1->getClientOriginalExtension();
                $destinationPath = public_path('/upload_berkas');
                $file_ktp1->move($destinationPath, $fileName1);
                $filektp1 = '/upload_berkas/' . $fileName1;
            }

            if ($request->hasFile('file_ktp2')) {
                $file_ktp2 = $request->file('file_ktp2');
                $fileName2 = Str::random(40) . '.' . $file_ktp2->getClientOriginalExtension();
                $destinationPath = public_path('/upload_berkas');
                $file_ktp2->move($destinationPath, $fileName2);
                $filektp2 = '/upload_berkas/' . $fileName2;
            }

            $siswa->uuid_m = $validatedData['uuid_m'];
            $siswa->f_parent_name = $validatedData['f_parent_name'];
            $siswa->f_parent_work = $validatedData['f_parent_work'];
            $siswa->f_parent_edu = $validatedData['f_parent_edu'];
            $siswa->f_parent_birth = $validatedData['f_parent_birth'];
            $siswa->m_parent_name = $validatedData['m_parent_name'];
            $siswa->m_parent_edu = $validatedData['m_parent_edu'];
            $siswa->m_parent_work = $validatedData['m_parent_work'];
            $siswa->m_parent_birth = $validatedData['m_parent_birth'];
            $siswa->f_parent_name = $validatedData['f_parent_name'];
            $siswa->f_parent_nik = $validatedData['f_parent_nik'];
            $siswa->f_parent_tempat_lahir = $validatedData['f_parent_tempat_lahir'];
            $siswa->f_parent_birth = $validatedData['f_parent_birth'];
            $siswa->f_parent_edu = $validatedData['f_parent_edu'];
            $siswa->f_parent_work = $validatedData['f_parent_work'];
            $siswa->f_parent_penghasilan = $validatedData['f_parent_penghasilan'];
            $siswa->f_parent_berkebutuhan = $validatedData['f_parent_berkebutuhan'];
            $siswa->f_parent_address = $validatedData['f_parent_address'];
            $siswa->f_parent_kelurahan = $validatedData['f_parent_kelurahan'];
            $siswa->f_parent_kodepos = $validatedData['f_parent_kodepos'];
            $siswa->m_parent_name = $validatedData['m_parent_name'];
            $siswa->m_parent_nik = $validatedData['m_parent_nik'];
            $siswa->m_parent_tempat_lahir = $validatedData['m_parent_tempat_lahir'];
            $siswa->m_parent_birth = $validatedData['m_parent_birth'];
            $siswa->m_parent_edu = $validatedData['m_parent_edu'];
            $siswa->m_parent_work = $validatedData['m_parent_work'];
            $siswa->m_parent_penghasilan = $validatedData['m_parent_penghasilan'];
            $siswa->m_parent_berkebutuhan = $validatedData['m_parent_berkebutuhan'];
            $siswa->m_parent_address = $validatedData['m_parent_address'];
            $siswa->m_parent_kelurahan = $validatedData['m_parent_kelurahan'];
            $siswa->m_parent_kodepos = $validatedData['m_parent_kodepos'];
            $siswa->telp_rumah = $validatedData['telp_rumah'];
            $siswa->telp_ayah = $validatedData['telp_ayah'];
            $siswa->telp_ibu = $validatedData['telp_ibu'];
            $siswa->file_ktp1 = $filektp1;
            $siswa->file_ktp2 = $filektp2;
            $siswa->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        return redirect()->route('auth.stepRegister.Step4', ['uuid_m' => $validatedData['uuid_m']]);
    }

    public function Step4($uuid_m)
    {
        $siswa = Siswa::where('uuid_m', $uuid_m)->firstOrFail();

        if ($siswa === null) {
            throw new HttpResponseException(abort(404, 'Page not found.'));
        }

        return view('auth.stepRegister.Step4', compact('siswa'));
    }

    public function Step4Store(Request $request)
    {
        $validatedData = $request->validate([
            'anak_ke' => 'nullable',
            'bb' => 'nullable',
            'tb' => 'nullable',
            'lk' => 'nullable',
            'j_saudara_k' => 'nullable',
            'uuid_m' => 'required',
        ]);

        DB::beginTransaction();
        try {
            // Lock row
            Siswa::where('uuid_m', $validatedData['uuid_m'])->lockForUpdate()->get();

            // Get latest student data that matches the input data
            $siswa = Siswa::where([
                ['uuid_m', $validatedData['uuid_m']],
            ])->latest()->first();

            if (!$siswa) {
                abort(404);
            }

            $siswa->anak_ke = $validatedData['anak_ke'];
            $siswa->bb = $validatedData['bb'];
            $siswa->tb = $validatedData['tb'];
            $siswa->lk = $validatedData['lk'];
            $siswa->j_saudara_k = $validatedData['j_saudara_k'];
            $siswa->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        return redirect()->route('auth.stepRegister.StepComplete', ['uuid_m' => $validatedData['uuid_m']]);
    }

    public function StepComplete($uuid_m)
    {
        $pendaftaran = DB::table('users')
            ->leftJoin('siswas', 'users.uuid', '=', 'siswas.uuid_m')
            ->select('users.full_name')
            ->where('siswas.uuid_m', $uuid_m)
            ->get();

        $siswa = Siswa::where('uuid_m', $uuid_m)->firstOrFail();

        if ($siswa === null) {
            throw new HttpResponseException(abort(404, 'Page not found.'));
        }

        return view('auth.stepRegister.StepComplete', compact(['siswa', 'pendaftaran']));
    }

    public function Timeline($uuid_m)
    {
        $siswa = Siswa::where('uuid_m', $uuid_m)->get();

        if ($siswa === null) {
            throw new HttpResponseException(abort(404, 'Page not found.'));
        }
        return view('layouts.TimelineRegister', compact('siswa'));
    }

    public function CekData() {
        return view('auth.stepRegister.CekData');
    }
}
