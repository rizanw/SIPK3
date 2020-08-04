<?php

namespace App\Exports;

use App\Kecelakaan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class KecelakaanExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Kecelakaan::all();
    }

    public function headings(): array
    {
        return [
            'Tanggal',
            'Waktu',
            'Kejadian',
            'Lokasi',
            'Atasan Langsung Korban',
            'Saksi',
            'Kerugian yg Diakibatkan',
            'Jumlah Korban',
            'Kronologi',
            'Nilai Resiko Keparahan',
            'Nilai Resiko Kemungkinan',
            'Nilai Resiko',
            'Tindakan',
            'Penanggung Jawab',
            'Status',
        ];
    }


    public function map($row): array
    {
        $fields = [
            $row->tanggal,
            $row->waktu,
            $row->kejadian,
            $row->lokasi,
            $row->atasan_langsung_korban,
            $row->saksi,
            $row->akibat,
            $row->jumlah_korban,
            $row->kronologi,
            $row->resiko_keparahan,
            $row->resiko_kemungkinan,
            ($row->resiko_kemungkinan * $row->resiko_keparahan),
            $row->tindakan,
            $row->penanggung_jawab,
            ($row->status == "1") ? "Open" : "Close"
        ];

        return $fields;
    }
}
