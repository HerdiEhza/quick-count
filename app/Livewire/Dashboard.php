<?php

namespace App\Livewire;

use App\Models\DataBakalCalon;
use App\Models\DataDapil;
use App\Models\DataPartai;
use App\Models\PerolehanSuara;
use Livewire\Component;
// use Illuminate\Database\Eloquent\Builder;
// use Illuminate\Database\Query\Builder;
use Illuminate\Contracts\Database\Eloquent\Builder;

class Dashboard extends Component
{
    public $dapilActive = 1;
    public $dapils;
    public $partais;

    public function mount()
    {
        $this->dapils = DataDapil::whereHas('dataBakalCalons')->get();

        $this->partais = DataPartai::
            select(['id','nama_partai','logo_partai','nomor_urut'])
            // with([
            //     'perolehanSuaraPartais' => function (Builder $query) {
            //         $query->withSum('suara as total_suara_partai', );
            //     },
            // ])
            ->with([
                'dataBakalCalons'=> function (Builder $query) {
                        $query->where('data_dapil_id', $this->dapilActive)->select(['id','data_partai_id','nama_bakal_calon', 'nomor_urut'])->withSum('perolehanSuaraBacalegs as total_suara_bacaleg', 'suara');
                    },
                ])
            ->withSum('perolehanSuaraPartais as total_suara_partai', 'suara')
            ->get();
    }

    public function updatedDapilActive()
    {
        $this->partais = DataPartai::
        select(['id','nama_partai','logo_partai','nomor_urut'])
        // with([
        //     'perolehanSuaraPartais' => function (Builder $query) {
        //         $query->withSum('suara as total_suara_partai', );
        //     },
        // ])
        ->with([
            'dataBakalCalons'=> function (Builder $query) {
                    $query->where('data_dapil_id', $this->dapilActive)->select(['id','data_partai_id','nama_bakal_calon', 'nomor_urut'])->withSum('perolehanSuaraBacalegs as total_suara_bacaleg', 'suara');
                },
            ])
        ->withSum('perolehanSuaraPartais as total_suara_partai', 'suara')
        ->get();
    }

    public function render()
    {
        $dataDapil = DataDapil::select(['id','nama_dapil','jumlah_kursi'])->where('id', $this->dapilActive)->firstOrFail();

        $partaiMenangs = DataPartai::select(['id','nama_partai','logo_partai'])
            ->withSum([
                'perolehanSuaraPartais' => function ($query) { 
                    $query->whereRelation('perolehanSuara.dataDapil', 'data_dapil_id', $this->dapilActive);
                }], 'suara'
            )
            ->orderByDesc('perolehan_suara_partais_sum_suara')
            ->take($dataDapil->jumlah_kursi)
            ->get();

        $bacalegMenangs = DataBakalCalon::select(['id','data_partai_id','nama_bakal_calon', 'nomor_urut'])
            ->withOnly('dataPartai')
            ->where('data_dapil_id', $this->dapilActive)
            ->withSum('perolehanSuaraBacalegs as total_suara_bacaleg_menang', 'suara')
            ->orderByDesc('total_suara_bacaleg_menang')
            ->take($dataDapil->jumlah_kursi)
            ->get();

        // $suaras = PerolehanSuara::with('perolehanSuaraPartais')->get();

        // return view('livewire.dashboard', compact('partais'));

        return view('livewire.dashboard', [
            'dataDapil' => $dataDapil,
            'partaiMenangs' => $partaiMenangs,
            'bacalegMenangs' => $bacalegMenangs,
        ]);
    }
}
