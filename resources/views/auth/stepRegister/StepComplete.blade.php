@extends('layouts.app')
@section('title', 'Kritik & Saran')
{{-- @include('layouts.navbarMobile') --}}
@section('content')
    <div class="p-4">
        @include('layouts.TimelineRegister')
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            @foreach ($pendaftaran as $item)
                <span class="font-medium">{{ $item->full_name }} Berhasil di-daftarkan.</span> Jika Ada perubahan hub Admin.
                <a href="#" class="font-semibold underline hover:no-underline">Cek Data Siswa</a>
            @endforeach
        </div>
        <div id="accordion-collapse" data-accordion="collapse">
            <h2 id="accordion-collapse-heading-1">
                <button type="button"
                    class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                    data-accordion-target="#accordion-collapse-body-1" aria-expanded="true"
                    aria-controls="accordion-collapse-body-1">
                    <span>Visi</span>
                    <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
                <div class="p-5 font-light border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                    <p class="mb-2 text-gray-500 dark:text-gray-400">Membentuk generasi yang Berimtaq, Cerdas, Keratif,
                        Mandiri, dan Berwawasan luas.</p>

                </div>
            </div>
            <h2 id="accordion-collapse-heading-2">
                <button type="button"
                    class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                    data-accordion-target="#accordion-collapse-body-2" aria-expanded="false"
                    aria-controls="accordion-collapse-body-2">
                    <span>Misi</span>
                    <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
                <div class="p-5 font-light border border-b-0 border-gray-200 dark:border-gray-700">
                    <ol class="pl-2 mt-2 space-y-1 list-decimal list-inside">
                        <li>Meningkatkan keimanan dan ketaqwaan kepada Tuhan Yang Maha Esa</li>
                        <li>Memberikan Ilmu yang bermanfaat bagi perkembangan anak dengan metode mendidik yang variatif,
                            mudah dan menyenangkan</li>
                        <li>Mendidik anak menjadi yang terampil</li>
                        <li>Menanamkan disiplin dan kemandirian</li>
                        <li>Mengembangkan kemampuan anak melalui pengenalan ilmu pengetahuan dan seni</li>
                        <li>Memberikan kesadaran dan kepedulian anak terhadap lingkungan dan keadaan social Masyarakat</li>
                    </ol>
                </div>
            </div>
            <h2 id="accordion-collapse-heading-3">
                <button type="button"
                    class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                    data-accordion-target="#accordion-collapse-body-3" aria-expanded="false"
                    aria-controls="accordion-collapse-body-3">
                    <span>Tujuan</span>
                    <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-3" class="hidden" aria-labelledby="accordion-collapse-heading-3">
                <div class="p-5 font-light border border-t-0 border-gray-200 dark:border-gray-700">
                    <ol class="pl-2 mt-2 space-y-1 list-decimal list-inside">
                        <li>Memiliki rasa keimanan dan ketaqwaan terhadap Tuhan Yang Maha Esa</li>
                        <li>Terbiasa hidup rukun, damai, harmonis dan toleransi</li>
                        <li>Memiliki sikap kedisiplinan yang tinggi</li>
                        <li>Memiliki kreatifitas yang tinggi melalui pengembangan bakat dan minat peserta didik</li>
                        <li>Terciptanya lingkungan sekolah yang aman, nyaman, rapi dan bersih</li>
                        <li>Memiliki wawasan yang luas melalui pengembangan ilmu pengetahuan teknologi dan seni sehingga
                            siap memasuki pendidikan lebih lanjut.</li>
                    </ol>
                </div>
            </div>
        </div>
        <button type="button"
            class="w-full mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Cek
            Data</button>
    </div>
@endsection
