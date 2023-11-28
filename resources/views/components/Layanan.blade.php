@extends('layouts.app')
@section('title', 'Layanan')
@section('content')
    {{-- @include('layouts.navbarMobile') --}}
    @include('layouts.bottomNavigation')
    <div class="p-4" id="content">
        <ul class="my-4 space-y-3">
            <li>
                <a href="layanan/kritiksaran" onclick="event.preventDefault(); window.location.href='{{ url('layanan/kritiksaran') }}'"
                    class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                    <span class="flex-1 ml-3 whitespace-nowrap">Kritik & Saran</span>
                    <i class="bi bi-ui-checks text-xl mr-3 text-gray-500"></i>
                </a>
            </li>
            <li>
                <a href="layanan/pengaduan" onclick="event.preventDefault(); window.location.href='{{ url('layanan/pengaduan') }}'"
                    class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                    <span class="flex-1 ml-3 whitespace-nowrap">Pengaduan</span>
                    <i class="bi bi-exclamation-square-fill text-xl mr-3 text-gray-500"></i>
                </a>
            </li>
            <li>
                <a href="layanan/pengaduan" onclick="event.preventDefault(); window.location.href='{{ url('layanan/informasi') }}'"
                    class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                    <span class="flex-1 ml-3 whitespace-nowrap">Informasi</span>
                    <i class="bi bi-bell-fill text-xl mr-3 text-gray-500"></i>
                </a>
            </li>
        </ul>
    </div>
    @include('components.script.js')
@endsection
