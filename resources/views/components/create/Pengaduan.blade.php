@extends('layouts.app')
@section('title', 'Pengaduan')
{{-- @include('layouts.navbarMobile') --}}
@section('content')
    <div class="p-4">
        <a href="" onclick="event.preventDefault(); window.location.href='{{ url('layanan') }}'">
            <h2 class="text-3xl font-extrabold dark:text-white"><i class="bi bi-arrow-left-short mr-1"></i></h2>
        </a>
    </div>
    <div class="pr-4 pl-4">
        <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-6">
                <input type="hidden" name="uuid_m" value="{{ Auth::user()->uuid }}">
                <label for="complaint"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pengaduan</label>
                <textarea id="complaint" name="text" rows="4"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
            </div>
            <button type="submit"
                class="text-white mb-4 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kirim
                Pengaduan</button>

        </form>
        @if ($errors->any())
            <div id="alert-2" class="flex p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Info</span>
                <div class="ml-3 text-sm font-medium">
                    Change a few things up and try submitting again.
                </div>
                <button type="button"
                    class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-2" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        @endif
        @if (session()->get('success'))
            <div id="toast-simple"
                class="flex items-center w-full bg-gray-50 p-4 space-x-4 text-gray-500 bg-white divide-x divide-gray-200 rounded-lg dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800"
                role="alert">
                <svg aria-hidden="true" class="w-5 h-5 text-blue-600 dark:text-blue-500" focusable="false" data-prefix="fas"
                    data-icon="paper-plane" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor"
                        d="M511.6 36.86l-64 415.1c-1.5 9.734-7.375 18.22-15.97 23.05c-4.844 2.719-10.27 4.097-15.68 4.097c-4.188 0-8.319-.8154-12.29-2.472l-122.6-51.1l-50.86 76.29C226.3 508.5 219.8 512 212.8 512C201.3 512 192 502.7 192 491.2v-96.18c0-7.115 2.372-14.03 6.742-19.64L416 96l-293.7 264.3L19.69 317.5C8.438 312.8 .8125 302.2 .0625 289.1s5.469-23.72 16.06-29.77l448-255.1c10.69-6.109 23.88-5.547 34 1.406S513.5 24.72 511.6 36.86z">
                    </path>
                </svg>
                <div class="pl-4 text-sm font-normal w-full">{{ session()->get('success') }}</div>
                <button type="button"
                    class="ml-auto -mx-1.5 -my-1.5 bg-gray-50 text-gray-500 rounded-lg border-none focus:ring-2 focus:ring-gray-400 p-1.5 hover:bg-gray-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700 dark:hover:text-white"
                    data-dismiss-target="#toast-simple" aria-label="Close">
                    <span class="sr-only">Dismiss</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        @endif
        <ul class="my-4 space-y-3">
            @foreach ($pengaduan as $item)
                <li>
                    <a data-drawer-target="{{ $item->id }}" data-drawer-show="{{ $item->id }}"
                        data-drawer-placement="bottom" aria-controls="{{ $item->id }}"
                        class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                        <span class="flex-1 ml-3 truncate whitespace-nowrap">
                            {{ $item->text }}
                        </span>
                        @if ($item->status == 0)
                            <span
                                class="inline-flex items-center justify-center px-2 py-0.5 ml-3 text-xs font-medium text-gray-500 bg-gray-200 rounded dark:bg-gray-700 dark:text-gray-400">Menunggu</span>
                        @elseif($item->status == 1)
                            <span
                                class="inline-flex items-center justify-center px-2 py-0.5 ml-3 text-xs font-medium text-green-500 bg-green-200 rounded dark:bg-green-700 dark:text-green-400">di-baca</span>
                        @endif
                    </a>
                </li>
                <div id="{{ $item->id }}"
                    class="fixed bottom-0 left-0 right-0 z-40 rounded-t-lg w-full p-4 overflow-y-auto transition-transform translate-y-full bg-white dark:bg-gray-800"
                    tabindex="-1" aria-labelledby="drawer-bottom-label">
                    <h5 id="drawer-bottom-label"
                        class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400">
                        <svg class="w-5 h-5 mr-2" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd"></path>
                        </svg>Terkirim, {{ date('Y-m-d', strtotime($item->created_at)) }}
                    </h5>
                    <button type="button" data-drawer-hide="{{ $item->id }}" aria-controls="{{ $item->id }}"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close menu</span>
                    </button>
                    <p class="max-w-lg text-sm text-gray-500 dark:text-gray-400">
                    <ul class="space-y-3 mb-4">
                        <li>
                            <blockquote class="text-md mt-3 italic font-semibold text-gray-900 dark:text-white">
                                <div class="flex justify-between">
                                    @if ($item->status == 0)
                                        <span class="flex items-center text-sm font-medium text-gray-900 dark:text-white">
                                            <span
                                                class="flex w-2.5 h-2.5 bg-gray-400 rounded-full mr-1.5 flex-shrink-0"></span>Menunggu
                                            di-baca
                                        </span>
                                    @elseif($item->status == 1)
                                        <span class="flex items-center text-sm font-medium text-gray-900 dark:text-white">
                                            <span
                                                class="flex w-2.5 h-2.5 bg-green-400 rounded-full mr-1.5 flex-shrink-0"></span>Sudah
                                            di-baca
                                        </span>
                                    @endif
                                    <form action="{{ route('pengaduan.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <span class="inline-flex items-center justify-center px-2 py-0.5 ml-3"><button
                                                type="submit">

                                                <i class="bi bi-trash3-fill text-red-600"></i>
                                            </button>
                                        </span>
                                    </form>
                                </div>
                                <p
                                    class="mt-2 flex justify-between items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 dark:bg-gray-600 dark:text-white">
                                    {{ $item->text }}</p>
                            </blockquote>
                        </li>
                    </ul>
                    <div class="pl-1">
                        @if ($item->status == 0)
                            <span
                                class="flex justify-center my-3 items-center text-sm font-medium text-gray-900 dark:text-white">
                                Belum ada Pesan Tanggapan
                            </span>
                        @elseif($item->status == 1)
                            <ol class="relative border-l border-gray-200 dark:border-gray-700">
                                <li class="mb-10 ml-5">
                                    <div
                                        class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700">
                                    </div>
                                    <div class="flex justify-between align-middle">
                                        <div>
                                            <time
                                                class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">{{ $item->tgl_tanggapan }}</time>
                                        </div>
                                        <div>
                                            @if ($item->status1 == 1)
                                                <span
                                                    class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Di-Proses</span>
                                            @else
                                                <span
                                                    class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Selesai</span>
                                            @endif
                                        </div>
                                    </div>
                                    <p class="text-base font-normal text-gray-500 dark:text-gray-400">
                                        {{ $item->text_tanggapan ?? 'Tidak Ada Pesan Tanggapan' }}</p>
                                </li>
                            </ol>
                        @endif
                    </div>
                    </p>
                </div>
            @endforeach
        </ul>
    </div>
@endsection
