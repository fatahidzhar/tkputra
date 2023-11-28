@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    @include('layouts.navbar')
    @include('layouts.sidebar')
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-gray-200 rounded-lg dark:border-gray-700 mt-14">
            <h3 class="text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl dark:text-white">
                Dashboard
            </h3>
            <p class="text-md font-semibold italic mt-2 text-gray-600 dark:text-white">
                Welcome Back, {{ Auth::user()->full_name }}
            </p>
            <div class="grid grid-cols-3 gap-4 mt-4 mb-4">
                <div class="flex items-center justify-center h-40 rounded-2xl bg-orange-100 dark:bg-gray-800">
                    <div class="grid grid-cols-2 p-2 w-full">
                        <div class="mt-2 pl-3">
                            <p class="text-sm font-medium text-gray-500 dark:text-white">Jumlah Murid</p>
                            <p class="text-2xl font-bold mt-1 text-gray-900 dark:text-white">{{ $countmurid }}</p>
                        </div>
                        <div class="grid mt-3 ml-2">
                            <div class="flex mb-5 -space-x-4">
                                @foreach ($imagemurid as $item)
                                    <img class="w-11 h-11 border-2 border-white rounded-full dark:border-gray-800"
                                        src="{{ $item->image_murid }}" alt="">
                                @endforeach
                            </div>
                        </div>
                        <div class="col-start-1 col-end-3 pr-3 pl-3 mt-5">
                            <button type="button"
                                onclick="event.preventDefault(); window.location.href='{{ url('datamurid') }}'"
                                class="text-black w-full bg-orange-300 hover:bg-orange-400 focus:ring-4 focus:ring-orange-200 font-medium rounded-xl text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Lihat
                                Keseluruhan</button>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-center h-40 rounded-2xl bg-red-100 dark:bg-gray-800">
                    <p class="text-2xl text-center text-gray-400 dark:text-gray-500">+</p>
                </div>
                <div class="flex items-center justify-center h-40 rounded-2xl bg-green-100 dark:bg-gray-800">
                    <p class="text-2xl text-center text-gray-400 dark:text-gray-500">+</p>
                </div>
            </div>
            <div class="flex justify-between items-center mt-6">
                <div class="">
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">Murid</p>
                </div>
            </div>
            <div class="w-full mb-10 dark:bg-gray-800">
                <div class="relative mt-3 overflow-x-auto sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-center bg-gray-50 dark:bg-gray-800">
                                    No
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    NAMA
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    NO TELFONE
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    GENDER
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($murid as $item)
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 text-center font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                        {{ $loop->iteration }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $item->full_name }}
                                    </td>
                                    <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                        {{ $item->telp_rumah }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->gender }}
                                    </td>
                                    <td class="text-center bg-gray-50 dark:bg-gray-800">
                                        <a href="{{ url('datamurid/' . $item->uuid_m) }}" type="button"
                                            class="px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            <i class="bi bi-info-circle-fill"></i>
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
