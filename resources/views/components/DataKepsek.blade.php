@extends('layouts.app')
@section('title', 'Data Kepala Sekolah')
@section('content')
    @include('layouts.navbar')
    @include('layouts.sidebar')
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-gray-200 rounded-lg dark:border-gray-700 mt-14">
            <div class="grid grid-cols-3 gap-4 mb-4">
                <div class="flex items-center justify-start rounded">

                </div>
                <div class="flex items-center justify-center rounded">
                    <p class="text-2xl text-gray-400 dark:text-gray-500"></p>
                </div>
                <div class="flex items-center justify-end rounded">
                    <form class="flex items-center">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input type="text" id="simple-search"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Search" required>
                        </div>
                    </form>
                </div>
            </div>
            <div class="items-center justify-center h-auto mb-4 rounded bg-gray-50 dark:bg-gray-800">
                <div class="relative overflow-x-auto sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Nama Kepsek
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    No Telfone
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    NUPTK
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Jenis Kelamin
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Action</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kepsek as $item)
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-6 py-4">
                                        {{ $item->full_name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->telp }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->nuptk }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        {{ $item->gender }}
                                    </td>
                                    <td class="px-6 py-4 flex text-right">
                                        <a href="{{ url('dataguru/' . $item->uuid_g . '/edit') }}"
                                            class="px-3 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg ml-1 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
