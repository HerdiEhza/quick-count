<?php

namespace App\Livewire;

use App\Models\DataBakalCalon;
use App\Models\DataDapil;
use App\Models\DataPartai;
use App\Models\PerolehanSuara;
use Illuminate\Contracts\Database\Eloquent\Builder;
// use Illuminate\Database\Eloquent\Builder;
// use Illuminate\Database\Query\Builder;
use Livewire\Component;

class Dashboard extends Component
{
    public $dapilActive = 1;

    public $dapils;

    public $partais;

    public function mount()
    {
        $this->dapils = DataDapil::whereHas('dataBakalCalons')->get();

        $this->partais = DataPartai::select(['id', 'nama_partai', 'logo_partai', 'nomor_urut'])
            // with([
            //     'perolehanSuaraPartais' => function (Builder $query) {
            //         $query->withSum('suara as total_suara_partai', );
            //     },
            // ])
            ->with([
                'dataBakalCalons' => function (Builder $query) {
                    $query->where('data_dapil_id', $this->dapilActive)->select(['id', 'data_partai_id', 'nama_bakal_calon', 'nomor_urut'])->withSum('perolehanSuaraBacalegs as total_suara_bacaleg', 'suara');
                },
            ])
            // ->withSum('perolehanSuaraPartais as total_suara_partai', 'suara')
            ->withSum(
                [
                    'perolehanSuaraPartais as total_suara_partai' => function ($query) {
                        $query->whereRelation('perolehanSuara.dataDapil', 'data_dapil_id', $this->dapilActive);
                    }],
                'suara'
            )
            ->get();
    }

    public function updatedDapilActive()
    {
        $this->partais = DataPartai::select(['id', 'nama_partai', 'logo_partai', 'nomor_urut'])
            // with([
            //     'perolehanSuaraPartais' => function (Builder $query) {
            //         $query->withSum('suara as total_suara_partai', );
            //     },
            // ])
            ->with([
                'dataBakalCalons' => function (Builder $query) {
                    $query->where('data_dapil_id', $this->dapilActive)->select(['id', 'data_partai_id', 'nama_bakal_calon', 'nomor_urut'])->withSum('perolehanSuaraBacalegs as total_suara_bacaleg', 'suara');
                },
            ])
            ->withSum(
                [
                    'perolehanSuaraPartais as total_suara_partai' => function ($query) {
                        $query->whereRelation('perolehanSuara.dataDapil', 'data_dapil_id', $this->dapilActive);
                    }],
                'suara'
            )
            ->get();
    }

    public function render()
    {
        $dataDapil = DataDapil::select(['id', 'nama_dapil', 'jumlah_kursi'])
            ->where('id', $this->dapilActive)
            ->firstOrFail();

        if ($this->dapilActive <= 2) {
            $totalTps = $dataDapil->select(['id'])->withCount([
                'dataTpsDPRRI as total_tps',
                'perolehanSuara as total_suara_tps_masuk' => function (Builder $query) {
                    $query->where('data_dapil_id', $this->dapilActive)->where('is_active', true);
                },
            ])->firstOrFail();
            $persentaseSuaraMasuk = $totalTps->total_suara_tps_masuk === 0 ? 0 : number_format((($totalTps->total_tps / $totalTps->total_suara_tps_masuk) * 100), 2);
        } elseif ($this->dapilActive >= 3 and $this->dapilActive <= 10) {
            $totalTps = $dataDapil->select(['id'])->withCount([
                'dataTpsDPRDProvinsi as total_tps',
                'perolehanSuara as total_suara_tps_masuk' => function (Builder $query) {
                    $query->where('data_dapil_id', $this->dapilActive)->where('is_active', true);
                },
            ])->firstOrFail();
            $persentaseSuaraMasuk = $totalTps->total_suara_tps_masuk === 0 ? 0 : number_format((($totalTps->total_tps / $totalTps->total_suara_tps_masuk) * 100), 2);
        } else {
            $totalTps = $dataDapil->select(['id'])->withCount([
                'dataTpsDPRDKabKota as total_tps',
                'perolehanSuara as total_suara_tps_masuk' => function (Builder $query) {
                    $query->where('data_dapil_id', $this->dapilActive)->where('is_active', true);
                },
            ])->firstOrFail();
            $persentaseSuaraMasuk = $totalTps->total_suara_tps_masuk === 0 ? 0 : number_format((($totalTps->total_tps / $totalTps->total_suara_tps_masuk) * 100), 2);
        }

        $partaiMenangs = DataPartai::select(['id', 'nama_partai', 'logo_partai'])
            ->withSum(
                [
                    'perolehanSuaraPartais as total_suara_partai_menang' => function ($query) {
                        $query->whereRelation('perolehanSuara.dataDapil', 'data_dapil_id', $this->dapilActive);
                    }],
                'suara'
            )
            ->orderByDesc('total_suara_partai_menang')
            ->take($dataDapil->jumlah_kursi)
            ->get();

        $bacalegMenangs = DataBakalCalon::select(['id', 'data_partai_id', 'nama_bakal_calon', 'nomor_urut'])
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
            'totalTps' => $totalTps,
            'persentaseSuaraMasuk' => $persentaseSuaraMasuk,
            // 'totalSuaraTpsMasuk' => $totalSuaraTpsMasuk,
            'partaiMenangs' => $partaiMenangs,
            'bacalegMenangs' => $bacalegMenangs,
        ]);
    }
}
