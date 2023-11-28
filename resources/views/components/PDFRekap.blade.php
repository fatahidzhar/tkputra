@extends('layouts.app')
<style>
    table,
    th,
    td {
        border: 1px solid rgb(160, 160, 160);
        border-collapse: collapse;
        padding-top: 5px;
        padding-bottom: 5px;
    }
</style>

<div style="display: flex; flex-direction: column;">
    <div>
        @if ($selected_dates)
            {{ $selected_dates }}
        @elseif($selected_dates != 0)
            Today
        @endif
    </div>
    <div style="margin-top: 10px; margin-bottom: 10px;">
        <span class="flex items-center text-sm font-medium text-gray-900 dark:text-white"><span
                class="flex w-2.5 h-2.5 bg-blue-600 rounded-full mr-1.5 flex-shrink-0"></span><b>Catatan</b> : CL =
            CheckList,
            HK
            = Hasil Karya, CA = Catatan Anekdot, N = Nilai, NH = Nilai Hasil</span>
        <span class="flex items-center text-sm font-medium text-gray-900 dark:text-white"><span
                class="flex w-2.5 h-2.5 bg-blue-600 rounded-full mr-1.5 flex-shrink-0"></span><b>Catatan</b>
            BB
            = Belum Berkembang, MB = Mulai Berkembang, BSH = Berkembang Sesuai Harapan, BSB = Berkembang Sangat
            Baik</span>
    </div>
</div>
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
                                            {{ $item }},
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
                    <th scope="col" class="px-3 py-3 text-center {{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
                        CL
                    </th>
                    <th scope="col" class="px-3 py-3 text-center {{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
                        HK
                    </th>
                    <th scope="col" class="px-3 py-3 text-center {{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
                        CA
                    </th>
                    <th scope="col" class="px-3 py-3 text-center {{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
                        N</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $result)
                <tr class="border-b border-gray-200 dark:border-gray-700">
                    <th scope="row"
                        class="px-6 py-4 text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
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
                        <th scope="col" class="px-3 text-xs py-3 {{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
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
