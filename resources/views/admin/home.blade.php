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
                                    <img class="w-11 h-11 border-2 object-cover border-white rounded-full dark:border-gray-800"
                                        src="{{ $item->image }}" alt="">
                                @endforeach

                            </div>
                        </div>
                        <div class="col-start-1 col-end-3 pr-3 pl-3 mt-5">
                            <button type="button"
                                class="text-black w-full bg-orange-300 hover:bg-orange-400 focus:ring-4 focus:ring-orange-200 font-medium rounded-xl text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Lihat
                                Keseluruhan</button>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-center h-40 rounded-2xl bg-red-100 dark:bg-gray-800">
                    <div class="grid grid-cols-2 p-2 w-full">
                        <div class="mt-2 pl-3">
                            <p class="text-sm font-medium text-gray-500 dark:text-white">Kritik & Saran</p>
                            <p class="text-2xl font-bold mt-1 text-gray-900 dark:text-white">{{ $countkritik_saran }}</p>
                        </div>
                        <div class="grid justify-end mt-3 ml-2">
                            <div class="flex mb-5 -space-x-4 w-11 h-11">
                            </div>
                        </div>
                        <div class="col-start-1 col-end-3 pr-3 pl-3 mt-5">
                            <button type="button"
                                class="text-black w-full bg-red-300 hover:bg-red-400 focus:ring-4 focus:ring-red-200 font-medium rounded-xl text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Lihat
                                Keseluruhan</button>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-center h-40 rounded-2xl bg-green-100 dark:bg-gray-800">
                    <div class="grid grid-cols-2 p-2 w-full">
                        <div class="mt-2 pl-3">
                            <p class="text-sm font-medium text-gray-500 dark:text-white">Pengaduan</p>
                            <p class="text-2xl font-bold mt-1 text-gray-900 dark:text-white">{{ $countpengaduan }}</p>
                        </div>
                        <div class="grid justify-end mt-3 ml-2">
                            <div class="flex mb-5 -space-x-4 w-11 h-11">
                            </div>
                        </div>
                        <div class="col-start-1 col-end-3 pr-3 pl-3 mt-5">
                            <button type="button"
                                class="text-black w-full bg-green-300 hover:bg-green-400 focus:ring-4 focus:ring-green-200 font-medium rounded-xl text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Lihat
                                Keseluruhan</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-between pt-2 mb-3 items-center">
                <div class="">
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">Kritik dan Saran</p>
                </div>
                <div class="">
                    <a href="kritiksaran"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Lihat
                        Semua</a>
                </div>
            </div>
            <div class="flex items-center justify-center pl-3  dark:bg-gray-800">
                @if (isset($faqs) && count($faqs) > 0)
                    <!-- Tampilkan data di sini -->
                    <ol class="relative border-l w-full border-gray-200 dark:border-gray-700">
                        @foreach ($faqs as $item)
                            <li class="mb-10 ml-6">
                                <span
                                    class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -left-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                                    <img class="rounded-full shadow-lg object-cover" src="{{ $item->image }}"
                                        alt="{{ $item->full_name }}" />
                                </span>
                                <div
                                    class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-700 dark:border-gray-600">
                                    <div class="items-center justify-between mb-3 sm:flex">
                                        <time
                                            class="mb-1 text-xs font-normal text-gray-400 sm:order-last sm:mb-0">{{ $item->created_at }}</time>
                                        <div class="text-sm font-normal text-gray-500 dark:text-gray-300"><a href="#"
                                                data-popover-target="{{ $item->id }}"
                                                class="font-semibold text-blue-600 dark:text-blue-500 hover:underline">{{ $item->full_name }}</a>
                                            to <span
                                                class="bg-gray-100 text-gray-800 text-xs font-normal mr-2 px-2.5 py-0.5 rounded dark:bg-gray-600 dark:text-gray-300">{{ $item->name }}</span>
                                        </div>
                                        <div data-popover id="{{ $item->id }}" role="tooltip"
                                            class="absolute z-50 invisible inline-block w-64 text-sm font-light text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                                            <div class="p-3">
                                                <div class="flex items-center justify-between mb-2">
                                                    <a href="#">
                                                        <img class="w-10 h-10 object-cover rounded-full"
                                                            src="{{ $item->image }}" alt="{{ $item->full_name }}">
                                                    </a>
                                                    <div>
                                                        <span
                                                            class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $item->name_class }}</span>
                                                    </div>
                                                </div>
                                                <p
                                                    class="text-base font-semibold leading-none text-gray-900 dark:text-white">
                                                    <a href="#">{{ $item->full_name }}</a>
                                                </p>
                                                <p class="mb-3 text-sm font-normal">
                                                    {{-- <a href="#" class="hover:underline">{{ $item->nis }}</a> --}}
                                                </p>
                                                <p class="mb-4 text-sm font-light">Open-source contributor. Building <a
                                                        href="#"
                                                        class="text-blue-600 dark:text-blue-500 hover:underline">flowbite.com</a>.
                                                </p>
                                                <ul class="flex text-sm font-light">
                                                    <li class="mr-2">
                                                        <a href="#" class="hover:underline">
                                                            <span
                                                                class="font-semibold text-gray-900 dark:text-white">799</span>
                                                            <span>Following</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="hover:underline">
                                                            <span
                                                                class="font-semibold text-gray-900 dark:text-white">3,758</span>
                                                            <span>Followers</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div data-popper-arrow></div>
                                        </div>
                                    </div>
                                    <div
                                        class="p-3 text-xs italic font-normal text-gray-500 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-600 dark:border-gray-500 dark:text-gray-300">
                                        {{ $item->text }}</div>
                                </div>
                            </li>
                        @endforeach
                    </ol>
                @else
                    <p>Tidak ada Kritik & Saran</p>
                @endif
            </div>
        </div>
    </div>
@endsection
