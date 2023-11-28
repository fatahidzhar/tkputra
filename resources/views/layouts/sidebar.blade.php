<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidebar">
    <div class="flex justify-center">
        <a href="" class="mt-5 flex justify-end">
            <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">TK Putra
                IX</span>
        </a>
    </div>
    <div class="h-full px-3 pb-4 pt-10  overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2">
            @if (Auth::user()->role == 'yayasan')
                <li>
                    <a href="{{ url('yayasan') }}"
                        onclick="event.preventDefault(); window.location.href='{{ url('yayasan') }}'"
                        class="{{ Request::is('yayasan') ? 'bg-gray-200' : '' }} flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="bi bi-grid-fill text-lg ml-1 text-gray-500"></i>
                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('datakepsek') }}"
                        onclick="event.preventDefault(); window.location.href='{{ url('datakepsek') }}'"
                        class="{{ Request::is('datakepsek') ? 'bg-gray-200' : '' }} flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="bi bi-person-video text-lg ml-1 text-gray-500"></i>
                        <span class="ml-3">Kepala Sekolah</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('dataguru') }}"
                        onclick="event.preventDefault(); window.location.href='{{ url('dataguru') }}'"
                        class="{{ Request::is('dataguru') ? 'bg-gray-200' : '' }} flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="bi bi-person-video3 text-lg ml-1 text-gray-500"></i>
                        <span class="ml-3">Data Guru</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('dataoperator') }}"
                        onclick="event.preventDefault(); window.location.href='{{ url('dataoperator') }}'"
                        class="{{ Request::is('dataoperator') ? 'bg-gray-200' : '' }} flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="bi bi-person-workspace text-lg ml-1 text-gray-500"></i>
                        <span class="ml-3">Data Operator</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('datamurid') }}"
                        onclick="event.preventDefault(); window.location.href='{{ url('datamurid') }}'"
                        class="{{ Request::is('datamurid') ? 'bg-gray-200' : '' }} flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="bi bi-person-heart text-lg ml-1 text-gray-500"></i>
                        <span class="ml-3">Data Murid</span>
                    </a>
                </li>
            @elseif(Auth::user()->role == 'kepsek')
                <li>
                    <a href="{{ url('kepsek') }}"
                        onclick="event.preventDefault(); window.location.href='{{ url('kepsek') }}'"
                        class="{{ Request::is('kepsek') ? 'bg-gray-200' : '' }} flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="bi bi-grid-fill text-lg ml-1 text-gray-500"></i>
                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('dataguru') }}"
                        onclick="event.preventDefault(); window.location.href='{{ url('dataguru') }}'"
                        class="{{ Request::is('dataguru') ? 'bg-gray-200' : '' }} flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="bi bi-person-video3 text-lg ml-1 text-gray-500"></i>
                        <span class="ml-3">Data Guru</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('datamurid') }}"
                        onclick="event.preventDefault(); window.location.href='{{ url('datamurid') }}'"
                        class="{{ Request::is('datamurid') ? 'bg-gray-200' : '' }} flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="bi bi-person-heart text-lg ml-1 text-gray-500"></i>
                        <span class="ml-3">Data Murid</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('kelas') }}"
                        onclick="event.preventDefault(); window.location.href='{{ url('kelas') }}'"
                        class="{{ Request::is('kelas') ? 'bg-gray-200' : '' }} flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="bi bi-grid-1x2-fill text-lg ml-1 text-gray-500"></i>
                        <span class="flex-1 ml-3 whitespace-nowrap">Kelas</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('kritiksaran') }}"
                        onclick="event.preventDefault(); window.location.href='{{ url('kritiksaran') }}'"
                        class="{{ Request::is('kritiksaran') ? 'bg-gray-200' : '' }} flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="bi bi-envelope-paper-fill text-lg ml-1 text-gray-500"></i>
                        <span class="flex-1 ml-3 whitespace-nowrap">Kritik & Saran</span>
                        <span
                            class="inline-flex items-center justify-center w-3 h-3 p-3 ml-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">{{ $kritiksaran }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('pengaduan') }}"
                        onclick="event.preventDefault(); window.location.href='{{ url('pengaduan') }}'"
                        class="{{ Request::is('pengaduan') ? 'bg-gray-200' : '' }} flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="bi bi-send-exclamation-fill text-lg ml-1 text-gray-500"></i>
                        <span class="flex-1 ml-3 whitespace-nowrap">Pengaduan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('informasi') }}"
                        onclick="event.preventDefault(); window.location.href='{{ url('informasi') }}'"
                        class="{{ Request::is('informasi') ? 'bg-gray-200' : '' }} flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="bi bi-bell-fill text-lg ml-1 text-gray-500"></i>
                        <span class="flex-1 ml-3 whitespace-nowrap">Informasi</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('categori') }}"
                        onclick="event.preventDefault(); window.location.href='{{ url('catagori') }}'"
                        class="{{ Request::is('categori') ? 'bg-gray-200' : '' }} flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="bi bi-bookmark-fill text-lg ml-1 text-gray-500"></i>
                        <span class="flex-1 ml-3 whitespace-nowrap">Categori</span>
                    </a>
                </li>
            @elseif(Auth::user()->role == 'guru')
                <li>
                    <a href="{{ url('guru') }}"
                        onclick="event.preventDefault(); window.location.href='{{ url('guru') }}'"
                        class="{{ Request::is('guru') ? 'bg-gray-200' : '' }} flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="bi bi-grid-fill text-lg ml-1 text-gray-500"></i>
                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('datamurid') }}"
                        onclick="event.preventDefault(); window.location.href='{{ url('datamurid') }}'"
                        class="{{ Request::is('datamurid') ? 'bg-gray-200' : '' }} flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="bi bi-person-heart text-lg ml-1 text-gray-500"></i>
                        <span class="ml-3">Data Murid</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('informasi') }}"
                        onclick="event.preventDefault(); window.location.href='{{ url('informasi') }}'"
                        class="{{ Request::is('informasi') ? 'bg-gray-200' : '' }} flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="bi bi-bell-fill text-lg ml-1 text-gray-500"></i>
                        <span class="flex-1 ml-3 whitespace-nowrap">Informasi</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</aside>
