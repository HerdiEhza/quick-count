<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\DataDapil;
use App\Models\DataPartai;
use Livewire\Attributes\On;
use App\Models\DataBakalCalon;
use Illuminate\Contracts\Database\Eloquent\Builder;

class DetailTiga extends Component
{
    public $caleg;
    public $detail_2;
    public $detail_3;

    public function render()
    {
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

        $dapils = DataDapil::where('id', $dataBacaleg->dataDapil->id)
            ->with([
                'kelurahanDesa' => function (Builder $q) {
                    $q->with([
                            'perolehanSuara' => function (Builder $q) {
                                $q->withOnly([
                                    'perolehanSuaraBacalegs' => function (Builder $query) {
                                        $query->withSum('perolehanSuaraBacalegs as total_suara_bacaleg', 'suara');
                                    },
                                ]);
                            },
                        ])
                        ->withCount('allDataTps as total_tps');
                },
            ])
            ->withSum('kelurahanDesa as total_dpt', 'jumlah_dpt')
            ->firstOrFail();

        return view('livewire.detail-tiga', [
            'dataBacaleg' => $dataBacaleg,
            'partais' => $partais,
            'dapils' => $dapils,
        ]);
    }
}
