<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\DataDapil;
use App\Models\DataPartai;
use Livewire\Attributes\On;
use App\Models\DataBakalCalon;
use App\Models\DataTps;
use Illuminate\Contracts\Database\Eloquent\Builder;

class DetailEmpat extends Component
{
    public $caleg;
    public $detail_2;
    public $detail_3;
    public $detail_4;

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
        //         'kelurahanDesa' => function (Builder $q) {
        //             $q->where('wilayah_kecamatan_id', $this->detail_3)
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
        //     ->withSum('kelurahanDesa as total_dpt', 'jumlah_dpt')
        //     ->firstOrFail();

        $tps = DataTps::whereIn('wilayah_kelurahan_desa_id', [$this->detail_4])
            ->withSum([
                'perolehanSuaraCaleg as suara_caleg' => function ($query) use ($calegActive) { 
                    $query->where('data_bakal_calon_id', $calegActive);
                }], 'suara'
            )
            ->get();

        return view('livewire.detail-empat', [
            'dataBacaleg' => $dataBacaleg,
            'partais' => $partais,
            // 'dapils' => $dapils,
            'tps' => $tps,
        ]);
    }
}
