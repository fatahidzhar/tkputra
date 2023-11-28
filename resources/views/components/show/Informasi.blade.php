@extends('layouts.app')
@section('title', 'Layanan')
@section('content')
    <div class="p-4">
        <a href="" onclick="event.preventDefault(); window.location.href='{{ url('layanan/informasi') }}'">
            <h2 class="text-3xl font-extrabold dark:text-white"><i class="bi bi-arrow-left-short mr-1"></i></h2>
        </a>
    </div>

    <div class="px-5 pb-10">
        <time
            class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">{{ \Carbon\Carbon::parse($informasi->created_at)->format('d-F Y') }}</time>
        <h2 class="text-2xl font-extrabold dark:text-white">{{ $informasi->title }}</h2>

        <p class="mb-3 mt-4 text-gray-500 dark:text-gray-400">
            {!! $informasi->text !!}
        </p>
    </div>
@endsection
