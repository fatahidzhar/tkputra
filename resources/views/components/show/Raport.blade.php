@extends('layouts.app')
@section('title', 'E-Raport')
@section('content')
    @include('layouts.navbar')
    @include('layouts.sidebar')
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-gray-200 rounded-lg dark:border-gray-700 mt-14">
            <form action="{{ route('raport.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Buat
                        Raport</button>
                </div>
                <span class="flex items-center text-sm font-medium text-gray-900 dark:text-white"><span
                        class="flex w-2.5 h-2.5 bg-blue-600 rounded-full mr-1.5 flex-shrink-0"></span>Catatan : CL =
                    CheckList,
                    HK
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
                                @foreach ($mapels as $index => $mapel)
                                    <th colspan="4" class="px-6 py-3 {{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
                                        @php
                                            $displayedValues = []; // Deklarasikan dan inisialisasikan di luar loop foreach
                                        @endphp

                                        <div class="flex flex-wrap">
                                            @foreach ($resultsAttrs as $result)
                                                @php
                                                    $value = $result->{str_replace(' ', '_', $mapel->mapel) . '_uu_kd'};
                                                    $filteredValue = array_unique(array_filter(explode(' ', $value)));
                                                @endphp

                                                @if (!empty($filteredValue))
                                                    @foreach ($filteredValue as $item)
                                                        @if (!in_array($item, $displayedValues))
                                                            <span
                                                                class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 mr-1 py-0.5 mb-1 rounded dark:bg-blue-900 dark:text-blue-300">
                                                                {{ $item }}
                                                            </span>
                                                            @php
                                                                $displayedValues[] = $item; // Tambahkan nilai ke dalam array untuk melacak nilai yang sudah ditampilkan
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        </div>
                                    </th>
                                @endforeach
                            </tr>
                            <tr>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    Kegiatan
                                </th>
                                @foreach ($mapels as $index => $mapel)
                                    <th colspan="4" class="px-6 py-3 {{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
                                        <div class="flex flex-wrap">
                                            @php
                                                $displayedNames = []; // Array untuk melacak nama yang sudah ditampilkan
                                            @endphp
                                            @foreach ($resultsAttrs as $result)
                                                @php
                                                    $value = $result->{str_replace(' ', '_', $mapel->mapel) . '_uu_keg'};
                                                    $filteredValue = array_filter(explode(' ', $value), function ($item) use (&$displayedNames) {
                                                        $name = trim($item);
                                                        if ($name === '0' || in_array($name, $displayedNames)) {
                                                            return false; // Jika nilai adalah 0 atau nama sudah ditampilkan sebelumnya, jangan tampilkan
                                                        } else {
                                                            $displayedNames[] = $name; // Tambahkan nama ke dalam array untuk melacak nama yang sudah ditampilkan
                                                            return true; // Tampilkan nama yang belum ditampilkan sebelumnya
                                                        }
                                                    });
                                                @endphp
                                                @if (!empty($filteredValue))
                                                    {{ implode(' ', $filteredValue) }}
                                                @endif
                                            @endforeach
                                        </div>
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
                                        class="px-3 py-3 text-center {{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">N
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($results as $array => $result)
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                        {{ $result->full_name }}
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
                                            <input type="hidden" value="{{ $result->uuid_m }}"
                                                name="nilais[{{ $array }}][{{ $index }}][uuid_m]" readonly
                                                required>
                                            <input type="hidden" value="{{ Auth::user()->guru->uuid_g }}"
                                                name="nilais[{{ $array }}][{{ $index }}][uuid_g]" readonly
                                                required>
                                            <input type="hidden"
                                                value="{{ $result->{str_replace(' ', '_', $mapel->mapel) . '_nilai_nh'} }}"
                                                name="nilais[{{ $array }}][{{ $index }}][nilai]">
                                            <input type="hidden" value="{{ $mapel->uu_mapel }}"
                                                name="nilais[{{ $array }}][{{ $index }}][uu_mapel]" readonly
                                                required>
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
                        </tbody>
                    </table>

                </div>
                <div class="mt-5">
                    <div class="relative overflow-x-auto sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                        Nama
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Izin
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                        Sakit
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Alpha
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($absensis as $index => $item)
                                    <tr class="border-b border-gray-200 dark:border-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                            {{ $item->full_name }}
                                            <input type="hidden" value="{{ $item->uuid_m }}"
                                                name="absensis[{{ $index }}][uuid_m]" required readonly>
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $item->total_izin }}
                                            <input type="hidden" value="{{ $item->total_izin }}"
                                                name="absensis[{{ $index }}][izin]" required readonly>
                                        </td>
                                        <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                            {{ $item->total_sakit }}
                                            <input type="hidden" value="{{ $item->total_sakit }}"
                                                name="absensis[{{ $index }}][sakit]" required readonly>
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->total_alpha }}
                                            <input type="hidden" value="{{ $item->total_alpha }}"
                                                name="absensis[{{ $index }}][alpha]" required readonly>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
