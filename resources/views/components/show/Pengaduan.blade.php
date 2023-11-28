@extends('layouts.app')
@section('title', 'Pengaduan')
@section('content')
    @include('layouts.navbar')
    @include('layouts.sidebar')

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-dashed rounded-lg dark:border-gray-700 mt-14">
            <div class="grid gap-4">
                <div class="items-center justify-center mb-5 rounded dark:bg-gray-800">
                    {!! breadcrumbs([
                        'Dashboard' => url('/'),
                        'Pengaduan' => '',
                    ]) !!}
                </div>
            </div>
            @if (session()->get('success'))
                <div id="toast-simple"
                    class="flex items-center w-full bg-gray-50 p-4 mb-4 space-x-4 text-gray-500 bg-white divide-x divide-gray-200 rounded-lg dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800"
                    role="alert">
                    <svg aria-hidden="true" class="w-5 h-5 text-blue-600 dark:text-blue-500" focusable="false"
                        data-prefix="fas" data-icon="paper-plane" role="img" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512">
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
            <div class="mb-4">
                <label for="message"
                    class="block mb-2 mt-3 text-sm font-medium text-gray-900 dark:text-white">Pengaduan</label>
                <textarea id="message" disabled name="text" rows="4"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $pengaduans->text }}</textarea>
                <hr class="w-48 h-1 mx-auto my-4 bg-gray-100 border-0 rounded md:my-10 dark:bg-gray-700">
                <form action="{{ route('pengaduan.update', $pengaduans->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <input type="hidden" value="{{ $pengaduans->uuid_m ?? 'Tidak ada' }}" name="uuid_m">
                    <label for="message" class="block mb-2 mt-3 text-sm font-medium text-gray-900 dark:text-white">Beri
                        Tanggapan Pengaduan</label>
                    <textarea id="message" name="text_tanggapan" rows="4" required
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $pengaduans->text_tanggapan }}</textarea>
            </div>
            <div class="mb-5 flex gap-2">
                <div class="flex items-center pl-4 pr-4 border border-gray-200 rounded dark:border-gray-700">
                    <input id="bordered-radio-1" type="radio" value="1" name="status1"
                        {{ old('status1', $pengaduans->status1) == '1' ? 'checked' : '' }}
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="bordered-radio-1"
                        class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Proses</label>
                </div>
                <div class="flex items-center pl-4 pr-4 border border-gray-200 rounded dark:border-gray-700">
                    <input id="bordered-radio-2" type="radio" value="2" name="status1"
                        {{ old('status1', $pengaduans->status1) == '2' ? 'checked' : '' }}
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="bordered-radio-2"
                        class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Selesai</label>
                </div>
            </div>
            <div class="flex">
                <a href="" onclick="event.preventDefault(); window.location.href='{{ url('pengaduan') }}'"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg aria-hidden="true" class="w-5 h-5 rotate-180" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Back</span>
                </a>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Submit
                    Tanggapan Pesan</button>
            </div>
        </div>
        </form>
    </div>
@endsection
