@extends('layouts.app')
@section('title', 'Nilai')
@section('content')
    {{-- @include('layouts.navbarMobile') --}}
    @include('layouts.bottomNavigation')
    <div class="pt-4 pl-4 pr-2">
        <div class="flex items-center mb-2">
            <a href="" onclick="event.preventDefault(); window.location.href='{{ url('akademik/nilai') }}'">
                <h2 class="text-3xl font-extrabold dark:text-white"><i class="bi bi-arrow-left-short"></i></h2>
            </a>
            <span class="ml-2 text-lg font-medium">
                Mata Pelajaran
            </span>
        </div>
        <ul class="space-y-3">
            @foreach ($mapels as $item)
                <li>
                    <a href="{{ url('akademik/nilai/' . $tahun_ajar .'/' . $item->uu_mapel) }}"
                        class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                        <span class="flex w-3 h-3 bg-blue-600 rounded-full"></span>
                        <span class="flex-1 ml-3 whitespace-nowrap truncate ">{{ $item->mapel }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
