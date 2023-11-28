@extends('layouts.app')
@section('title', 'Mata Pelajaran ' . $mapels->mapel)
@section('content')
    @include('layouts.navbar')
    @include('layouts.sidebar')

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-dashed rounded-lg dark:border-gray-700 mt-10">
            <div class="grid gap-4">
                <div class="items-center justify-center mb-3 rounded dark:bg-gray-800">
                    {!! breadcrumbs([
                        'Dashboard' => url('/'),
                        'Data Murid' => url('datamurid'),
                        'Data Nilai' => url('nilai'),
                        'Kelas ' . $class->name_class => url('nilai/' . $class->uu_class),
                        $mapels->mapel => '',
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
            <a href=""
                onclick="event.preventDefault(); window.location.href='{{ url('nilai/' . $class->uu_class) }}'"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg aria-hidden="true" class="w-5 h-5 rotate-180" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Icon description</span>
            </a>
            @if (in_array('guru', explode(',', Auth::user()->role)))
                <div class="relative overflow-x-auto mt-5 sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-center">
                                    No
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama Murid
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Checklist
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Hasil Karya
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Catatan Anekdot
                                </th>
                            </tr>
                        </thead>
                        <form action="{{ route('nilai.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <tbody>
                                @foreach ($nilais as $index => $item)
                                <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                class="px-6 py-2 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $loop->iteration }}
                                        </th>
                                        <td class="px-6 py-2 truncate">
                                            <input type="hidden" name="nilais[{{ $index }}][tanggal]" value="{{ $date }}">
                                            <input type="hidden" name="nilais[{{ $index }}][uuid_g]" required
                                                readonly value="{{ Auth::user()->uuid }}">
                                            <input type="hidden" name="nilais[{{ $index }}][uuid_m]" required
                                                readonly value="{{ $item->uuid }}">
                                            <input type="hidden" name="nilais[{{ $index }}][uu_mapel]" required
                                                readonly value="{{ $mapels->uu_mapel }}">
                                            {{ $item->full_name }}
                                        </td>
                                        <td class="px-3 py-2 text-center">
                                            <select id="develop" name="nilais[{{ $index }}][cl]"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option value="0" {{ $item->cl == 0 ? 'selected' : '' }}></option>
                                                <option value="1" {{ $item->cl == 1 ? 'selected' : '' }}>BB (Belum Berkembang)</option>
                                                <option value="2" {{ $item->cl == 2 ? 'selected' : '' }}>MB (Mulai Berkembang)</option>
                                                <option value="3" {{ $item->cl == 3 ? 'selected' : '' }}>BHS (Berkembang Sesuai Harapan)</option>
                                                <option value="4" {{ $item->cl == 4 ? 'selected' : '' }}>BSB (Berkembang Sangat Baik)</option>
                                            </select>
                                        </td>
                                        <td class="px-3 py-2 text-center">
                                            <select id="develop" name="nilais[{{ $index }}][hk]"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option value="0" {{ $item->hk == 0 ? 'selected' : '' }}></option>
                                                <option value="1" {{ $item->hk == 1 ? 'selected' : '' }}>BB (Belum Berkembang)</option>
                                                <option value="2" {{ $item->hk == 2 ? 'selected' : '' }}>MB (Mulai Berkembang)</option>
                                                <option value="3" {{ $item->hk == 3 ? 'selected' : '' }}>BHS (Berkembang Sesuai Harapan)</option>
                                                <option value="4" {{ $item->hk == 4 ? 'selected' : '' }}>BSB (Berkembang Sangat Baik)</option>
                                            </select>
                                        </td>
                                        <td class="px-3 py-2 text-center">
                                            <select id="develop" name="nilais[{{ $index }}][ca]"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option value="0" {{ $item->ca == 0 ? 'selected' : '' }}></option>
                                                <option value="1" {{ $item->ca == 1 ? 'selected' : '' }}>BB (Belum Berkembang)</option>
                                                <option value="2" {{ $item->ca == 2 ? 'selected' : '' }}>MB (Mulai Berkembang)</option>
                                                <option value="3" {{ $item->ca == 3 ? 'selected' : '' }}>BHS (Berkembang Sesuai Harapan)</option>
                                                <option value="4" {{ $item->ca == 4 ? 'selected' : '' }}>BSB (Berkembang Sangat Baik)</option>
                                            </select>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="font-semibold text-gray-900 dark:text-white">
                                    <th scope="row" class="px-6 py-3"></th>
                                    <td class="px-6 py-3 text-center">KD</td>
                                    <td class="px-3 py-2" colspan="2">
                                        <select id="develop" name="uu_kd"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            @foreach ($aspek as $item)
                                                <option value="{{ $item->uu_kd }}" {{ optional($nilais_attrs)->uu_kd == $item->uu_kd ? 'selected' : '' }}>{{ $item->no_kd }} {{ $item->kd }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="px-3 py-3">
                                        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                            class="w-full block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                            type="button">
                                            Simpan Nilai
                                        </button>
                                    </td>
                                    <div id="popup-modal" tabindex="-1"
                                        class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                                        <div class="relative w-full h-full max-w-md md:h-auto">
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <button type="button"
                                                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                                    data-modal-hide="popup-modal">
                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <div class="p-6 text-center">
                                                    <svg aria-hidden="true"
                                                        class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200"
                                                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    <input type="hidden" name="tanggal" value="{{ $date }}">
                                                    <input type="hidden" name="uu_mapel"
                                                        value="{{ $mapels->uu_mapel }}" required readonly>
                                                        <input type="hidden" name="uu_mapel"
                                                        value="{{ $mapels->uu_mapel }}" required readonly>
                                                    <input type="hidden" name="uu_class" value="{{ $class->uu_class }}"
                                                        required readonly value="{{ $item->uuid_m }}">
                                                    <textarea id="message" rows="4" required name="kegiatan"
                                                        class="block p-2.5 mb-5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        placeholder="Isi Kegiatan {{ $mapels->mapel }}...">{{ $nilais_attrs->kegiatan ?? '' }}</textarea>
                                                    <button data-modal-hide="popup-modal" type="submit"
                                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                        Simpan
                                                    </button>
                                                    <button data-modal-hide="popup-modal" type="button"
                                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Batal</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            </tfoot>
                        </form>
                    </table>
                </div>
            @endif

        @endsection
