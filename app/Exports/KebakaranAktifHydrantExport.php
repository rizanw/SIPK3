<?php

namespace App\Exports;

use App\AlatKebakaranHydrant;
use App\KebakaranAktifHydrant;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class KebakaranAktifHydrantExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return KebakaranAktifHydrant::all();
    }

    public function headings(): array
    {
        return [
            'Tanggal',
            'Kode APAR',
            'a. Kabinet tidak terhalang oleh benda sekitar?',
            'b. Kondisi kabinet tidak korosi atau rusak?',
            'c. Pintu kabinet mudah dibuka?',
            'd. Pintu kabinet dapat terbuka penuh?',
            'e. Pintu kabinet kaca terkunci?',
            'f. Kaca pada pintu tidak pecah atau retak?',
            'g. Semua perlengkapan isi kabinet mudah diakses?',
            'h. Terdapat kunci pas pilar hidran dan control valve yang sesuai?',
            'i. Pilar hidran mudah diakses?',
            'j. Pilar hidran dalam kondisi tidak korosi?',
            'k. Pilar hidran dalam kondisi tidak bocor?',
            'l. Serat dari benang pada slang tidak rusak?',
            'm. Tidak ada kebocoran pada slang?',
            'n. Control valve mudah diakses?',
            'o. Control valve dalam posisi normal (terbuka)?',
            'p. Tidak ada kebocoran pada control valve?',
            'q. Control valve dilengkapi dengan identifikasi yang berlaku?',
        ];
    }

    public function map($row): array
    {
        $fields = [
            $row->tanggal_inspeksi,
            AlatKebakaranHydrant::where('id', $row->id)->first()->kode,
            ($row->a == '1') ? "Ya" : "Tidak",
            ($row->b == '1') ? "Ya" : "Tidak",
            ($row->c == '1') ? "Ya" : "Tidak",
            ($row->d == '1') ? "Ya" : "Tidak",
            ($row->e == '1') ? "Ya" : "Tidak",
            ($row->f == '1') ? "Ya" : "Tidak",
            ($row->g == '1') ? "Ya" : "Tidak",
            ($row->h == '1') ? "Ya" : "Tidak",
            ($row->i == '1') ? "Ya" : "Tidak",
            ($row->j == '1') ? "Ya" : "Tidak",
            ($row->k == '1') ? "Ya" : "Tidak",
            ($row->l == '1') ? "Ya" : "Tidak",
            ($row->m == '1') ? "Ya" : "Tidak",
            ($row->n == '1') ? "Ya" : "Tidak",
            ($row->o == '1') ? "Ya" : "Tidak",
            ($row->p == '1') ? "Ya" : "Tidak",
            ($row->q == '1') ? "Ya" : "Tidak",
        ];

        return $fields;
    }
}
