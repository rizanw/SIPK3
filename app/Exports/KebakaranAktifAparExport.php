<?php

namespace App\Exports;

use App\AlatKebakaranApar;
use App\KebakaranAktifApar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class KebakaranAktifAparExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return KebakaranAktifApar::all();
    }

    public function headings(): array
    {
        return [
            'Tanggal',
            'Kode APAR',
            'a. APAR berada tepat pada lokasi yang sudah ditentukan?',
            'b. APAR mudah dilihat dan dijangkau?',
            'c. Tekanan ukur pada kondisi yang siap untuk digunakan?',
            'd. Berat APAR pada kondisi berisi penuh?',
            'e. Kondisi selang dan nozzle dalam keadaan baik?',
            'f. Tempat peletakan APAR dan kondisi roda (jika terdapat roda) dalam keadaan baik?',
            'g. Petunjuk penggunaan dapat dibaca dengan jelas serta menghadap ke luar?',
            'h. Kunci pengaman dan segel penyongkel tidak rusak pada APAR?',
            'i. APAR dalam keadaan tidak ada kerusakan fisik, korosif, dan bocor?',
        ];
    }

    public function map($row): array
    {
        $fields = [
            $row->tanggal_inspeksi,
            AlatKebakaranApar::where('id', $row->id)->first()->kode,
            ($row->a == '1') ? "Ya" : "Tidak",
            ($row->b == '1') ? "Ya" : "Tidak",
            ($row->c == '1') ? "Ya" : "Tidak",
            ($row->d == '1') ? "Ya" : "Tidak",
            ($row->e == '1') ? "Ya" : "Tidak",
            ($row->f == '1') ? "Ya" : "Tidak",
            ($row->g == '1') ? "Ya" : "Tidak",
            ($row->h == '1') ? "Ya" : "Tidak",
            ($row->i == '1') ? "Ya" : "Tidak",
        ];

        return $fields;
    }
}
