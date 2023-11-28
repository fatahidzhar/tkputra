@extends('layouts.app')
@section('title', 'Kritik & Saran')
{{-- @include('layouts.navbarMobile') --}}
@section('content')
    <div class="p-4">
        @include('layouts.TimelineRegister')
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
        <form method="POST" action="{{ route('stepRegister.Step2') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="uuid_m" value="{{ $siswa->uuid_m }}" readonly required>
            <h3 class="mb-4 text-lg font-medium leading-none text-gray-900 dark:text-white">Tempat Tinggal</h3>
            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                <div>
                    <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat
                        Domisili</label>
                    <textarea id="address" name="domisili" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old('domisili') }}</textarea>
                </div>
                <div class="flex">
                    <div class="mr-1">
                        <label for="place" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">RT</label>
                        <input type="number" id="place" name="rt"  value="{{ old('rt') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>
                    <div class="ml-1">
                        <label for="place" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">RW</label>
                        <input type="number" id="place" name="rw"  value="{{ old('rw') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"required>
                    </div>
                </div>
                <div>
                    <label for="place" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                        Dusun</label>
                    <input type="text" name="nama_dusun" id="place" value="{{ old('nama_dusun') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div>
                    <label for="countries"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Provinsi</label>
                    <select id="provinsi" name="provinsi"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>-Pilih Provinsi-</option>
                        @foreach ($provincesData as $item)
                            <option value="{{ $item[0] }}">{{ $item[1] }}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="provinsi" id="nama_provinsi" value="{{ old('nama_provinsi') }}" readonly
                        required>
                </div>
                <div>
                    <label for="countries"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kabupaten/Kota</label>
                    <select name="kota" id="regency" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </select>
                    <input type="hidden" name="kota" id="nama_regency" value="{{ old('nama_regency') }}" readonly
                        required>
                </div>
                <div>
                    <label for="countries"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kecamatan</label>
                    <select name="kecamatan" id="district" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </select>
                    <input type="hidden" name="kecamatan" id="nama_district" value="{{ old('nama_district') }}" readonly
                        required>
                </div>
                <div>
                    <label for="place"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelurahan</label>
                    <input type="text" name="kelurahan" id="place" value="{{ old('kelurahan') }}" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div>
                    <label for="place" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode
                        Pos</label>
                    <input type="number" name="kodepos" id="zipcode" value="{{ old('kodepos') }}" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div>
                    <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat
                        Tinggal</label>
                    <textarea id="address" name="tempat_tinggal" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old('domisili') }}</textarea>
                </div>
                <div
                    class="block max-w-sm p-3 bg-white border border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700">
                    <label for="place" class="block text-sm mb-2 font-medium text-gray-900 dark:text-white">Moda
                        Trasportasi</label>
                    <div class="flex justify-between">
                        <div class="flex items-center pl-4 pr-4 border border-gray-200 rounded dark:border-gray-700">
                            <input id="bordered-radio-1" type="radio" value="Mobil" name="transportasi"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="bordered-radio-1"
                                class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Mobil</label>
                        </div>
                        <div class="flex items-center pl-4 pr-4 border border-gray-200 rounded dark:border-gray-700">
                            <input id="bordered-radio-2" type="radio" value="Motor" name="transportasi"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="bordered-radio-2"
                                class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Motor</label>
                        </div>
                        <div class="flex items-center pl-4 pr-4 border border-gray-200 rounded dark:border-gray-700">
                            <input id="bordered-radio-2" type="radio" value="Umum" name="transportasi"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="bordered-radio-2"
                                class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Umum</label>
                        </div>
                    </div>
                    <label for="place" class="block text-sm mb-2 mt-3 font-medium text-gray-900 dark:text-white">Jarak
                        Rumah ke
                        Sekolah</label>
                    <div class="flex justify-between">
                        <div class="flex items-center pl-4 pr-4 border border-gray-200 rounded dark:border-gray-700">
                            <input id="bordered-radio-1" type="radio" value="Kurang dari 1KM" name="jarak"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="bordered-radio-1"
                                class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kurang dari
                                1KM</label>
                        </div>
                        <div class="flex items-center pl-4 pr-4 border border-gray-200 rounded dark:border-gray-700">
                            <input id="bordered-radio-2" type="radio" value="Lebih dari 1KM" name="jarak"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="bordered-radio-2"
                                class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Lebih dari
                                1KM</label>
                        </div>
                    </div>
                </div>
                <div>
                    <label for="place" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waktu
                        Tempuh</label>
                    <input type="number" name="waktu_tempuh" id="minute" value="{{ old('waktu_tempuh') }}" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Berikutnya
            </button>
        </form>
    </div>

    <script>
        const regencySelect = document.getElementById('regency');
        const districtSelect = document.getElementById('district');
        const villageSelect = document.getElementById('village');

        document.getElementById('provinsi').addEventListener('change', async function() {
            const provinceId = this.value;
            const selectedOption = this.options[this.selectedIndex];
            const selectedText = selectedOption.innerText;
            const inputElement = document.getElementById('nama_provinsi');
            inputElement.value = selectedText;

            // Reset pilihan kabupaten dan kecamatan
            // const regencySelect = document.getElementById('regency');
            regencySelect.innerHTML = '<option value="">Pilih Kabupaten/Kota</option>';


            if (provinceId) {
                const response = await fetch('/wilayah/regencies/' + provinceId);
                const data = await response.json();

                if (data.regency) {
                    const regencyData = data.regency;
                    Object.keys(regencyData).forEach(key => {
                        const regency = regencyData[key];
                        const idRegency = regency[0];
                        const nameRegency = regency[2];
                        const option = document.createElement('option');
                        option.value = idRegency;
                        option.textContent = nameRegency;
                        regencySelect.appendChild(option);
                    });

                } else {
                    console.error('Data regency tidak ditemukan');
                }
            }
        });

        document.getElementById('regency').addEventListener('change', async function() {
            const regencyId = this.value;
            const selectedOption = this.options[this.selectedIndex];
            const selectedText = selectedOption.innerText;
            const inputElement = document.getElementById('nama_regency');
            inputElement.value = selectedText;

            // Reset pilihan kabupaten dan kecamatan
            districtSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';

            if (regencyId) {
                const response = await fetch('/wilayah/districts/' + regencyId);
                const data = await response.json();

                if (data.district) {
                    const districtData = data.district;
                    Object.keys(districtData).forEach(key => {
                        const district = districtData[key];
                        const idDistrict = district[0];
                        const nameDistrict = district[2];
                        const option = document.createElement('option');

                        option.value = idDistrict;
                        option.textContent = nameDistrict;

                        districtSelect.appendChild(option);
                    });

                    $('#district').on('change', function() {
                        const selectedDistrict = $('#district option:selected').text();
                        $('#nama_district').val(selectedDistrict);
                    });
                } else {
                    console.error('Data district tidak ditemukan');
                }
            }
        });

        // document.getElementById('district').addEventListener('change', async function() {
        //     const districtId = this.value;
        //     // Reset pilihan kabupaten dan kecamatan
        //     villageSelect.innerHTML = '<option value="">Pilih Kelurahan</option>';

        //     if (districtId) {
        //         const response = await fetch('/wilayah/villages/' + districtId);
        //         const data = await response.json();

        //         if (data.village) {
        //             const villageData = data.village;
        //             Object.values(villageData).forEach(village => {
        //                 const idVillage = village[0];
        //                 const nameVillage = village[2];
        //                 const option = document.createElement('option');
        //                 option.value = idVillage;
        //                 option.textContent = nameVillage;
        //                 villageSelect.appendChild(option);
        //             });
        //         } else {
        //             console.error('Data village tidak ditemukan');
        //         }
        //     }
        // });
    </script>
@endsection
