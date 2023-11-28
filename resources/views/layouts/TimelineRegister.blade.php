<ol class="flex items-center w-full mb-4 sm:mb-5">
    <li
        class="{{ Request::is('register/step1') ? "flex w-full items-center text-blue-600 dark:text-blue-500 after:content-[''] after:w-full after:h-1 after:border-b after:border-blue-100 after:border-4 after:inline-block dark:after:border-blue-800" : '' }} flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-100 after:border-4 after:inline-block dark:after:border-gray-700">
        <div
            class="{{ Request::is('register/step1') ? 'flex items-center justify-center w-10 h-10 bg-blue-100 rounded-full lg:h-12 lg:w-12 dark:bg-blue-700 shrink-0' : '' }} flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0">
            <svg aria-hidden="true"
                class="{{ Request::is('register/step1') ? 'w-5 h-5 text-blue-500 lg:w-6 lg:h-6 dark:text-blue-100' : '' }} w-5 h-5 text-gray-500 lg:w-6 lg:h-6 dark:text-gray-100"
                class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z"
                    clip-rule="evenodd"></path>
            </svg>
        </div>
    </li>
    @isset($siswa)
        @if ($siswa)
            <li
                class="{{ Request::is('register/step2/' . $siswa->uuid_m) ? "flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-blue-100 after:border-4 after:inline-block dark:after:border-blue-700" : '' }} flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-100 after:border-4 after:inline-block dark:after:border-gray-700">
                <div
                    class="{{ Request::is('register/step2/' . $siswa->uuid_m) ? 'flex items-center justify-center w-10 h-10 bg-blue-100 rounded-full lg:h-12 lg:w-12 dark:bg-blue-700 shrink-0' : '' }} flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0">
                    <i
                        class="bi bi-geo-alt-fill {{ Request::is('register/step2/' . $siswa->uuid_m) ? 'w-5 h-5 ml-1.5 text-blue-500 lg:w-6 lg:h-6 dark:text-blue-100' : '' }} w-5 h-5 ml-1.5 text-gray-500 lg:w-6 lg:h-6 dark:text-gray-100"></i>
                </div>
            </li>
            <li
                class="{{ Request::is('register/step3/' . $siswa->uuid_m) ? "flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-blue-100 after:border-4 after:inline-block dark:after:border-blue-700" : '' }} flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-100 after:border-4 after:inline-block dark:after:border-gray-700">
                <div
                    class="{{ Request::is('register/step3/' . $siswa->uuid_m) ? 'flex items-center justify-center w-10 h-10 bg-blue-100 rounded-full lg:h-12 lg:w-12 dark:bg-blue-700 shrink-0' : '' }} flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0">
                    <i
                        class="bi bi-people-fill {{ Request::is('register/step3/' . $siswa->uuid_m) ? 'w-5 h-5 ml-1.5 text-blue-500 lg:w-6 lg:h-6 dark:text-blue-100' : '' }} w-5 h-5 ml-1.5 text-gray-500 lg:w-6 lg:h-6 dark:text-gray-100"></i>
                </div>
            </li>
            <li
                class="{{ Request::is('register/step4/') ? "flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-blue-100 after:border-4 after:inline-block dark:after:border-blue-700" : '' }} flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-100 after:border-4 after:inline-block dark:after:border-gray-700">
                <div
                    class="{{ Request::is('register/step4/' . $siswa->uuid_m) ? 'flex items-center justify-center w-10 h-10 bg-blue-100 rounded-full lg:h-12 lg:w-12 dark:bg-blue-700 shrink-0' : '' }} flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0">
                    <i
                        class="bi bi-person-heart {{ Request::is('register/step4/' . $siswa->uuid_m) ? 'w-5 h-5 ml-1.5 text-blue-500 lg:w-6 lg:h-6 dark:text-blue-100' : '' }} w-5 h-5 ml-1.5 text-gray-500 lg:w-6 lg:h-6 dark:text-gray-100"></i>
                </div>
            </li>
            <li class="flex items-center">
                <div class="flex items-center">
                    <div
                        class="{{ Request::is('register/complete/' . $siswa->uuid_m) ? 'w-5 h-5 text-blue-500 lg:w-6 lg:h-6 dark:text-blue-100' : '' }} z-10 flex items-center justify-center w-6 h-6 bg-gray-200 rounded-full ring-0 ring-white dark:bg-gray-700 sm:ring-8 dark:ring-gray-900 shrink-0">
                        <span
                            class="{{ Request::is('register/complete/' . $siswa->uuid_m) ? 'w-5 h-5 bg-blue-500 text-blue-500 lg:w-6 lg:h-6 dark:text-blue-100' : '' }} flex w-3 h-3 bg-gray-500 rounded-full dark:bg-gray-300"></span>
                    </div>
                </div>
            </li>
        @endif
    @endisset
</ol>
