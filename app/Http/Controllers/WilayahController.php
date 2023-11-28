<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WilayahController extends Controller
{
    public function index()
    {
        $basePath = storage_path('app/public/wilayah/'); // Ganti dengan path direktori tempat Anda menyimpan file CSV

        // Baca file provinces.csv
        $provincesData = $this->parseCsvData($basePath . 'provinces.csv');

        return response()->json($provincesData);
    }

    public function regencies($provinceId)
    {
        $basePath = storage_path('app/public/wilayah/');

        $regenciesData = $this->parseCsvData($basePath . 'regencies.csv');
        $regencies = $this->filterDataById($regenciesData, $provinceId);

        $wilayah = ['regency' => $regencies];
        // dd($wilayah);

        return response()->json($wilayah);
    }

    public function districts($districtId)
    {
        $basePath = storage_path('app/public/wilayah/');

        $districtsData = $this->parseCsvData($basePath . 'districts.csv');
        $districts = $this->filterDataById($districtsData, $districtId);

        $wilayah = ['district' => $districts];
        // dd($wilayah);

        return response()->json($wilayah);
    }

    public function villages($villageId)
    {
        $basePath = storage_path('app/public/wilayah/');

        $villagesData = $this->parseCsvData($basePath . 'villages.csv');
        $villages = $this->filterDataById($villagesData, $villageId);

        $wilayah = ['village' => $villages];
        // dd($wilayah);

        return response()->json($wilayah);
    }

    private function parseCsvData($filePath)
    {
        $data = [];
        if (($handle = fopen($filePath, 'r')) !== false) {
            while (($row = fgetcsv($handle, 1000, ',')) !== false) {
                $data[] = $row;
            }
            fclose($handle);
        }
        return $data;
    }

    private function filterDataById($data, $id)
    {
        return array_filter($data, function ($item) use ($id) {
            return $item[1] === $id;
        });
    }
}
