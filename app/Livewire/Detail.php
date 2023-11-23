<?php

namespace App\Livewire;

use App\Models\DataBakalCalon;
use App\Models\DataDapil;
use App\Models\DataPartai;
use App\Models\PerolehanSuaraBacaleg;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Livewire\Attributes\On;
use Livewire\Component;

class Detail extends Component
{
    public $caleg;

    public function mount($caleg)
    {
        $this->caleg = $caleg;
    }

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
        $dapilActive = DataBakalCalon::where('id', $this->caleg)->select('data_dapil_id')->firstOrFail();
        $calegActive = $this->caleg;

        // dd($dapilActive);
        $dataBacaleg = DataBakalCalon::where('id', $this->caleg)
            ->select(['id', 'nama_bakal_calon', 'data_partai_id', 'data_dapil_id', 'kategori_pemilu_id', 'foto_path'])
            ->withOnly([
                'dataDapil:id,kategori_dapil,nama_dapil,jumlah_kursi',
                'dataPartai' => function (Builder $query) use ($dapilActive) {
                    $query->withSum(
                        [
                            'perolehanSuaraPartais as total_suara_partai' => function ($query) use ($dapilActive) {
                                $query->whereRelation('perolehanSuara.dataDapil', 'data_dapil_id', $dapilActive->data_dapil_id);
                            }],
                        'suara'
                    );
                    // ->withSum('perolehanSuaraPartais as total_suara_partai', 'suara');
                },
            ])
            ->firstOrFail();

        $partais = DataPartai::where('id', $dataBacaleg->dataPartai->id)
            ->select(['id', 'nama_partai', 'logo_partai', 'nomor_urut'])
            ->withOnly([
                'dataBakalCalons' => function (Builder $query) use ($dataBacaleg) {
                    $query->where('data_dapil_id', $dataBacaleg->dataDapil->id)
                        ->withSum('perolehanSuaraBacalegs as total_suara_bacaleg', 'suara')
                        ->orderByDesc('total_suara_bacaleg');
                },
            ])
            ->firstOrFail();

        if ($dapilActive->data_dapil_id <= 10) {
            $dapils = DataDapil::where('id', $dataBacaleg->dataDapil->id)
                ->with([
                    'kabupatenKota' => function (Builder $q) use ($calegActive) {
                        $q->withSum(
                            [
                                'perolehanSuaraCaleg as suara_caleg' => function ($query) use ($calegActive) {
                                    $query->where('data_bakal_calon_id', $calegActive);
                                }],
                            'suara'
                        )
                            ->withCount('allDataTps as total_tps');
                    },
                ])
                ->withSum('kabupatenKota as total_dpt', 'jumlah_dpt')
                ->firstOrFail();
        } else {
            $dapils = DataDapil::where('id', $dataBacaleg->dataDapil->id)
                ->with([
                    'kecamatan' => function (Builder $q) use ($calegActive) {
                        $q->withSum(
                            [
                                'perolehanSuaraCaleg as suara_caleg' => function ($query) use ($calegActive) {
                                    $query->where('data_bakal_calon_id', $calegActive);
                                }],
                            'suara'
                        )
                            ->withCount('allDataTps as total_tps');
                    },
                ])
                ->withSum('kecamatan as total_dpt', 'jumlah_dpt')
                ->firstOrFail();
        }

        return view('livewire.detail', [
            'dapilActive' => $dapilActive,
            'dataBacaleg' => $dataBacaleg,
            'partais' => $partais,
            'dapils' => $dapils,
        ]);
    }
}
