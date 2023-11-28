@extends('layouts.app')
@section('title', 'Kritik & Saran')
{{-- @include('layouts.navbarMobile') --}}
@section('content')
    <div class="p-4">
        @include('layouts.TimelineRegister')
        <form method="POST" action="{{ route('stepRegister.Step4') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="uuid_m" value="{{ $siswa->uuid_m }}" readonly required>
            <h3 class="mb-4 text-lg font-medium leading-none text-gray-900 dark:text-white">Data Anak</h3>
            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                <div>
                    <label for="number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Anak
                        ke-berapa</label>
                    <input type="number" name="anak_ke" id="number"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div>
                    <label for="number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Berat
                        Badan</label>
                    <input type="number" name="bb" id="number"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div>
                    <label for="number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tinggi
                        Badan</label>
                    <input type="number" name="tb" id="number"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div>
                    <label for="number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lingkar
                        Kepala</label>
                    <input type="number" name="lk" id="number"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div>
                    <label for="number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                        Saudara Kandung</label>
                    <input type="number" name="j_saudara_k" id="number"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="flex items-end">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Selesai
                    </button>
                </div>
        </form>
    </div>
@endsection
