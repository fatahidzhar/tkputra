@extends('layouts.app')
@section('title', 'Absensi')
@section('content')
    {{-- @include('layouts.navbarMobile') --}}
    {{-- @include('layouts.bottomNavigation') --}}
    <div class="pt-4 pl-4 pr-4">
        <div class="flex items-center mb-2">
            <a href="" onclick="event.preventDefault(); window.location.href='{{ url('akademik/e-raport') }}'">
                <h2 class="text-3xl font-extrabold dark:text-white"><i class="bi bi-arrow-left-short"></i></h2>
            </a>
        </div>
        <ul class="my-4 space-y-3">
            @foreach ($raport as $item)
                <li>
                    <div
                        class="flex flex-col text-base text-gray-900 rounded-lg group dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                        <span class="flex-1 font-bold whitespace-nowrap truncate">{{ $item->mapel }}</span>
                        <div class="">
                            @if ($item->mapel == 'PENGEMBANGAN NILAI AGAMA DAN MORAL')
                                <p class="mb-3 text-gray-500 text-justify mt-3 dark:text-gray-400">Alhamdulillah,
                                    perkembangan agama
                                    {{ Auth::user()->full_name }}, @if ($item->nilai == 0)
                                    @elseif ($item->nilai == 1)
                                        Belum Berkembang
                                    @elseif ($item->nilai == 2)
                                        Mulai Berkembang
                                    @elseif ($item->nilai == 3)
                                        Berkembang Sesuai Harapan
                                    @elseif ($item->nilai == 4)
                                        Berkembang Sangat Baik
                                    @endif, seperti:
                                    {{ Auth::user()->full_name }} mampu mengucapkan bersama sama bacaan sholat, bacaan doa
                                    iftitah, takbir,
                                    ruku,
                                    i’tidal, sujud.
                                    Mampu mengucapkan hafalan surat Al Fatihah, surat An Nas. Mampu membaca dan menulis
                                    huruf hijaiyah, mampu menyebutkan rukun Islam, urutan wudhu, nama nama malaikat,
                                    dalam
                                    permainan tepuk. Mampu menyanyikan lagu Angka Bermakna, Ciptaan Allah, Tuhanku
                                    Allah,
                                    dst
                                </p>
                                <p class="mb-3 text-gray-500 text-justify dark:text-gray-400">Alhamdulillah, perkembangan
                                    moral
                                    {{ Auth::user()->full_name }}, @if ($item->nilai == 0)
                                    @elseif ($item->nilai == 1)
                                        Belum Berkembang
                                    @elseif ($item->nilai == 2)
                                        Mulai Berkembang
                                    @elseif ($item->nilai == 3)
                                        Berkembang Sesuai Harapan
                                    @elseif ($item->nilai == 4)
                                        Berkembang Sangat Baik
                                    @endif, seperti dalam hal, tertib saat berdoa, berbicara
                                    sopan, mengucapkan terima kasih, mau meminta maaf, senang membantu teman, tanggung jawab
                                    pada tugas yang diberikan.</p>
                            @elseif ($item->mapel == 'PERKEMBANGAN FISIK DAN MOTORIK')
                                <p class="mb-3 text-gray-500 text-justify mt-3 dark:text-gray-400">Alhamdulillah,
                                    perkembangan motorik
                                    kasar {{ Auth::user()->full_name }}, @if ($item->nilai == 0)
                                    @elseif ($item->nilai == 1)
                                        Belum Berkembang
                                    @elseif ($item->nilai == 2)
                                        Mulai Berkembang
                                    @elseif ($item->nilai == 3)
                                        Berkembang Sesuai Harapan
                                    @elseif ($item->nilai == 4)
                                        Berkembang Sangat Baik
                                    @endif, seperti dalam hal:
                                    {{ Auth::user()->full_name }} mampu melakukan kegiatan lari sambil lompat, berjalan
                                    mundur, jinjit, dst. Mampu
                                    melompat dari ketinggian 50 cm, semangat melakukan senam ritmik, gerak dan lagu Delman,
                                    lagu Ada Gempa, dsb. Senang melakukan gerakan fantasi seperti gerakan pohon tertiup
                                    angin, gerakan mendayung. Mampu mengayuh sepeda roda dua.

                                </p>
                                <p class="mb-3 text-gray-500 text-justify dark:text-gray-400">Alhamdulillah, perkembangan
                                    motorik halus
                                    {{ Auth::user()->full_name }}, @if ($item->nilai == 0)
                                    @elseif ($item->nilai == 1)
                                        Belum Berkembang
                                    @elseif ($item->nilai == 2)
                                        Mulai Berkembang
                                    @elseif ($item->nilai == 3)
                                        Berkembang Sesuai Harapan
                                    @elseif ($item->nilai == 4)
                                        Berkembang Sangat Baik
                                    @endif, seperti:
                                    {{ Auth::user()->full_name }} mampu menulis angka 1 sampai 30 dan menulis huruf/ kalimat
                                    sederhana
                                    Mampu melipat bentuk apel, bunga tulip, lilin, bintang, gunung merapi, dsb.
                                    Mampu menggunting pola bentuk pohon, bentuk ban renang, bentuk helikopter, pola gambar
                                    untuk disusun, dsb. Mampu membentuk buah atau benda dengan plastisin.
                                    Mampu membuat telepon dari gelas plastik, membuat laptop dari karton
                                    Mampu mencocok bentuk pola pelampung, planet, dsb
                                </p>
                                <p class="mb-3 text-gray-500 text-justify dark:text-gray-400">Alhamdulillah, perkembangan
                                    kesehatan fisik
                                    {{ Auth::user()->full_name }}, @if ($item->nilai == 0)
                                    @elseif ($item->nilai == 1)
                                        Belum Berkembang
                                    @elseif ($item->nilai == 2)
                                        Mulai Berkembang
                                    @elseif ($item->nilai == 3)
                                        Berkembang Sesuai Harapan
                                    @elseif ($item->nilai == 4)
                                        Berkembang Sangat Baik
                                    @endif. {{ Auth::user()->full_name }} tumbuh sehat dengan tinggi
                                    badan
                                    {{ Auth::user()->murid->tb }} cm
                                    dan berat badan {{ Auth::user()->murid->bb }} kg.
                                </p>
                            @elseif ($item->mapel == 'PERKEMBANGAN KOGNITIF')
                                <p class="mb-3 text-gray-500 text-justify mt-3 dark:text-gray-400">Alhamdulillah,
                                    perkembangan kognitif
                                    {{ Auth::user()->full_name }}, @if ($item->nilai == 0)
                                    @elseif ($item->nilai == 1)
                                        Belum Berkembang
                                    @elseif ($item->nilai == 2)
                                        Mulai Berkembang
                                    @elseif ($item->nilai == 3)
                                        Berkembang Sesuai Harapan
                                    @elseif ($item->nilai == 4)
                                        Berkembang Sangat Baik
                                    @endif, seperti dalam hal:
                                </p>
                                <p class="mb-3 text-gray-500 text-justify dark:text-gray-400">
                                    {{ Auth::user()->full_name }} mampu menyebutkan
                                    bagian bagian
                                    tanaman, bagian bagian kendaraan, dst. Mampu menyebutkan arah mata angin.
                                    {{ Auth::user()->full_name }} mampu
                                    menghubungkan angka menjadi sebuah bentuk sepeda, bentuk rumah. Mampu menyusun kepingan
                                    gambar delman, gambar helicopter, menjadi bentuk utuh. Mampu menyebutkan dan menulis
                                    urutan lambang bilangan 1 sampai 30.</p>
                                <p class="mb-3 text-gray-500 text-justify dark:text-gray-400">Mampu memasangkan gambar
                                    dengan bilangan
                                    yang sesuai. Mampu menyebutkan penjumlahan dan pengurangan 1 sampai 10 tanpa gambar.</p>
                            @elseif ($item->mapel == 'SOSIAL EMOSIONAL ')
                                <p class="mb-3 text-gray-500 text-justify mt-3 dark:text-gray-400">Alhamdulillah,
                                    perkembangan sosial
                                    emosional {{ Auth::user()->full_name }}, @if ($item->nilai == 0)
                                    @elseif ($item->nilai == 1)
                                        Belum Berkembang
                                    @elseif ($item->nilai == 2)
                                        Mulai Berkembang
                                    @elseif ($item->nilai == 3)
                                        Berkembang Sesuai Harapan
                                    @elseif ($item->nilai == 4)
                                        Berkembang Sangat Baik
                                    @endif, seperti:
                                </p>
                                <p class="mb-3 text-gray-500 text-justify dark:text-gray-400">
                                    {{ Auth::user()->full_name }} semangat saat mengikuti
                                    kegiatan
                                    bermain dan belajar dalam kelas, dan gembira bermain di taman bermain. Mampu bekerjasama
                                    dengan teman saat kegiatan belajar dan saat bermain. Sabar menunggu giliran, tidak mudah
                                    marah, tidak mudah menangis.</p>
                            @elseif ($item->mapel == 'PERKEMBANGAN BAHASA')
                                <p class="mb-3 text-gray-500 text-justify mt-3 dark:text-gray-400">Alhamdulillah,
                                    perkembangan kemampuan
                                    berbahasa {{ Auth::user()->full_name }},@if ($item->nilai == 0)
                                    @elseif ($item->nilai == 1)
                                        Belum Berkembang
                                    @elseif ($item->nilai == 2)
                                        Mulai Berkembang
                                    @elseif ($item->nilai == 3)
                                        Berkembang Sesuai Harapan
                                    @elseif ($item->nilai == 4)
                                        Berkembang Sangat Baik
                                    @endif, seperti :
                                </p>
                                <p class="mb-3 text-gray-500 text-justify dark:text-gray-400">
                                    {{ Auth::user()->full_name }} mampu menirukan syair
                                    lagu
                                    sederhana, mampu menceritakan kegiatan yang dilakukan saat liburan, menceritakan gambar
                                    yan dibuat. Mampu berkomunikasi dengan teman dan guru. Mampu menjawab pertanyaan
                                    sederhana dalam cerita bergambar, mampu menulis jawaban sederhana. Mampu membaca dua
                                    suku kata atau lebih dengan lancar. Mampu menyebutkan nama benda yang sudah dilihat
                                    dalam gambar. Mampu menghubungkan gambar benda dengan tulisan.
                                </p>
                            @endif
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>


        <div class="relative overflow-x-auto sm:rounded-lg mb-10">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <tr>
                    <td class="px-6 py-3 bg-gray-50 dark:bg-gray-800">Sakit</td>
                    <td class="px-6 py-3" align="center">{{ $absensis->sakit }}</td>
                </tr>
                <tr>
                    <td class="px-6 py-3 bg-gray-50 dark:bg-gray-800">Izin</td>
                    <td class="px-6 py-3" align="center">{{ $absensis->izin }}</td>
                </tr>
                <tr>
                    <td class="px-6 py-3 bg-gray-50 dark:bg-gray-800">Tanpa Keterangan</td>
                    <td class="px-6 py-3" align="center">{{ $absensis->alpha }}</td>
                </tr>
            </table>
        </div>

    </div>
@endsection
