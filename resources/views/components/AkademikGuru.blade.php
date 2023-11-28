@extends('layouts.app')
@section('title', 'Home')
@section('content')
    {{-- @include('layouts.navbarMobile') --}}
    @include('layouts.bottomNavigation')

    <div class="p-4">
        <a href="" onclick="event.preventDefault(); window.location.href='{{ url('akademik') }}'">
            <h2 class="text-3xl mb-3 font-extrabold dark:text-white"><i class="bi bi-arrow-left-short mr-1"></i></h2>
        </a>
        @foreach ($guru as $item)
            <div
                class="w-full mt-3 max-w-sm bg-white border border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-end px-4 pt-4">
                    <div
                        class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5">
                    </div>
                </div>
                <div class="flex flex-col items-center pb-10">
                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ $item->image }}" alt="Bonnie image" />
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $item->full_name }}</h5>
                    <div class="flex mt-2">
                        <span
                            class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">Kelas
                            : {{ $item->name_class }}</span>
                        <span
                            class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">{{ $item->tahun_ajar }}
                            Tahun Mengajar</span>
                    </div>
                    <div class="flex mt-4 space-x-3 md:mt-6">
                        <a href="https://wa.me/{{ $item->telp }}" target="_blank"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"><i
                                class="bi bi-whatsapp mr-2"></i> WhatsApp</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
