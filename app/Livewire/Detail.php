<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\DataDapil;
use App\Models\DataPartai;
use Livewire\Attributes\On;
use App\Models\DataBakalCalon;
use Illuminate\Contracts\Database\Eloquent\Builder;

class Detail extends Component
{
    public $caleg;

    // public function mount($caleg)
    // {
    //     $this->caleg = $caleg;
    // }

    // public function getListeners()
    // {
    //     return [
    //         "refreshComponent" => '$refresh',
    //     ];
    // }

    // #[On('suara-inputed')]
    // public function refreshDashboard()
    // {
    //     $this->dispatch('refreshComponent');
    // }

    // public function updatedKabKotaActive()
    // {
    //     $this->dispatch('refreshComponent');
    // }

    public function render()
    {
        // $getDapil = DataDapil::where('id', config('orchid-opinion.bacaleg.dapil_id'));
        // $dapils = $getDapil->with([
        //     'kabupatenKota' => function (Builder $q) {
        //         $q->with([
        //                 'perolehanSuaraBacaleg' => function (Builder $q) {
        //                     $q->where('data_bakal_calon_id', config('orchid-opinion.bacaleg.bacaleg_id'))
        //                         ->select('tps_id', 'data_bakal_calon_id', DB::raw('SUM(jumlah_suara) as jumlah_suara_bacaleg'))
        //                         ->groupByRaw('tps_id, data_bakal_calon_id')
        //                         ->first();
        //                         // ->orderBy('perolehan_suara_sum_jumlah_suara', 'desc');
        //                 },
        //             ]);
        //             // ->withSum('perolehanSuaraBacaleg', 'jumlah_suara');
        //             // ->where('data_bakal_calon_id', $dataBacaleg->id)
        //             // ->orderBy('perolehan_suara_sum_jumlah_suara', 'desc');
        //     },
        // ])->first();

        // ============================================================================================================== //

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
                'kabupatenKota' => function (Builder $q) {
                    $q->with([
                        'perolehanSuara' => function (Builder $q) {
                            $q->withSum('perolehanSuaraBacalegs as total_suara_bacaleg', 'suara');
                            // $q->withOnly([
                            //     'perolehanSuaraBacalegs' => function (Builder $query) {
                            //         $query->withSum('perolehanSuaraBacalegs as total_suara_bacaleg', 'suara');
                            //     },
                            // ]);
                        },
                    ])
                    ->withCount('allDataTps as total_tps');
                },
            ])
            ->withSum('kabupatenKota as total_dpt', 'jumlah_dpt')
            ->firstOrFail();

        return view('livewire.detail', [
            'dataBacaleg' => $dataBacaleg,
            'partais' => $partais,
            'dapils' => $dapils,
        ]);
    }
}
