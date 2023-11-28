@extends('layouts.app')
@section('title', 'Register Step 1')
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
        <form method="POST" action="{{ route('stepRegister.Step1') }}" enctype="multipart/form-data">
            @csrf
            <h3 class="mb-4 text-lg font-medium leading-none text-gray-900 dark:text-white">Data Perserta Didik</h3>
            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                <div>
                    <label for="full_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                        Lengkap</label>
                    <input type="text" name="full_name" id="full_name" value="{{ old('full_name') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                </div>
                <div>
                    <label for="nama_panggilan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                        Panggilan</label>
                    <input type="text" name="nama_panggilan" id="nama_panggilan" value="{{ old('nama_panggilan') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                </div>
                <div>
                    <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                        Kelamin</label>
                    <select id="gender" name="gender"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Belum Pilih Gender</option>
                        @foreach ($categories_gender as $item)
                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="kewarganegaraan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kewarganegaraan</label>
                    <input type="text" name="kewarganegaraan" id="kewarganegaraan" value="Indonesia"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                </div>
                <div>
                    <label for="place" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat
                        Lahir</label>
                    <input type="text" name="tempat_lahir" id="place" value="{{ old('tempat_lahir') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                </div>
                <div>
                    <label for="birth" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                        Lahir</label>
                    <input type="date" name="tahun_lahir" id="birth" value="{{ old('tahun_lahir') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                </div>
                <div>
                    <label for="register_akta" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Register
                        Akta Lahir</label>
                    <input type="text" name="register_akta_lahir" id="register_akta"
                        value="{{ old('register_akta_lahir') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                </div>
                <div
                    class="block max-w-sm p-3 bg-white border border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700">
                    <label for="place" class="block text-sm mb-2 font-medium text-gray-900 dark:text-white">Berkebutuhan
                        Khusus</label>
                    <div class="flex">
                        <div class="flex items-center pl-4 pr-4 mr-3 border border-gray-200 rounded dark:border-gray-700">
                            <input id="bordered-radio-1" type="radio" value="Iya" name="berkebutuhan_khusus"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="bordered-radio-1"
                                class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Iya</label>
                        </div>
                        <div class="flex items-center pl-4 pr-4 border border-gray-200 rounded dark:border-gray-700">
                            <input id="bordered-radio-2" checked type="radio" value="Tidak" name="berkebutuhan_khusus"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="bordered-radio-2"
                                class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tidak</label>
                        </div>
                    </div>
                    <label for="place" class="block text-sm mb-2 mt-3 font-medium text-gray-900 dark:text-white">Penyakit
                        yang diderita</label>
                    <div class="flex justify-between">
                        <div class="flex items-center pl-4 pr-4 border border-gray-200 rounded dark:border-gray-700">
                            <input id="bordered-radio-1" type="radio" value="Asma" name="penyakit"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="bordered-radio-1"
                                class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Asma</label>
                        </div>
                        <div class="flex items-center pl-4 pr-4 border border-gray-200 rounded dark:border-gray-700">
                            <input id="bordered-radio-2" type="radio" value="Autis" name="penyakit"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="bordered-radio-2"
                                class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Autis</label>
                        </div>
                        <div class="flex items-center pl-4 pr-4 border border-gray-200 rounded dark:border-gray-700">
                            <input id="bordered-radio-2" type="radio" value="Hiperaktif" name="penyakit"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="bordered-radio-2"
                                class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Hiperaktif</label>
                                <input type="radio" name="penyakit" value="Tidak Ada" class="hidden">
                        </div>
                    </div>
                </div>
                <div>
                    <label for="religion"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agama</label>
                    <select id="religion" name="agama"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                        <option selected>Belum Pilih Agama</option>
                        @foreach ($categories_agama as $item)
                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email Orang
                        tua (Aktif)</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                </div>
                <div>
                    <label for="number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK</label>
                    <input type="number" name="nik" id="number" value="{{ old('nik') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div>
                    <label for="number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No. Kartu
                        Keluarga</label>
                    <input type="number" name="no_kk" id="number" value="{{ old('no_kk') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm mb-2 font-medium text-gray-900 dark:text-white" for="file_input">Upload
                        Kartu Keluarga</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="file_input_help" name="file_kk" id="file_input" type="file">
                    <p class="text-sm mt-1 text-gray-500 dark:text-gray-300" id="file_input_help">PNG, JPG or PDF (5MB).
                    </p>
                </div>
                <div>
                    <label class="block text-sm mb-2 font-medium text-gray-900 dark:text-white" for="file_input">Upload
                        Akta Lahir</label>
                    <input
                        class="block w-full text-sm mb-2 text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="file_input_help" name="file_akta_lahir" id="file_input" type="file">
                    <p class="text-sm mt-1 text-gray-500 dark:text-gray-300" id="file_input_help">PNG, JPG or PDF (5MB).
                    </p>
                </div>
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Berikutnya
            </button>
        </form>
    </div>
@endsection
