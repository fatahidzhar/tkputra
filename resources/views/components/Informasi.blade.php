@extends('layouts.app')
@section('title', 'Layanan')
@section('content')
    {{-- @include('layouts.navbarMobile') --}}

    <div class="p-4">
        <a href="" onclick="event.preventDefault(); window.location.href='{{ url('layanan') }}'">
            <h2 class="text-3xl font-extrabold dark:text-white"><i class="bi bi-arrow-left-short mr-1"></i></h2>
        </a>
    </div>

    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent"
            role="tablist">
            <li class="mr-2" role="presentation">
                <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg" id="profile-tab"
                    data-tabs-target="#profile" type="button" role="tab" aria-controls="profile"
                    aria-selected="false">Info Sekolah</button>
            </li>
            <li class="mr-2" role="presentation">
                <button
                    class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                    id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard"
                    aria-selected="false">Info Kelas</button>
            </li>

        </ul>
    </div>
    <div id="myTabContent">
        <div class="hidden" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            @foreach ($informasi as $item)
                <ol class="relative border-l border-gray-200 dark:border-gray-700">
                    <li class="ml-5">
                        <time
                            class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">{{ \Carbon\Carbon::parse($item->created_at)->format('d-F Y') }}</time>
                        <a href="{{ url('layanan/informasi/' . $item->id) }}">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white truncate mr-4">
                                {{ $item->title }}
                            </h3>
                            <p class="mb-4 mr-4 text-base font-normal text-gray-500 dark:text-gray-400">
                                {{ strlen(strip_tags($item->text)) > 100 ? substr(strip_tags($item->text), 0, 100) . '...' : strip_tags($item->text) }}
                            </p>
                        </a>
                    </li>
                </ol>
            @endforeach
        </div>
        <div class="hidden " id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
            @foreach ($informasi_class as $item)
                <ol class="relative border-l border-gray-200 dark:border-gray-700">
                    <li class="ml-5">
                        <time
                            class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">{{ \Carbon\Carbon::parse($item->created_at)->format('d-F Y') }}</time>
                        <a href="{{ url('layanan/informasi/' . $item->id) }}">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white truncate mr-4">
                                {{ $item->title }}
                            </h3>
                            <p class="mb-4 mr-4 text-base font-normal text-gray-500 dark:text-gray-400">
                                {{ strlen(strip_tags($item->text)) > 100 ? substr(strip_tags($item->text), 0, 100) . '...' : strip_tags($item->text) }}
                            </p>
                        </a>
                    </li>
                </ol>
            @endforeach
        </div>
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="settings" role="tabpanel"
            aria-labelledby="settings-tab">
        </div>
    </div>

@endsection
