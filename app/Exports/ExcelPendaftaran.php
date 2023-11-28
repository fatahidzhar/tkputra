<?php

namespace App\Exports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use App\Models\User;

class ExcelPendaftaran implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    public function collection()
    {
        return Siswa::leftJoin('users', 'siswas.uuid_m', 'users.uuid')
        ->where('siswas.status', 0)
        ->get();
    }

    public function headings(): array
    {
        return [
            [
                'No',
                'Nama',
                'JK',
                'NISN',
                'Tempat Lahir',
                'Tahun Lahir',
                'NIK',
                'Agama',
                'Alamat',
                'RT',
                'RW',
                'Kelurahan',
                'Kecamatan',
                'Data Ayah',
                '',
                '',
                '',
                // '',
                'Data Ibu',
                '',
                '',
                '',
                // '',
                'Robel Saat Ini',
                'Anak ke-berapa',
                'Berat Badan',
                'Tinggi Badan',
                'Lingkar Kepala',
                'Jml. Saudara Kandung',
            ], [
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                'Nama',
                'Tahun Lahir',
                'Jenjang Pendidikan',
                'Pekerjaan',
                'Nama',
                'Tahun Lahir',
                'Jenjang Pendidikan',
                'Pekerjaan',
            ]
        ];
    }

    public function map($siswa): array
    {
        static $rowNumber = 1;

        $gender = '';
        if ($siswa->gender == 'Laki-laki') {
            $gender = 'L';
        } elseif ($siswa->gender == 'Perempuan') {
            $gender = 'P';
        }

        return [
            $rowNumber++,
            $siswa->full_name,
            $gender,
            $siswa->nisn,
            $siswa->tempat_lahir,
            $siswa->tempat_lahir,
            $siswa->nik,
            $siswa->agama,
            $siswa->tempat_tinggal,
            $siswa->rt,
            $siswa->rw,
            $siswa->Kelurahan,
            $siswa->kecamatan,
            $siswa->f_parent_name,
            $siswa->f_parent_birth,
            $siswa->f_parent_edu,
            $siswa->f_parent_work,
            $siswa->m_parent_name,
            $siswa->m_parent_birth,
            $siswa->m_parent_edu,
            $siswa->m_parent_work,
            $siswa->id,
            $siswa->anak_ke,
            $siswa->bb,
            $siswa->tb,
            $siswa->lk,
            $siswa->j_saudara_k,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:AA1')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A1:AA1')->getAlignment()->setVertical('center');

        $sheet->getStyle('A')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A')->getAlignment()->setVertical('center');

        $sheet->mergeCells('A1:A2'); //id 
        $sheet->mergeCells('B1:B2'); //nama
        $sheet->mergeCells('C1:C2'); //jk
        $sheet->mergeCells('D1:D2'); //nisn
        $sheet->mergeCells('E1:E2'); //tempat_lahir
        $sheet->mergeCells('F1:F2'); //tanggal_lahir
        $sheet->mergeCells('G1:G2'); //nik
        $sheet->mergeCells('H1:H2'); //agama
        $sheet->mergeCells('I1:I2'); //tempat_tinggal
        $sheet->mergeCells('J1:J2'); //rt
        $sheet->mergeCells('K1:K2'); //rw
        $sheet->mergeCells('L1:L2'); //kelurahan
        $sheet->mergeCells('M1:M2'); //kecamatan
        $sheet->mergeCells('V1:V2'); //robel
        $sheet->mergeCells('W1:W2'); //Anak ke
        $sheet->mergeCells('X1:X2'); //bb
        $sheet->mergeCells('Y1:Y2'); //tb
        $sheet->mergeCells('Z1:Z2'); //lk
        $sheet->mergeCells('AA1:AA2'); //jmlsaudara

        $sheet->mergeCells('N1:Q1'); //data ayah
        $sheet->mergeCells('R1:U1'); //data ibu

        $lastColumn = $sheet->getHighestColumn();
        $lastRow = $sheet->getHighestRow();

        $sheet->getStyle('A1:' . $lastColumn . '1')->applyFromArray([
            'font' => [
                'bold' => true,
            ],
        ]);

        $sheet->getStyle('A1:' . $lastColumn . $lastRow)->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],

            'padding' => [
                'top' => 5,
                'right' => 5,
                'bottom' => 5,
                'left' => 5,
            ],
        ]);
    }
}
