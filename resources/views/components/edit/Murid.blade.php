@extends('layouts.app')
@section('title', 'Edit Data Murid - ' . $murid->full_name)
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
                        'Edit Data Murid' => '',
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
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
                                    </li>
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
                            <img class="w-24 h-24 mb-3 object-cover rounded-full shadow-lg"
                                src="{{ $murid->image ?? 'Tidak ada' }}" alt="{{ $murid->full_name ?? 'Tidak ada' }}" />
                            <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">
                                {{ $murid->full_name ?? 'Tidak ada' }}</h5>
                            <span class="text-sm text-gray-500 dark:text-gray-400">Visual Designer</span>
                            <div class="flex mt-4">
                                @if ($murid->uu_class)
                                    <span
                                        class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">Kelas
                                        : {{ $murid->name_class ?? 'Tidak ada' }}</span>
                                @else
                                    <span
                                        class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Kelas
                                        : Tidak ada</span>
                                @endif
                                <span
                                    class="bg-indigo-100 text-indigo-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">Umur
                                    : {{ $umur ?? 'Tidak ada' }}</span>
                            </div>
                            <div class="flex mt-4 space-x-3 md:mt-6">
                                <a href="{{ url('https://api.whatsapp.com/send?phone=' . $murid->telp_rumah . '&text=Hallo ' . $murid->full_name . ', ') ?? 'Tidak ada' }}"
                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Hubungi</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="flex items-center justify-center h-96 dark:bg-gray-800">
                    <div class="w-full max-w-md p-4 bg-white sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex items-center justify-between mb-4">
                            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Shortcut</h5>
                            <a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                                View all
                            </a>
                        </div>
                        <div class="flow-root">
                            @foreach ($shortcut as $item)
                                <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                                    <li class="py-3 sm:py-4">
                                        <div class="flex items-center space-x-4">
                                            <div class="flex-shrink-0">
                                                <img class="w-8 h-8 rounded-full" src="{{ $item->image ?? 'Tidak ada' }}"
                                                    alt="{{ $item->full_name ?? 'Tidak ada' }}">
                                            </div>
                                            <div class="flex-1 ml-3 min-w-0">
                                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                    {{ $item->full_name ?? 'Tidak ada' }}
                                                </p>
                                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                    {{ $item->telp_rumah ?? 'Tidak ada' }}
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
                        <button id="dataortu-tab" data-tabs-target="#dataortu" type="button" role="tab"
                            aria-controls="dataortu" aria-selected="false"
                            class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300">Data
                            Orang tua</button>
                    </li>
                </ul>
            </div>
            @if ($errors->any())
                <div id="alert-4"
                    class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Danger</span>
                    <div>
                        <span class="font-medium">Ensure that these requirements are met:</span>
                        <ul class="mt-1.5 ml-4 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error ?? 'Tidak ada' }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            <div id="myTabContent">
                <div class="grid grid-cols-1 gap-4">
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel"
                        aria-labelledby="profile-tab">
                        <form method="POST" enctype="multipart/form-data"
                            action="{{ route('datamurid.update', $murid->uuid_m) ?? 'Tidak ada' }}">
                            @method('PUT')
                            @csrf
                            <input type="hidden" value="{{ $murid->uuid_m ?? 'Tidak ada' }}" name="uuid_m">
                            <div class="grid gap-6 mb-6 md:grid-cols-2">
                                <div>
                                    <label for="number"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK</label>
                                    <input type="text" name="nik" value="{{ $murid->nik ?? 'Tidak ada' }}"
                                        id="number"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="John" required>
                                </div>
                                <div>
                                    <label for="number"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NISN</label>
                                    <input type="text" name="nisn" readonly
                                        value="{{ $murid->nisn ?? 'Tidak ada' }}" id="number"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Doe" required>
                                </div>
                                <div>
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                    <input type="text" name="full_name" id="name" readonly
                                        value="{{ $murid->full_name ?? 'Tidak ada' }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Flowbite" required>
                                </div>
                                <div>
                                    <label for="phone"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone
                                        number</label>
                                    <input type="tel" name="telp" id="phone" readonly
                                        value="{{ $murid->telp ?? 'Tidak ada' }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="123-45-678" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required>
                                </div>
                                <div>
                                    <label for="gender"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
                                    <select id="gender" name="gender"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="{{ $murid->jenis_kelamin ?? 'Tidak ada' }}" selected>
                                            -{{ $murid->jenis_kelamin ?? 'Tidak ada' }}-</option>
                                        @foreach ($categories_gender as $item)
                                            <option value="{{ $item->name ?? 'Tidak ada' }}">
                                                {{ $item->name ?? 'Tidak ada' }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="birth"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun
                                        Lahir</label>
                                    <input type="date" id="birth" name="tahun_lahir" readonly
                                        value="{{ $murid->tahun_lahir ?? 'Tidak ada' }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="" required>
                                </div>
                            </div>
                            <div class="grid gap-6 mb-6 md:grid-cols-2">
                                <div>
                                    <label for="email"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email
                                        address</label>
                                    <input type="email" id="email" name="email" readonly
                                        value="{{ $murid->email ?? 'Tidak ada' }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Tidak Ada" required>
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                        for="file_input">Upload file</label>
                                    <input
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                        id="file_input" name="image" type="file">
                                </div>
                            </div>
                            <div class="grid gap-6 mb-6 md:grid-cols-2">
                                <div>
                                    <label for="number"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hobby</label>
                                    <input type="text" readonly name="hobby"
                                        value="{{ $murid->hobby ?? 'Tidak ada' }}" id="number"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Tidak Ada" required>
                                </div>
                                <div>
                                    <label for="number"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cita -
                                        Cita</label>
                                    <input type="text" readonly name="cita_cita"
                                        value="{{ $murid->cita_cita ?? 'Tidak ada' }}" id="number"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Tidak Ada" required>
                                </div>
                            </div>
                            <div class="mb-6">
                                <label for="address"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                <textarea id="address" name="address" rows="4"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $murid->address ?? 'Tidak ada' }}</textarea>
                            </div>
                            <div class="grid gap-6 mb-6 md:grid-cols-2">
                                <div>
                                    <label for="number"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">RT</label>
                                    <input type="text" name="rt" readonly
                                        value="{{ $murid->rt ?? 'Tidak ada' }}" id="number"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="John" required>
                                </div>
                                <div>
                                    <label for="number"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">RW</label>
                                    <input type="text" name="rw" readonly
                                        value="{{ $murid->rw ?? 'Tidak ada' }}" id="number"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Doe" required>
                                </div>
                                <div>
                                    <label for="place"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keluarahan</label>
                                    <input type="text" name="place" id="name" readonly
                                        value="{{ $murid->kelurahan ?? 'Tidak ada' }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Flowbite" required>
                                </div>
                                <div>
                                    <label for="place"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kecamatan</label>
                                    <input type="text" name="kecamatan" id="place" readonly
                                        value="{{ $murid->kecamatan ?? 'Tidak ada' }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="123-45-678" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required>
                                </div>
                            </div>

                            <div class="grid gap-6 mb-6 md:grid-cols-2">
                                <div>
                                    <label for="number"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Anak
                                        Ke</label>
                                    <input type="number" name="anak_ke" readonly
                                        value="{{ $murid->anak_ke ?? 'Tidak ada' }}" id="number"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="John" required>
                                </div>
                                <div>
                                    <label for="number"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Berat
                                        Badan</label>
                                    <input type="text" name="bb" readonly
                                        value="{{ $murid->bb ?? 'Tidak ada' }}" id="number"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Doe" required>
                                </div>
                                <div>
                                    <label for="number"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tinggi
                                        Badan</label>
                                    <input type="number" name="tb" id="number" readonly
                                        value="{{ $murid->tb ?? 'Tidak ada' }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Flowbite" required>
                                </div>
                                <div>
                                    <label for="number"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lingkar
                                        Kepala</label>
                                    <input type="number" name="lk" id="number" readonly
                                        value="{{ $murid->lk ?? 'Tidak ada' }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="123-45-678" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required>
                                </div>
                                <div>
                                    <label for="number"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah Saudara
                                        Kandung</label>
                                    <input type="number" name="j_saudara_k" id="number" readonly
                                        value="{{ $murid->j_saudara_k ?? 'Tidak ada' }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="123-45-678" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required>
                                </div>
                                <div>
                                    <label for="class"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas</label>
                                    <select id="class" name="uu_class"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="{{ $murid->uu_class ?? 'Pilih Kelas' }}" selected>
                                            -{{ $murid->name_class ?? 'Pilih Kelas' }}-
                                        </option>
                                        @foreach ($class as $item)
                                            <option value="{{ $item->uu_class ?? 'Tidak ada' }}" req>
                                                {{ $item->name_class ?? 'Tidak ada' }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="flex items-start mb-6">
                                <div class="flex items-center h-5">
                                    <input id="remember" type="checkbox" name="status" value="1"
                                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800"
                                        required>
                                </div>
                                <label for="remember" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">I
                                    agree with the <a href="#"
                                        class="text-blue-600 hover:underline dark:text-blue-500">terms and
                                        conditions</a>.</label>
                            </div>
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                            <button type="button"
                                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Reset
                                Password</button>
                        </form>
                    </div>
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dataortu" role="tabpanel"
                        aria-labelledby="dataortu-tab">
                        <form method="POST" enctype="multipart/form-data"
                            action="{{ route('datamurid.update', $murid->uuid_m) ?? 'Tidak ada' }}">
                            @method('PUT')
                            @csrf
                            <h4 class="text-2xl mb-3 font-bold dark:text-white">Data Ayah</h4>
                            <div class="grid gap-6 mb-6 md:grid-cols-2">
                                <input type="hidden" value="{{ $murid->uuid_m ?? 'Tidak ada' }}" name="uuid_m">
                                <input type="hidden" value="{{ $murid->full_name ?? 'Tidak ada' }}" name="full_name">
                                <div>
                                    <label
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                    <input type="text" name="f_parent_name"
                                        value="{{ $murid->f_parent_name ?? 'Tidak ada' }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required>
                                </div>
                                <div>
                                    <label
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pekerjaan</label>
                                    <input type="text" name="f_parent_work"
                                        value="{{ $murid->f_parent_work ?? 'Tidak ada' }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required>
                                </div>
                                <div>
                                    <label
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pendidikan</label>
                                    <input type="text" name="f_parent_edu"
                                        value="{{ $murid->f_parent_edu ?? 'Tidak ada' }}" id="education"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required>
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ulang
                                        Tahun</label>
                                    <input type="date" name="f_parent_birth"
                                        value="{{ $murid->f_parent_birth ?? 'Tidak ada' }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required>
                                </div>
                            </div>
                            <h4 class="text-2xl mb-3 font-bold dark:text-white">Data Ibu</h4>
                            <div class="grid gap-6 mb-6 md:grid-cols-2">
                                <div>
                                    <label
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                    <input type="text" name="m_parent_name"
                                        value="{{ $murid->m_parent_name ?? 'Tidak ada' }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required>
                                </div>
                                <div>
                                    <label
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pekerjaan</label>
                                    <input type="text" name="m_parent_work"
                                        value="{{ $murid->m_parent_work ?? 'Tidak ada' }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required>
                                </div>
                                <div>
                                    <label
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pendidikan</label>
                                    <input type="text" name="m_parent_edu"
                                        value="{{ $murid->m_parent_edu ?? 'Tidak ada' }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required>
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ulang
                                        Tahun</label>
                                    <input type="date" name="m_parent_birth"
                                        value="{{ $murid->m_parent_birth ?? 'Tidak ada' }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required>
                                </div>
                            </div>
                            <div class="flex items-start mb-6">
                                <div class="flex items-center h-5">
                                    <input id="remember" type="checkbox" name="status" value="1"
                                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800"
                                        required>
                                </div>
                                <label for="remember" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">I
                                    agree with the <a href="#"
                                        class="text-blue-600 hover:underline dark:text-blue-500">terms and
                                        conditions</a>.</label>
                            </div>
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
