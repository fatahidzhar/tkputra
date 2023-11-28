@extends('layouts.app')
@section('title', 'Absensi')
@section('content')
    {{-- @include('layouts.navbarMobile') --}}
    @include('layouts.bottomNavigation')
    <div class="p-4 overflow-x-hidden">
        <a href="" onclick="event.preventDefault(); window.location.href='{{ url('akademik/absen') }}'">
            <h2 class="text-3xl mb-3 font-extrabold dark:text-white"><i class="bi bi-arrow-left-short mr-1"></i></h2>
        </a>
        <div class="flex justify-between">
            <span
                class="inline-flex items-center bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">
                <span class="w-2 h-2 mr-1 bg-blue-500 rounded-full"></span>
                H : {{ $persentase_hadir_formatted }}%
            </span>
            <span
                class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                <span class="w-2 h-2 mr-1 bg-green-500 rounded-full"></span>
                I : {{ $persentase_izin_formatted }}%
            </span>
            <span
                class="inline-flex items-center bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">
                <span class="w-2 h-2 mr-1 bg-yellow-300 rounded-full"></span>
                S : {{ $persentase_sakit_formatted }}%
            </span>
            <span
                class="inline-flex items-center bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">
                <span class="w-2 h-2 mr-1 bg-red-500 rounded-full"></span>
                A : {{ $persentase_alpa_formatted }}%
            </span>
        </div>
        <ul class="my-4 space-y-3">
            @foreach ($absen as $item)
                <li>
                    <div
                        class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                        @if ($item->kehadiran == 1)
                            <span class="flex w-3 h-3 bg-blue-600 rounded-full"></span>
                            <span class="flex-1 ml-3 whitespace-nowrap">Hadir</span>
                        @elseif($item->kehadiran == 2)
                            <span class="flex w-3 h-3 bg-green-500 rounded-full"></span>
                            <span class="flex-1 ml-3 whitespace-nowrap">Izin</span>
                        @elseif($item->kehadiran == 3)
                            <span class="flex w-3 h-3 bg-yellow-300 rounded-full"></span>
                            <span class="flex-1 ml-3 whitespace-nowrap">Sakit</span>
                        @elseif($item->kehadiran == 4)
                            <span class="flex w-3 h-3 bg-red-500 rounded-full"></span>
                            <span class="flex-1 ml-3 whitespace-nowrap">Alpha</span>
                        @endif
                        <span
                            class="inline-flex items-center justify-center px-2 py-0.5 ml-3 text-xs font-medium text-gray-500 bg-gray-200 rounded dark:bg-gray-700 dark:text-gray-400">{{ $item->tanggal }}</span>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
