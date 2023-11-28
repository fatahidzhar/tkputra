@extends('layouts.app')
@section('title', 'Pengaduan')
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
                
            </div>
            <div class="items-center justify-center h-auto mb-4 rounded bg-gray-50 dark:bg-gray-800">
                <div class="relative overflow-x-auto sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    No
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Pengaduan
                                </th>
                                <th colspan="2" class="px-6 py-3 text-center">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Action</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengaduan as $item)
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $loop->iteration }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $item->excerpt() }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        @if ($item->status == 0)
                                            <span
                                                class="inline-flex truncate items-center bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                                <span class="w-2 h-2 mr-1 bg-green-500 rounded-full"></span>
                                                Belum di-baca
                                            </span>
                                        @elseif($item->status == 1)
                                            <span
                                                class="inline-flex truncate items-center bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">
                                                <span class="w-2 h-2 mr-1 bg-red-500 rounded-full"></span>
                                                Sudah di-baca
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        @if ($item->status1 == null)
                                            <span
                                                class="inline-flex truncate items-center bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">
                                                <span class="w-2 h-2 mr-1 bg-yellow-500 rounded-full"></span>
                                                Belum di-proses
                                            </span>
                                        @elseif ($item->status1 == 1)
                                            <span
                                                class="inline-flex truncate items-center bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">
                                                <span class="w-2 h-2 mr-1 bg-red-500 rounded-full"></span>
                                                Proses
                                            </span>
                                        @elseif($item->status1 == 2)
                                            <span
                                                class="inline-flex truncate items-center bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                                <span class="w-2 h-2 mr-1 bg-green-500 rounded-full"></span>
                                                Selesai
                                            </span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ url('pengaduan/' . $item->id) }}" data-id="{{ $item->id }}"
                                            class="px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i
                                                class="bi bi-eye-fill"></i></button>
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
