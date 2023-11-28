@extends('layouts.app')
@section('title', 'Kritik & Saran')
{{-- @include('layouts.navbarMobile') --}}
@section('content')
    <div class="p-4">
        @include('layouts.TimelineRegister')
        @if ($errors->any())
            <div id="alert-4"
                class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Danger</span>
                <div>
                    <span class="font-medium">Ensure that these requirements are met:</span>
                    <ul class="mt-1.5 ml-4 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        <form method="POST" action="{{ route('stepRegister.Step3') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="uuid_m" value="{{ $siswa->uuid_m }}" readonly required>
            <h3 class="mb-4 mt-4 text-lg font-medium leading-none text-gray-900 dark:text-white">Data Ayah
                Kandung/Tiri/Angkat/Wali</h3>
            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                        Ayah</label>
                    <input type="text" name="f_parent_name" id="name" value="{{ old('f_parent_name') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                </div>
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK
                        Ayah</label>
                    <input type="number" name="f_parent_nik" id="name" value="{{ old('f_parent_nik') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-2 text-gray-900 dark:text-white" for="file_input">Upload KTP
                        Ayah</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="file_input_help" id="file_input" type="file" name="file_ktp1">
                    <p class="text-sm mt-1 text-gray-500 dark:text-gray-300" id="file_input_help">PNG, JPG or PDF (5MB).</p>
                </div>
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Lahir
                        Ayah</label>
                    <input type="text" name="f_parent_tempat_lahir" id="name"
                        value="{{ old('f_parent_tempat_lahir') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                </div>
                <div>
                    <label for="f_parent" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                        Lahir Ayah</label>
                    <input type="date" name="f_parent_birth" id="parent" value="{{ old('f_parent_birth') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div>
                    <label for="education" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pendidikan
                        Trakhir</label>
                    <select id="education" name="f_parent_edu"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>-Pilih Jenjang Pendidikan-</option>
                        @foreach ($categories_edu as $item)
                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="work"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pekerjaan</label>
                    <select id="work" name="f_parent_work"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>-Pilih Pekerjaan-</option>
                        @foreach ($categories_work as $item)
                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="working" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penghasilan
                        Ayah</label>
                    <select id="working" name="f_parent_penghasilan"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>-Penghasilan Ayah-</option>
                        <option value="500k - 2Jt">500k - 2Jt</option>
                        <option value="2Jt - 5Jt">2Jt - 5Jt</option>
                        <option value="5Jt - 10JT">5Jt - 10JT</option>
                        <option value=">=10Jt">>=10Jt</option>
                    </select>
                </div>
                <div>
                    <label for="place" class="block text-sm mb-2 font-medium text-gray-900 dark:text-white">Berkebutuhan
                        Khusus Ayah</label>
                    <div class="flex">
                        <div class="flex items-center pl-4 pr-4 mr-3 border border-gray-200 rounded dark:border-gray-700">
                            <input id="bordered-radio-1" type="radio" value="Iya" name="f_parent_berkebutuhan"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="bordered-radio-1"
                                class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Iya</label>
                        </div>
                        <div class="flex items-center pl-4 pr-4 border border-gray-200 rounded dark:border-gray-700">
                            <input checked id="bordered-radio-2" type="radio" value="Tidak" name="f_parent_berkebutuhan"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="bordered-radio-2"
                                class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tidak</label>
                        </div>
                    </div>
                </div>
                <div>
                    <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat
                        Sesuai
                        Kartu Keluarga</label>
                    <textarea id="address" name="f_parent_address" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old('f_parent_address') }}</textarea>
                </div>
                <div>
                    <label for="place"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelurahan</label>
                    <input type="text" name="f_parent_kelurahan" id="place"
                        value="{{ old('f_parent_kelurahan') }}" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div>
                    <label for="place" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode
                        Pos</label>
                    <input type="number" name="f_parent_kodepos" id="zipcode" value="{{ old('f_parent_kodepos') }}"
                        required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
            </div>
            <div class="mt-6 mb-6">
                <hr class="w-48 h-1 mx-auto my-4 bg-gray-100 border-0 rounded md:my-10 dark:bg-gray-700">
            </div>
            <h3 class="mb-4 mt-4 text-lg font-medium leading-none text-gray-900 dark:text-white">Data Ibu
                Kandung/Tiri/Angkat/Wali</h3>
            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                        Ibu</label>
                    <input type="text" name="m_parent_name" id="name" value="{{ old('m_parent_name') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                </div>
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK
                        Ibu</label>
                    <input type="number" name="m_parent_nik" id="name" value="{{ old('m_parent_nik') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-2 text-gray-900 dark:text-white" for="file_input">Upload
                        KTP
                        Ibu</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="file_input_help" id="file_input" type="file" name="file_ktp2">
                    <p class="text-sm mt-1 text-gray-500 dark:text-gray-300" id="file_input_help">PNG, JPG or PDF (5MB).
                    </p>
                </div>
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat
                        Lahir
                        Ibu</label>
                    <input type="text" name="m_parent_tempat_lahir" id="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                </div>
                <div>
                    <label for="m_parent" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                        Lahir Ibu</label>
                    <input type="date" name="m_parent_birth" id="parent" value="{{ old('m_parent_birth') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div>
                    <label for="education" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pendidikan
                        Trakhir</label>
                    <select id="education" name="m_parent_edu"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>-Pilih Jenjang Pendidikan-</option>
                        @foreach ($categories_edu as $item)
                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="work"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pekerjaan</label>
                    <select id="work" name="m_parent_work"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>-Pilih Pekerjaan-</option>
                        @foreach ($categories_work as $item)
                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="working" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penghasilan
                        Ibu</label>
                    <select id="working" name="m_parent_penghasilan"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>-Penghasilan Ibu-</option>
                        <option value="500k - 2Jt">500k - 2Jt</option>
                        <option value="2Jt - 5Jt">2Jt - 5Jt</option>
                        <option value="5Jt - 10JT">5Jt - 10JT</option>
                        <option value=">=10Jt">>=10Jt</option>
                    </select>
                </div>
                <div>
                    <label for="place" class="block text-sm font-medium mb-2 text-gray-900 dark:text-white">Berkebutuhan
                        Khusus Ibu</label>
                    <div class="flex">
                        <div class="flex items-center pl-4 pr-4 mr-3 border border-gray-200 rounded dark:border-gray-700">
                            <input id="bordered-radio-1" type="radio" value="Iya" name="m_parent_berkebutuhan"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="bordered-radio-1"
                                class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Iya</label>
                        </div>
                        <div class="flex items-center pl-4 pr-4 border border-gray-200 rounded dark:border-gray-700">
                            <input id="bordered-radio-2" type="radio" value="Tidak" name="m_parent_berkebutuhan"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="bordered-radio-2"
                                class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tidak</label>
                        </div>
                    </div>
                </div>
                <div>
                    <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat
                        Sesuai
                        Kartu Keluarga</label>
                    <textarea id="address" name="m_parent_address" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old('m_parent_address') }}</textarea>
                </div>
                <div>
                    <label for="place"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelurahan</label>
                    <input type="text" name="m_parent_kelurahan" id="place"
                        value="{{ old('m_parent_kelurahan') }}" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div>
                    <label for="place" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode
                        Pos</label>
                    <input type="number" name="m_parent_kodepos" id="zipcode" value="{{ old('m_parent_kodepos') }}"
                        required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
            </div>
            <div class="mt-6 mb-6">
                <hr class="w-48 h-1 mx-auto my-4 bg-gray-100 border-0 rounded md:my-10 dark:bg-gray-700">
            </div>
            <h3 class="mb-4 mt-4 text-lg font-medium leading-none text-gray-900 dark:text-white">Kontak</h3>
            <div class="mb-6">
                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Telpon
                    Rumah</label>
                <input type="tel" name="telp_rumah" id="phone" value="{{ old('telp_rumah') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-6">
                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Telpon
                    Ayah</label>
                <input type="tel" name="telp_ayah" id="phone" value="{{ old('telp_ayah') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-6">
                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Telpon
                    Ibu</label>
                <input type="tel" name="telp_ibu" id="phone" value="{{ old('telp_ibu') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Berikutnya
            </button>
        </form>
    </div>
@endsection
