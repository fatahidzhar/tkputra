@extends('layouts.app')
@section('title', 'Data Nilai')
@section('content')
    @include('layouts.navbar')
    @include('layouts.sidebar')

    <div class="p-2 sm:ml-64">
        <div class="p-4 border-dashed rounded-lg dark:border-gray-700 mt-10">
            <div class="grid gap-4">
                <div class="items-center justify-center mb-5 rounded dark:bg-gray-800">
                    {!! breadcrumbs([
                        'Dashboard' => url('/'),
                        'Data Murid' => url('datamurid'),
                        'Data Nilai' => '',
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
            <div class="mb-4">
                @if (in_array('guru', explode(',', Auth::user()->role)))
                    <ul
                        class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">
                        @foreach ($classe as $item)
                            <li class="mr-2">
                                <a href=""
                                    onclick="event.preventDefault(); window.location.href='{{ url('nilai/' . $item->uu_class) }}'"
                                    aria-current="page"
                                    class="inline-block p-4 text-blue-600 bg-gray-100 rounded-t-lg active dark:bg-gray-800 dark:text-blue-500">Kelas
                                    {{ $item->name_class }}</a>
                            </li>
                        @endforeach
                    </ul>
                @endif
                <div class="flex items-center justify-between">
                    <div class="flex mt-5">
                        <form method="GET" action="{{ route('rekap.index') }}" id="date-form">
                            <button id="dropdownRadioButton" data-dropdown-toggle="dropdownRadio"
                                class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                                type="button">
                                <svg class="w-4 h-4 mr-2 text-gray-400" aria-hidden="true" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                @if ($selected_dates)
                                    {{ $selected_dates }}
                                @elseif($selected_dates != 0)
                                    Today
                                @endif
                                <svg class="w-3 h-3 ml-2" aria-hidden="true" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="dropdownRadio"
                                class="z-10 hidden w-48 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                                data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top"
                                style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 3847.5px, 0px);">
                                <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownRadioButton">
                                    <li>
                                        <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                            <input name="date_range" id="date_range" id="filter-radio-example-1"
                                                type="radio" value="1" name="filter-radio"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="filter-radio-example-1"
                                                class="w-full ml-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Today</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                            <input name="date_range" id="date_range" id="filter-radio-example-2"
                                                type="radio" value="7" name="filter-radio"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="filter-radio-example-2"
                                                class="w-full ml-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last
                                                7 days</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                            <input name="date_range" id="date_range" id="filter-radio-example-3"
                                                type="radio" value="30" name="filter-radio"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="filter-radio-example-3"
                                                class="w-full ml-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last
                                                30 days</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </form>
                    </div>
                    <div>
                        <form action="{{ route('rekap.index') }}" method="GET">
                            <div date-rangepicker class="flex items-center mt-5">
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <input name="start_date" type="text" required
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Select date start">
                                </div>
                                <span class="mx-4 text-gray-500">to</span>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <input name="end_date" type="text" required
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Select date end">
                                </div>
                                <button type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 ml-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Cari</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <span class="flex items-center text-sm font-medium text-gray-900 dark:text-white"><span
                class="flex w-2.5 h-2.5 bg-blue-600 rounded-full mr-1.5 flex-shrink-0"></span>Catatan : CL = CheckList, HK
            = Hasil Karya, CA = Catatan Anekdot, N = Nilai, NH = Nilai Hasil</span>
        <div class="relative mt-5 overflow-x-auto sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                            Aspek
                        </th>
                        @foreach ($mapels as $index => $mapel)
                            <th colspan="4" class="px-6 py-3 {{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
                                {{ $mapel->mapel }}</th>
                        @endforeach
                    </tr>
                    <tr>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                            KD
                        </th>
                        @php
                            $uu_kd_values = [];
                        @endphp
                        @foreach ($results as $result)
                            @foreach ($mapels as $mapel)
                                @php
                                    $uu_kd_value = $result->{str_replace(' ', '_', $mapel->mapel) . '_uu_kd'};
                                    $uu_kd_values[] = $uu_kd_value;
                                @endphp
                            @endforeach
                        @endforeach
                        @foreach ($mapels as $index => $mapel)
                            <th colspan="4" class="px-6 py-3 {{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
                                @if (isset($uu_kd_values[$index]))
                                    {{ $uu_kd_values[$index] }}
                                @endif
                            </th>
                        @endforeach
                    </tr>
                    <tr>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                            Kegiatan
                        </th>
                        @php
                            $uu_kd_values = [];
                        @endphp
                        @foreach ($results as $result)
                            @foreach ($mapels as $mapel)
                                @php
                                    $uu_kd_value = $result->{str_replace(' ', '_', $mapel->mapel) . '_uu_keg'};
                                    $uu_kd_values[] = $uu_kd_value;
                                @endphp
                            @endforeach
                        @endforeach
                        @foreach ($mapels as $index => $mapel)
                            <th colspan="4" class="px-6 py-3 {{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
                                @if (isset($uu_kd_values[$index]))
                                    {{ $uu_kd_values[$index] }}
                                @endif
                            </th>
                        @endforeach
                    </tr>
                    <tr>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                            NH
                        </th>
                        @foreach ($mapels as $index => $mapel)
                            <th scope="col"
                                class="px-3 py-3 text-center {{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">CL
                            </th>
                            <th scope="col"
                                class="px-3 py-3 text-center {{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">HK
                            </th>
                            <th scope="col"
                                class="px-3 py-3 text-center {{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">CA
                            </th>
                            <th scope="col"
                                class="px-3 py-3 text-center {{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">N</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($results as $result)
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                {{ $result->first_name }}
                            </th>
                            @foreach ($mapels as $index => $mapel)
                                <th scope="col"
                                    class="px-1 py-3 text-xs text-center {{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
                                    @if ($result->{str_replace(' ', '_', $mapel->mapel) . '_nilai_cl'} == 0)
                                    @elseif ($result->{str_replace(' ', '_', $mapel->mapel) . '_nilai_cl'} == 1)
                                        BB
                                    @elseif ($result->{str_replace(' ', '_', $mapel->mapel) . '_nilai_cl'} == 2)
                                        MB
                                    @elseif ($result->{str_replace(' ', '_', $mapel->mapel) . '_nilai_cl'} == 3)
                                        BSH
                                    @elseif ($result->{str_replace(' ', '_', $mapel->mapel) . '_nilai_cl'} == 4)
                                        BSB
                                    @endif
                                </th>
                                <th scope="col"
                                    class="px-1 py-3 text-xs text-center {{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
                                    @if ($result->{str_replace(' ', '_', $mapel->mapel) . '_nilai_hk'} == 0)
                                    @elseif ($result->{str_replace(' ', '_', $mapel->mapel) . '_nilai_hk'} == 1)
                                        BB
                                    @elseif ($result->{str_replace(' ', '_', $mapel->mapel) . '_nilai_hk'} == 2)
                                        MB
                                    @elseif ($result->{str_replace(' ', '_', $mapel->mapel) . '_nilai_hk'} == 3)
                                        BSH
                                    @elseif ($result->{str_replace(' ', '_', $mapel->mapel) . '_nilai_hk'} == 4)
                                        BSB
                                    @endif
                                </th>
                                <th scope="col"
                                    class="px-1 py-3 text-xs text-center {{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
                                    @if ($result->{str_replace(' ', '_', $mapel->mapel) . '_nilai_ca'} == 0)
                                    @elseif ($result->{str_replace(' ', '_', $mapel->mapel) . '_nilai_ca'} == 1)
                                        BB
                                    @elseif ($result->{str_replace(' ', '_', $mapel->mapel) . '_nilai_ca'} == 2)
                                        MB
                                    @elseif ($result->{str_replace(' ', '_', $mapel->mapel) . '_nilai_ca'} == 3)
                                        BSH
                                    @elseif ($result->{str_replace(' ', '_', $mapel->mapel) . '_nilai_ca'} == 4)
                                        BSB
                                    @endif
                                </th>
                                <th scope="col"
                                    class="px-3 text-xs py-3 {{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
                                    @if ($result->{str_replace(' ', '_', $mapel->mapel) . '_nilai_nh'} == 0)
                                    @elseif ($result->{str_replace(' ', '_', $mapel->mapel) . '_nilai_nh'} == 1)
                                        BB
                                    @elseif ($result->{str_replace(' ', '_', $mapel->mapel) . '_nilai_nh'} == 2)
                                        MB
                                    @elseif ($result->{str_replace(' ', '_', $mapel->mapel) . '_nilai_nh'} == 3)
                                        BSH
                                    @elseif ($result->{str_replace(' ', '_', $mapel->mapel) . '_nilai_nh'} == 4)
                                        BSB
                                    @endif
                                </th>
                            @endforeach
                        </tr>
                    @endforeach
                    </form>
                </tbody>
            </table>
        </div>
        <script>
            // Ambil elemen radio button
            var radioButtons = document.getElementsByName('date_range');

            // Tambahkan event listener untuk setiap radio button
            radioButtons.forEach(function(radio) {
                radio.addEventListener('change', function() {
                    // Lakukan submit form secara otomatis setelah radio button dipilih
                    document.getElementById('date-form').submit();
                });
            });

            let input = document.getElementById("week");
            let button = document.getElementById("submitButton");

            // Menambahkan event listener untuk input teks
            input.addEventListener("input", function() {
                let value = input.value;

                // Memeriksa apakah input adalah "Minggu xx" atau "Hasil Akhir"
                if (value === "Hasil Akhir" || /^Minggu [1-9][0-9]?$/.test(value)) {
                    // Input sesuai format, lanjutkan dengan pengolahan data
                    console.log("Input valid: " + value);
                    button.disabled = false;
                    button.classList.remove("disabled");
                    input.style.borderColor = "";
                } else {
                    console.log("Input tidak valid");
                    button.disabled = true;
                    button.classList.add("disabled");
                    input.style.borderColor = "red";
                }
            });
        </script>
    @endsection
