<?php

namespace App\Exports;

use App\Ketidaksesuaian;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class KetidaksesuaianExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Ketidaksesuaian::all();
    }

    public function headings(): array
    {
        return [
            'Tanggal',
            'Temuan',
            'Kategori',
            'Lokasi',
            'Nilai Resiko Keparahan',
            'Nilai Resiko Kemungkinan',
            'Nilai Resiko',
            'PIC',
            'Pelapor',
            'Tindakan',
            'Status',
        ];
    }

    public function map($row): array
    {
        $fields = [
            $row->tanggal,
            $row->temuan,
            $row->kategori,
            $row->lokasi,
            $row->resiko_keparahan,
            $row->resiko_kemungkinan,
            (intval($row->resiko_keparahan) * intval($row->resiko_kemungkinan)),
            $row->pic,
            $row->pelapor,
            $row->tindakan,
            ($row->status == "1")? "Open" : "Close"
        ];

        return $fields;
    }
}
