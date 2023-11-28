@extends('layouts.app')
@section('title', 'Absen - ' . date('Y-m-d'))
@section('content')
    @include('layouts.navbar')
    @include('layouts.sidebar')

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-dashed rounded-lg dark:border-gray-700 mt-10">
            <div class="grid gap-4">
                <div class="items-center justify-center mb-3 rounded dark:bg-gray-800">
                    {!! breadcrumbs([
                        'Dashboard' => url('/'),
                        'Data Absen' => url('absen'),
                        'Absen Murid' => '',
                    ]) !!}
                </div>
            </div>
            @if ($errors->any())
                <div id="alert-4"
                    class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Danger</span>
                    <div>
                        <span class="font-medium">Ensure that these requirements are met:</span>
                        <ul class="mt-1.5 ml-4 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            <div class="mb-3">
                <a href="" onclick="event.preventDefault(); window.location.href='{{ url('absen') }}'"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg aria-hidden="true" class="w-5 h-5 rotate-180" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Icon description</span>
                </a>
                <div class="relative mt-5 overflow-x-auto sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-center">
                                    No
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Hadir
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Izin
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Sakit
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Alpha
                                </th>
                            </tr>
                        </thead>
                        <form action="{{ route('absen.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <tbody>
                                @foreach ($murid as $index => $item)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                            <input type="hidden" readonly name="absen[{{ $index }}][uuid_g]"
                                                value=" {{ Auth::user()->uuid }}">
                                            <input type="hidden" readonly name="absen[{{ $index }}][tanggal]"
                                                value="{{ $date }}">
                                            <input type="hidden" readonly name="absen[{{ $index }}][uuid_m]"
                                                value="{{ $item->uuid_m }}">
                                            {{ $loop->iteration }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $item->full_name }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <input type="radio" value="1"
                                                name="absen[{{ $index }}][kehadiran]"
                                                {{ $item->kehadiran == '1' ? 'checked' : '' }}
                                                class="w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <input type="radio" value="2"
                                                name="absen[{{ $index }}][kehadiran]"
                                                {{ $item->kehadiran == '2' ? 'checked' : '' }}
                                                class="w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <input type="radio" value="3"
                                                name="absen[{{ $index }}][kehadiran]"
                                                {{ $item->kehadiran == '3' ? 'checked' : '' }}
                                                class="w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <input type="radio" value="4"
                                                name="absen[{{ $index }}][kehadiran]"
                                                {{ $item->kehadiran == '4' ? 'checked' : '' }}
                                                class="w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                    </table>
                    <button type="submit"
                        class="mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Simpan</button>
                    </form>
                </div>

       
                @include('components.script.js')
            @endsection
