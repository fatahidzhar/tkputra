@extends('layouts.app')
@section('title', 'Home')
@section('content')
    {{-- @include('layouts.navbarMobile') --}}
    @include('layouts.bottomNavigation')
    <div>
        <div class="flex">
            <div class="flex-auto pt-4 pl-4 pr-2 w-full">
                <a href="" onclick="event.preventDefault(); window.location.href='{{ url('akademik/nilai') }}'">
                    <div
                        class="max-w-sm p-6 rounded-lg bg-gray-50 hover:bg-gray-100 group dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                        <i class="bi bi-file-earmark-ruled-fill text-gray-900 dark:text-gray-400 text-3xl"></i>
                        <div class="flex w-full mt-2">
                            <h5 class="text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Nilai</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="flex-auto pt-4 pr-4 pl-2 w-full">
                <a href="" onclick="event.preventDefault(); window.location.href='{{ url('akademik/absen') }}'">
                    <div
                        class="max-w-sm p-6 rounded-lg bg-gray-50 hover:bg-gray-100 group dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                        <i class="bi bi-person-hearts text-gray-900 dark:text-gray-400 text-3xl"></i>
                        </svg>
                        <div class="flex w-full mt-2">
                            <h5 class="text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Absen</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="flex">
            <div class="flex-auto py-4 pl-4 pr-2 w-full">
                <a href="" onclick="event.preventDefault(); window.location.href='{{ url('akademik/e-raport') }}'">
                    <div
                        class="max-w-sm p-6 rounded-lg bg-gray-50 hover:bg-gray-100 group dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                        <i class="bi bi-file-ruled-fill text-gray-900 dark:text-gray-400 text-3xl"></i>
                        <div class="flex w-full mt-2">
                            <h5 class="text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">E-Raport</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="flex-auto py-4 pr-4 pl-2 w-full">
                <a href="" onclick="event.preventDefault(); window.location.href='{{ url('akademik/guru') }}'">
                    <div
                        class="max-w-sm p-6 rounded-lg bg-gray-50 hover:bg-gray-100 group dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                        <i class="bi bi-person-workspace text-gray-900 dark:text-gray-400 text-3xl"></i>
                        </svg>
                        <div class="flex w-full mt-2">
                            <h5 class="text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Guru</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
