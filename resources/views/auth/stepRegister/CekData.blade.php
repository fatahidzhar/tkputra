@extends('layouts.app')
@section('title', 'Kritik & Saran')
{{-- @include('layouts.navbarMobile') --}}
@section('content')
    <div class="p-4">
        <div>
            <label for="nik" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Masukan NIK</label>
            <input type="number" id="nik"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required>
            <button type="button"
                class="text-white bg-blue-700 mt-2 w-full hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Cek Data</button>
        </div>
    </div>

@endsection
