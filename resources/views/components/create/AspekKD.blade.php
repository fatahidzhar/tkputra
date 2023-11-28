@extends('layouts.app')
@section('title', 'Tambah Aspek KD')
@section('content')
    @include('layouts.navbar')
    @include('layouts.sidebar')

    <div class="p-4 sm:ml-64">
        <div class="p-4 dark:border-gray-700 mt-10">
            <div class="grid gap-4">
                <div class="items-center justify-center mb-5 rounded dark:bg-gray-800">
                    {!! breadcrumbs([
                        'Dashboard' => url('/'),
                        'Data Aspek KD' => url('aspek'),
                        'Tambah Data Aspek KD' => '',
                    ]) !!}
                </div>
            </div>
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
        </div>
        <form action="{{ route('aspek.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="px-4">
                <label for="books" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Mapel
                    Mapel</label>
                <select id="books" name="uu_mapel"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg mb-5 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>-Pilih Mapel-</option>
                    @foreach ($mapel as $item)
                        <option value="{{ $item->uu_mapel }}">{{ $item->mapel }}</option>
                    @endforeach
                </select>
                <div class="mb-6">
                    <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No
                        KD</label>
                    <input type="text" id="default-input" name="no_kd"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-6">
                    <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                        KD</label>
                    <input type="text" id="default-input" name="kd"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Submit</button>
            </div>
        </form>
    </div>
@endsection
