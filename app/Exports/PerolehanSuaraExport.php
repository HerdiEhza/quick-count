<?php

namespace App\Exports;

use App\Models\DataDapil;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Config;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class PerolehanSuaraExport implements FromView, WithHeadings, WithDrawings
{
    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('/assets/favicon/android-chrome-512x512.png'));
        $drawing->setHeight(90);
        $drawing->setCoordinates('B3');

        return $drawing;
    }

    public function headings(): array
    {
        return [
            '#',
            'User',
            'Date',
        ];
    }

    public function view(): View
    {
        $dapilActive = Config::get('orchid_opinion.quick_count.dapil');
        $calegActive = Config::get('orchid_opinion.quick_count.bacaleg');

        $dapils = DataDapil::withOnly([
                                'kabupatenKota',
                                'kabupatenKota.wilayahKecamatans',
                                'kabupatenKota.wilayahKecamatans.wilayahKelurahanDesas',
                                'kabupatenKota.wilayahKecamatans.wilayahKelurahanDesas.allDataTps',
                                'kabupatenKota.wilayahKecamatans.wilayahKelurahanDesas.allDataTps.perolehanSuaras' => function (Builder $query) use ($calegActive) {
                                    $query->select(['id', 'suara_sah', 'suara_tidak_sah', 'jumlah_dpt', 'data_tps_id'])
                                            ->with([
                                                'perolehanSuaraBacalegs' => function (Builder $query) use ($calegActive) {
                                                    $query->where('data_bakal_calon_id', $calegActive);
                                                },
                                            ]);
                                },
                            ])
                            ->findOrFail($dapilActive);

        return view('exports.perolehan-suara', [
            'dapils' => $dapils,
        ]);
    }
}
