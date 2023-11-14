<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\DataDapil;
use App\Models\DataPartai;
use Livewire\Attributes\On;
use App\Models\DataBakalCalon;
use Illuminate\Contracts\Database\Eloquent\Builder;

class DetailDua extends Component
{
    public $caleg;
    public $detail_2;

    public function render()
    {
        $dapilActive = DataBakalCalon::where('id', $this->caleg)->select('data_dapil_id')->firstOrFail();
        $calegActive = $this->caleg;

        $dataBacaleg = DataBakalCalon::where('id', $this->caleg)
            ->select(['id','nama_bakal_calon','data_partai_id','data_dapil_id','kategori_pemilu_id','foto_path'])
            ->withOnly([
                'dataDapil:id,kategori_dapil,nama_dapil,jumlah_kursi',
                'dataPartai' => function (Builder $query) {
                    $query->withSum('perolehanSuaraPartais as total_suara_partai', 'suara');
                },
            ])
            ->firstOrFail();

        $partais = DataPartai::where('id', $dataBacaleg->dataPartai->id)
            ->select(['id','nama_partai','logo_partai','nomor_urut'])
            ->withOnly([
                'dataBakalCalons' => function (Builder $query) use ($dataBacaleg) {
                    $query->where('data_dapil_id', $dataBacaleg->dataDapil->id)->withSum('perolehanSuaraBacalegs as total_suara_bacaleg', 'suara');
                },
            ])
            ->firstOrFail();

        // $dapils = DataDapil::where('id', $dataBacaleg->dataDapil->id)
        //     ->with([
        //         'kecamatan' => function (Builder $q) {
        //             $q->where('wilayah_kabupaten_kota_id', $this->detail_2)
        //                 ->with([
        //                     'perolehanSuara' => function (Builder $q) {
        //                         $q->withOnly([
        //                             'perolehanSuaraBacalegs' => function (Builder $query) {
        //                                 $query->withSum('perolehanSuaraBacalegs as total_suara_bacaleg', 'suara');
        //                             },
        //                         ]);
        //                     },
        //                 ])
        //                 ->withCount('allDataTps as total_tps');
        //         },
        //     ])
        //     ->withSum('kecamatan as total_dpt', 'jumlah_dpt')
        //     ->firstOrFail();

        if ($dapilActive->data_dapil_id <= 10) {
            $dapils = DataDapil::where('id', $dataBacaleg->dataDapil->id)
                ->with([
                    'kecamatan' => function (Builder $q) use ($calegActive) {
                        $q->where('wilayah_kabupaten_kota_id', $this->detail_2)
                        ->withSum([
                            'perolehanSuaraCaleg as suara_caleg' => function ($query) use ($calegActive) { 
                                $query->where('data_bakal_calon_id', $calegActive);
                            }], 'suara'
                        )
                        ->withCount('allDataTps as total_tps');
                    },
                ])
                ->withSum('kecamatan as total_dpt', 'jumlah_dpt')
                ->firstOrFail();
        } else {
            $dapils = DataDapil::where('id', $dataBacaleg->dataDapil->id)
                ->with([
                    'kelurahanDesa' => function (Builder $q) use ($calegActive) {
                        $q->where('wilayah_kecamatan_id', $this->detail_2)
                        ->withSum([
                            'perolehanSuaraCaleg as suara_caleg' => function ($query) use ($calegActive) { 
                                $query->where('data_bakal_calon_id', $calegActive);
                            }], 'suara'
                        )
                        ->withCount('allDataTps as total_tps');
                    },
                ])
                ->withSum('kelurahanDesa as total_dpt', 'jumlah_dpt')
                ->firstOrFail();
        }

        return view('livewire.detail-dua', [
            'dapilActive' => $dapilActive,
            'dataBacaleg' => $dataBacaleg,
            'partais' => $partais,
            'dapils' => $dapils,
        ]);
    }
}
