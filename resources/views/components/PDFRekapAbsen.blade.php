@extends('layouts.app')
<style>
    table,
    th,
    td {
        border: 1px solid rgb(160, 160, 160);
        border-collapse: collapse;
    }
</style>

<body>

    @if ($start_date && $end_date)
        <p>Data Rekap Absen dari {{ date('Y-m-d', strtotime($start_date)) }} sampai
            {{ date('Y-m-d', strtotime($end_date)) }}</p>
    @endif

    Guru : {{ Auth::user()->full_name }}

    @php
        $previousClassName = null;
    @endphp

    @foreach ($murid as $item)
        @if ($item->name_class != $previousClassName)
            <div style="margin-bottom: 10px">
                Kelas : {{ $item->name_class }}
            </div>
            @php
                $previousClassName = $item->name_class;
            @endphp
        @endif
    @endforeach

    <table id="example1" class="table table-bordered table-striped" style="width:100%">
        <thead>
            <tr>
                <th scope="col">
                    No
                </th>
                <th scope="col">
                    Nama
                </th>
                <th scope="col">
                    Hadir
                </th>
                <th scope="col">
                    Izin
                </th>
                <th scope="col">
                    Sakit
                </th>
                <th scope="col">
                    Alpha
                </th>
                <th scope="col">
                    Tanggal
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($murid as $item)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row"
                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                        {{ $loop->iteration }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $item->full_name }}
                    </td>
                    <td align="center" class="px-9 py-4 text">
                        @if ($item->kehadiran == 1)
                            H
                        @endif
                    </td>
                    <td align="center" class="px-7 py-4 text">
                        @if ($item->kehadiran == 2)
                            I
                        @endif
                    </td>
                    <td align="center" class="px-9 py-4 text">
                        @if ($item->kehadiran == 3)
                            S
                        @endif
                    </td>
                    <td align="center" class="px-9 py-4 text">
                        @if ($item->kehadiran == 4)
                            A
                        @endif
                    </td>
                    <td align="center" class="px-9 py-4 text-center">
                        {{-- {{ date('Y-M-d', strtotime($item->created_at)) }} --}}
                        {{ $item->tanggal }}
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

    <table id="example1" class="table table-bordered table-striped" style="width:100%; margin-top:20px;">
        <thead>
            <tr>
                <th scope="col">
                    No
                </th>
                <th scope="col">
                    Nama
                </th>
                <th scope="col">
                    Total Hadir
                </th>
                <th scope="col">
                    Total Izin
                </th>
                <th scope="col">
                    Total Sakit
                </th>
                <th scope="col">
                    Total Alpha
                </th>
             
            </tr>
        </thead>
        <tbody>
            @foreach ($absensis as $item)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row"
                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                        {{ $loop->iteration }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $item->full_name }}
                    </td>
                    <td align="center" class="px-9 py-4 text">
                        {{ $item->total_hadir }}
      
                    </td>
                    <td align="center" class="px-7 py-4 text">
                        {{ $item->total_izin }}
              
                    </td>
                    <td align="center" class="px-9 py-4 text">
                        {{ $item->total_sakit }}
                  
                    </td>
                    <td align="center" class="px-9 py-4 text">
                        {{ $item->total_alpha }}
                   
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
</body>
