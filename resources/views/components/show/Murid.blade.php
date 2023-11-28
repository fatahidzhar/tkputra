@extends('layouts.app')
@section('title', 'Data Murid - ' . $murid->full_name)
@section('content')
    @include('layouts.navbar')
    @include('layouts.sidebar')
    <div class="p-4 sm:ml-64">
        <div class="p-4 mt-5">
            <div class="grid grid-cols-1 gap-4 mb-4">
                <div class="flex h-24 dark:bg-gray-800">
                    {!! breadcrumbs([
                        'Home' => url('/'),
                        'Data Murid' => url('datamurid'),
                        'Lihat Data ' . $murid->full_name => '',
                    ]) !!}
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div div class="flex  dark:bg-gray-800">
                    <div class="w-full max-w-sm bg-white dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex justify-end px-4 pt-4">
                            <button id="dropdownButton" data-dropdown-toggle="dropdown"
                                class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5"
                                type="button">
                                <span class="sr-only">Open dropdown</span>
                                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                                    </path>
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="dropdown"
                                class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                <ul class="py-2" aria-labelledby="dropdownButton">
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Export
                                            Data</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="flex flex-col items-center pb-10">
                            <img class="w-24 h-24 object-cover mb-3 rounded-full shadow-lg" src="{{ $murid->image }}"
                                alt="{{ $murid->full_name }}" />
                            <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $murid->full_name }}</h5>
                            <span class="text-sm text-gray-500 dark:text-gray-400">Hobby :
                                {{ $murid->hobby ?? 'Belum di-isi' }}</span>
                            <span
                                class="bg-blue-100 text-blue-800 text-xs font-medium mt-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">Cita-Cita
                                : {{ $murid->cita_cita ?? 'Belum di-isi' }}</span>
                            <div class="flex mt-2">
                                <span
                                    class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">Kelas
                                    : {{ $murid->name_class }}</span>
                                <span
                                    class="bg-indigo-100 text-indigo-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">Umur
                                    : {{ $umur }}</span>
                            </div>
                            <div class="flex mt-4 space-x-3 md:mt-6">
                                <a href="#"
                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Hubungi</a>
                                @if (in_array('kepsek', explode(',', Auth::user()->role)) || in_array('kepsek', explode(',', Auth::user()->role)))
                                    <a href="{{ $murid->uuid_m }}/edit"
                                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">Edit
                                        Murid</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center h-96 dark:bg-gray-800">
                    <div class="w-full max-w-md p-4 bg-white sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex items-center justify-between mb-4">
                            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Shortcut</h5>
                        </div>
                        <div class="flow-root">
                            @foreach ($shortcut as $item)
                                <a href="{{ url('datamurid/' . $item->uuid_m) }}">
                                    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                                        <li class="py-3 sm:py-4">
                                            <div class="flex items-center space-x-4">
                                                <div class="flex-shrink-0">
                                                    <img class="w-8 h-8 rounded-full object-cover" src="{{ $item->image }}"
                                                        alt="{{ $item->full_name }}">
                                                </div>
                                                <div class="flex-1 ml-3 min-w-0">
                                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                        {{ $item->full_name }}
                                                    </p>
                                                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                        {{ $item->telp_rumah }}
                                                    </p>
                                                </div>
                                                <div
                                                    class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                                    <span
                                                        class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                                        {{ $item->name_class ?? 'Tidak ada' }}</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex mb-4">
                <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400"
                    id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                    <li class="mr-2" role="presentation">
                        <button id="profile-tab" data-tabs-target="#profile" type="button" role="tab"
                            aria-controls="profile" aria-selected="false" aria-current="page"
                            class="inline-block p-4 text-blue-600rounded-t-lg active dark:bg-gray-800 dark:text-blue-500">Profile</button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button id="absen-tab" data-tabs-target="#absen" type="button" role="tab" aria-controls="absen"
                            aria-selected="false"
                            class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300">Absen</button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button id="nilai-harian-tab" data-tabs-target="#nilai_harian" type="button" role="tab"
                            aria-controls="nilai_harian" aria-selected="false"
                            class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300">Nilai
                            Harian</button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button id="dataortu-tab" data-tabs-target="#dataortu" type="button" role="tab"
                            aria-controls="dataortu" aria-selected="false"
                            class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300">Data
                            Orang tua</button>
                    </li>
                    @if (in_array('kepsek', explode(',', Auth::user()->role)) || in_array('kepsek', explode(',', Auth::user()->role)))
                        <li class="mr-2" role="presentation">
                            <button id="dokumen-tab" data-tabs-target="#dokumen" type="button" role="tab"
                                aria-controls="dokumen" aria-selected="false"
                                class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300">Dokumen</button>
                        </li>
                    @endif
                </ul>
            </div>
            <div id="myTabContent">
                <div class="grid grid-cols-1 gap-4">
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel"
                        aria-labelledby="profile-tab">
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div>
                                <label for="penyakit"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penyakit</label>
                                <input type="text" id="penyakit" readonly value="{{ $murid->penyakit }}" disabled
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Tidak Ada">
                            </div>
                            <div>
                                <label for="berkebutuhan"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Berkebutuhan Khusus</label>
                                <input type="text" id="berkebutuhan" readonly value="{{ $murid->berkebutuhan_khusus }}"
                                    disabled
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Tidak Ada">
                            </div>
                        </div>
                        <hr class="w-48 h-1 mx-auto my-2 bg-gray-100 border-0 rounded md:my-10 dark:bg-gray-700">
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div>
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                <input type="text" id="name" readonly value="{{ $murid->full_name }}" disabled
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Tidak Ada">
                            </div>
                            <div>
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                    Panggilan</label>
                                <input type="tel" id="name" readonly value="{{ $murid->nama_panggilan }}"
                                    disabled
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Tidak Ada">
                            </div>
                            <div>
                                <label for="gender"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                    Kelamin</label>
                                <input type="text" readonly value="{{ $murid->gender }}" id="gender" disabled
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Tidak Ada">
                            </div>
                            <div>
                                <label for="birth"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun
                                    Lahir</label>
                                <input type="date" id="birth" readonly value="{{ $murid->tahun_lahir }}" disabled
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Tidak Ada">
                            </div>
                        </div>
                        <div class="mb-6">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email
                                address</label>
                            <input type="email" id="email" readonly value="{{ $murid->email }}" disabled
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Tidak Ada">
                        </div>
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hobby</label>
                                <input type="text" disabled value="{{ $murid->hobby }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Tidak Ada">
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cita -
                                    Cita</label>
                                <input type="text" disabled value="{{ $murid->cita_cita }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Tidak Ada">
                            </div>
                        </div>
                        <hr class="w-48 h-1 mx-auto my-4 bg-gray-100 border-0 rounded md:my-10 dark:bg-gray-700">
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div>
                                <label for="address"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Domisili</label>
                                <textarea id="address" readonly rows="4" disabled
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $murid->domisili }}</textarea>
                            </div>
                            <div>
                                <label for="address"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat
                                    Tinggal</label>
                                <textarea id="address" readonly rows="4" disabled
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $murid->tempat_tinggal }}</textarea>
                            </div>
                        </div>
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            {{-- <div>
                                <label for="number"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">RT</label>
                                <input type="number" readonly value="{{ $murid->rt }}" id="number"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Tidak Ada">
                            </div>
                            <div>
                                <label for="number"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">RW</label>
                                <input type="number" readonly value="{{ $murid->rw }}" id="number"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Tidak Ada">
                            </div> --}}
                            <div>
                                <label for="place"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keluarahan</label>
                                <input type="text" id="place" readonly value="{{ $murid->kelurahan }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Tidak Ada">
                            </div>
                            <div>
                                <label for="place"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kecamatan</label>
                                <input type="text" id="place" readonly value="{{ $murid->kecamatan }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Tidak Ada">
                            </div>
                            <div>
                                <label for="place"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota</label>
                                <input type="text" id="place" readonly value="{{ $murid->kota }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Tidak Ada">
                            </div>
                            <div>
                                <label for="place"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Provinsi</label>
                                <input type="text" id="place" readonly value="{{ $murid->provinsi }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Tidak Ada">
                            </div>
                            <div>
                                <label for="place"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode Pos</label>
                                <input type="text" id="place" readonly value="{{ $murid->kodepos }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Tidak Ada">
                            </div>
                            <div>
                                <label for="telp"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telfon
                                    Rumah</label>
                                <input type="text" id="telp" readonly value="{{ $murid->telp_rumah }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Tidak Ada">
                            </div>
                        </div>
                        <hr class="w-48 h-1 mx-auto my-4 bg-gray-100 border-0 rounded md:my-10 dark:bg-gray-700">
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div>
                                <label for="number"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Anak
                                    Ke</label>
                                <input type="number" readonly value="{{ $murid->anak_ke }}" id="number"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Tidak ada">
                            </div>
                            <div>
                                <label for="number"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Berat
                                    Badan</label>
                                <input type="text" readonly value="{{ $murid->bb }}" id="number" disabled
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gTidak ada-400:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Tidak ada">
                            </div>
                            <div>
                                <label for="number"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tinggi
                                    Badan</label>
                                <input type="number" id="number" readonly value="{{ $murid->tb }}" disabled
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gTidak ada-400:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Tidak ada">
                            </div>
                            <div>
                                <label for="number"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lingkar
                                    Kepala</label>
                                <input type="number" id="number" readonly value="{{ $murid->lk }}" disabled
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gTidak ada-400:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Tidak ada" readonly>
                            </div>
                            <div>
                                <label for="number"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah Saudara
                                    Kandung</label>
                                <input type="number" id="number" readonly value="{{ $murid->j_saudara_k }}" disabled
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gTidak ada-400:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Tidak ada-45" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="hidden dark:bg-gray-800" id="absen" role="tabpanel" aria-labelledby="absen-tab">
                        <div class="flex">
                            <span
                                class="inline-flex items-center bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">
                                <span class="w-2 h-2 mr-1 bg-blue-500 rounded-full"></span>
                                H : {{ $persentase_hadir_formatted }}%
                            </span>
                            <span
                                class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                <span class="w-2 h-2 mr-1 bg-green-500 rounded-full"></span>
                                I : {{ $persentase_izin_formatted }}%
                            </span>
                            <span
                                class="inline-flex items-center bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">
                                <span class="w-2 h-2 mr-1 bg-yellow-300 rounded-full"></span>
                                S : {{ $persentase_sakit_formatted }}%
                            </span>
                            <span
                                class="inline-flex items-center bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">
                                <span class="w-2 h-2 mr-1 bg-red-500 rounded-full"></span>
                                A : {{ $persentase_alpa_formatted }}%
                            </span>
                        </div>
                        <div class="relative overflow-x-auto mt-4 sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            No
                                        </th>

                                        <th scope="col" class="px-6 py-3">
                                            Hadir
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Izin
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Sakit
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Alpha
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            Hari
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($absen as $item)
                                        <tr
                                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                                {{ $loop->iteration }}
                                            </th>

                                            <td class="px-9 py-4">
                                                @if ($item->kehadiran == 1)
                                                    <span class="flex w-3 h-3 bg-blue-600 rounded-full"></span>
                                                @endif
                                            </td>
                                            <td class="px-7 py-4">
                                                @if ($item->kehadiran == 2)
                                                    <span class="flex w-3 h-3 bg-green-500 rounded-full"></span>
                                                @endif
                                            </td>
                                            <td class="px-9 py-4">
                                                @if ($item->kehadiran == 3)
                                                    <span class="flex w-3 h-3 bg-yellow-300 rounded-full"></span>
                                                @endif
                                            </td>
                                            <td class="px-9 py-4">
                                                @if ($item->kehadiran == 4)
                                                    <span class="flex w-3 h-3 bg-red-500 rounded-full"></span>
                                                @endif
                                            </td>
                                            <td class="px-9 py-4 text-center">
                                                {{ $item->tanggal }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="hidden dark:bg-gray-800" id="nilai_harian" role="tabpanel"
                        aria-labelledby="nilai-harian-tab">
                        <div class="relative overflow-x-auto sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                                    <tr>
                                        @foreach ($mapels as $index => $mapel)
                                            <th colspan="4"
                                                class="px-6 py-3 text-center {{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
                                                {{ $mapel->mapel }}</th>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        @foreach ($mapels as $index => $mapel)
                                            <th scope="col"
                                                class="px-3 py-3 text-center {{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
                                                CL
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3 text-center {{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
                                                HK
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3 text-center {{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
                                                CA
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3 text-center {{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
                                                N</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($results as $result)
                                        <tr class="border-b border-gray-200 dark:border-gray-700">
                                            @foreach ($mapels as $index => $mapel)
                                                <th scope="col"
                                                    class="px-1 py-3 text-xs text-center {{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
                                                    @if ($result->{str_replace(' ', '_', $mapel->mapel) . '_nilai_cl'} == 0)
                                                    @elseif ($result->{str_replace(' ', '_', $mapel->mapel) . '_nilai_cl'} == 1)
                                                        BB
                                                    @elseif ($result->{str_replace(' ', '_', $mapel->mapel) . '_nilai_cl'} == 2)
                                                        MB
                                                    @elseif ($result->{str_replace(' ', '_', $mapel->mapel) . '_nilai_cl'} == 3)
                                                        BSH
                                                    @elseif ($result->{str_replace(' ', '_', $mapel->mapel) . '_nilai_cl'} == 4)
                                                        BSB
                                                    @endif
                                                </th>
                                                <th scope="col"
                                                    class="px-1 py-3 text-xs text-center {{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
                                                    @if ($result->{str_replace(' ', '_', $mapel->mapel) . '_nilai_hk'} == 0)
                                                    @elseif ($result->{str_replace(' ', '_', $mapel->mapel) . '_nilai_hk'} == 1)
                                                        BB
                                                    @elseif ($result->{str_replace(' ', '_', $mapel->mapel) . '_nilai_hk'} == 2)
                                                        MB
                                                    @elseif ($result->{str_replace(' ', '_', $mapel->mapel) . '_nilai_hk'} == 3)
                                                        BSH
                                                    @elseif ($result->{str_replace(' ', '_', $mapel->mapel) . '_nilai_hk'} == 4)
                                                        BSB
                                                    @endif
                                                </th>
                                                <th scope="col"
                                                    class="px-1 py-3 text-xs text-center {{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
                                                    @if ($result->{str_replace(' ', '_', $mapel->mapel) . '_nilai_ca'} == 0)
                                                    @elseif ($result->{str_replace(' ', '_', $mapel->mapel) . '_nilai_ca'} == 1)
                                                        BB
                                                    @elseif ($result->{str_replace(' ', '_', $mapel->mapel) . '_nilai_ca'} == 2)
                                                        MB
                                                    @elseif ($result->{str_replace(' ', '_', $mapel->mapel) . '_nilai_ca'} == 3)
                                                        BSH
                                                    @elseif ($result->{str_replace(' ', '_', $mapel->mapel) . '_nilai_ca'} == 4)
                                                        BSB
                                                    @endif
                                                </th>
                                                <th scope="col"
                                                    class="px-3 text-xs py-3 {{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
                                                    @if ($result->{str_replace(' ', '_', $mapel->mapel) . '_nilai_nh'} == 0)
                                                    @elseif ($result->{str_replace(' ', '_', $mapel->mapel) . '_nilai_nh'} == 1)
                                                        BB
                                                    @elseif ($result->{str_replace(' ', '_', $mapel->mapel) . '_nilai_nh'} == 2)
                                                        MB
                                                    @elseif ($result->{str_replace(' ', '_', $mapel->mapel) . '_nilai_nh'} == 3)
                                                        BSH
                                                    @elseif ($result->{str_replace(' ', '_', $mapel->mapel) . '_nilai_nh'} == 4)
                                                        BSB
                                                    @endif
                                                </th>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="hidden dark:bg-gray-800" id="dokumen" role="tabpanel" aria-labelledby="dokumen-tab">
                        <ul class="my-4 space-y-3">
                            <li>
                                <a href="{{ $murid->file_akta_lahir }}" target="_blank"
                                    class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 group dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                                    <span class="flex-1 ml-3 whitespace-nowrap">Akte Lahir</span>
                                    <span
                                        class="inline-flex items-center justify-center px-2 py-0.5 ml-3 text-xs font-medium text-gray-500 bg-gray-200 rounded dark:bg-gray-700 dark:text-gray-400">Lihat Dokumen</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ $murid->file_kk }}" target="_blank"
                                    class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 group dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                                    <span class="flex-1 ml-3 whitespace-nowrap">KK (Kartu Keluarga)</span>
                                    <span
                                        class="inline-flex items-center justify-center px-2 py-0.5 ml-3 text-xs font-medium text-gray-500 bg-gray-200 rounded dark:bg-gray-700 dark:text-gray-400">Lihat Dokumen</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ $murid->file_ktp1 }}" target="_blank"
                                    class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 group dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                                    <span class="flex-1 ml-3 whitespace-nowrap">KTP Ayah</span>
                                    <span
                                        class="inline-flex items-center justify-center px-2 py-0.5 ml-3 text-xs font-medium text-gray-500 bg-gray-200 rounded dark:bg-gray-700 dark:text-gray-400">Lihat Dokumen</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ $murid->file_ktp2 }}" target="_blank"
                                    class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 group dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                                    <span class="flex-1 ml-3 whitespace-nowrap">KTP Ibu</span>
                                    <span
                                        class="inline-flex items-center justify-center px-2 py-0.5 ml-3 text-xs font-medium text-gray-500 bg-gray-200 rounded dark:bg-gray-700 dark:text-gray-400">Lihat Dokumen</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dataortu" role="tabpanel"
                        aria-labelledby="dataortu-tab">
                        <h4 class="text-2xl mb-3 font-bold dark:text-white">Data Ayah</h4>
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div>
                                <label for="full_name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                <input type="text" value="{{ $murid->f_parent_name }}" id="full_name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Tidak ada" readonly>
                            </div>
                            <div>
                                <label for="works"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pekerjaan</label>
                                <input type="text" value="{{ $murid->f_parent_work }}" id="works"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Tidak ada" readonly>
                            </div>
                            <div>
                                <label for="education"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pendidikan</label>
                                <input type="text" value="{{ $murid->f_parent_edu }}" id="education"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Tidak ada" readonly>
                            </div>
                        </div>
                        <h4 class="text-2xl mb-3 font-bold dark:text-white">Data Ibu</h4>
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div>
                                <label for="full_name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                <input type="text" value="{{ $murid->m_parent_name }}" id="full_name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Tidak ada" readonly>
                            </div>
                            <div>
                                <label for="works"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pekerjaan</label>
                                <input type="text" value="{{ $murid->m_parent_work }}" id="works"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Tidak ada" readonly>
                            </div>
                            <div>
                                <label for="education"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pendidikan</label>
                                <input type="text" value="{{ $murid->m_parent_edu }}" id="education"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Tidak ada" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
