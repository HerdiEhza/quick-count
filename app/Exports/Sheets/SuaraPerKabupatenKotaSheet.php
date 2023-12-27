<?php

namespace App\Exports\Sheets;

use App\Models\DataDapil;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Config;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;

class SuaraPerKabupatenKotaSheet implements FromQuery, WithTitle
{
    private $kecamatan;
    private $kabKota;

    public function __construct(int $kabKota, int $kecamatan)
    {
        $this->kecamatan = $kecamatan;
        $this->kabKota = $kabKota;
    }

    /**
     * @return Builder
     */
    public function query()
    {
        $dapilActive = Config::get('orchid_opinion.quick_count.dapil');
        $calegActive = Config::get('orchid_opinion.quick_count.bacaleg');

        return DataDapil::withOnly([
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
        ->whereRelation('kabupatenKota', 'id', $this->kabKota)
        ->whereRelation('kabupatenKota.wilayahKecamatans', 'id', $this->kecamatan)
        ->findOrFail($dapilActive);
        // ::query()
        // ->whereYear('created_at', $this->year)
        // ->whereKecamatan('created_at', $this->kecamatan);
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Kecamatan: ' . $this->kecamatan;
    }
}
