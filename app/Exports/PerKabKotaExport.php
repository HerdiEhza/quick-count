<?php

namespace App\Exports;

use App\Models\DataDapil;
use Illuminate\Support\Facades\Config;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use App\Exports\Sheets\SuaraPerKabupatenKotaSheet;

class PerKabKotaExport implements WithMultipleSheets
{
    use Exportable;

    protected $kabupatenKota;

    public function __construct(int $kabupatenKota)
    {
        $this->kabupatenKota = $kabupatenKota;
    }

    /**
     * @return array
     */
    public function sheets(): array
    {
        $dapilActive = Config::get('orchid_opinion.quick_count.dapil');

        $dapils = DataDapil::withOnly([
                                'kabupatenKota',
                                'kabupatenKota.wilayahKecamatans',
                            ])
                            ->findOrFail($dapilActive);
        $sheets = [];

        foreach ($dapils->kabupatenKota as $kabKotas) {
            foreach ($kabKotas->wilayahKecamatans as $kecamatan) {
                $sheets[] = new SuaraPerKabupatenKotaSheet($this->kabupatenKota, $kecamatan->id);
            }
        }

        return $sheets;
    }
}
