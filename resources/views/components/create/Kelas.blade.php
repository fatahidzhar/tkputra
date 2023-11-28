@extends('layouts.app')
@section('title', 'Tambah Guru')
@section('content')
    @include('layouts.navbar')
    @include('layouts.sidebar')

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-dashed rounded-lg dark:border-gray-700 mt-5">
            <div class="grid gap-4">
                <div class="items-center justify-center mb-5 rounded dark:bg-gray-800">
                    {!! breadcrumbs([
                        'Dashboard' => url('/'),
                        'Data Kelas' => url('kelas'),
                        'Tambah Data Kelas' => '',
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
            <div class="mb-4">
                <form action="{{ route('kelas.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <label for="name_class"
                                class="@error('name_class') block mb-2 text-sm font-medium text-red-700 dark:text-red-500 @enderror block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                Kelas</label>
                            <input type="text" name="name_class" id="name_class"
                                class="@error('name_class') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                            @error('name_class')
                                <p id="alert-4" class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">
                                        {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="flex items-start mb-6 mt-5">
                        <div class="flex items-center h-5">
                            <input id="remember" type="checkbox" value=""
                                class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800"
                                required>
                        </div>
                        <label for="remember" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">I agree with
                            the <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">terms and
                                conditions</a>.</label>
                    </div>
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
