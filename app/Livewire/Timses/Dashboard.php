<?php

namespace App\Livewire\Timses;

use App\Models\DataDapil;
use App\Models\TimSukses;
use App\Models\User;
use App\Models\WilayahKabupatenKota;
use App\Models\WilayahKecamatan;
use App\Models\WilayahKelurahanDesa;
use Illuminate\Support\Facades\Config;
use Livewire\Component;

// kurang display data per-wilayah

class Dashboard extends Component
{
    // public $kategoriPemilu = Config::get('orchid_opinion.timses.kategori_pemilu', 'default');
    // public $dapilId = config('orchid_opinion.timses.dapil');
    // public $bacalegId = config('orchid_opinion.timses.bacaleg');

    public function render()
    {
        // $getDapil = DataDapil::findOrFail(config('orchid_opinion.timses.dapil'));
        $kabKotas = WilayahKabupatenKota::WhereRelation('dapils', 'dapil_id', config('orchid_opinion.timses.dapil'))
            ->withCount(['allTimSukses as total_dukungan_kab_kota' => fn($q) => ($q->where('data_bakal_calon_id', config('orchid_opinion.timses.bacaleg')))])
            ->orderByDesc('total_dukungan_kab_kota')
            ->take(9)
            ->get();
        $kecamatans = WilayahKecamatan::WhereRelation('dapils', 'dapil_id', config('orchid_opinion.timses.dapil'))
            ->withCount(['allTimSukses as total_dukungan_kecamatan' => fn($q) => ($q->where('data_bakal_calon_id', config('orchid_opinion.timses.bacaleg')))])
            ->orderByDesc('total_dukungan_kecamatan')
            ->take(9)
            ->get();
        $kelDesas = WilayahKelurahanDesa::WhereRelation('dapils', 'dapil_id', config('orchid_opinion.timses.dapil'))
            ->withCount(['allTimSukses as total_dukungan_kel_desa' => fn($q) => ($q->where('data_bakal_calon_id', config('orchid_opinion.timses.bacaleg')))])
            ->orderByDesc('total_dukungan_kel_desa')
            ->take(9)
            ->get();

        if (config('orchid_opinion.timses.kategori_pemilu') === 2) {
            $dapils = DataDapil::withCount('dataTpsDPRRI as total_tps')
                ->withSum('dataTpsDPRRI as total_dpt', 'jumlah_dpt')
                ->findOrFail(config('orchid_opinion.timses.dapil'));
        } elseif (config('orchid_opinion.timses.kategori_pemilu') === 3) {
            $dapils = DataDapil::withCount('dataTpsDPRDProvinsi as total_tps')
                ->withSum('dataTpsDPRDProvinsi as total_dpt', 'jumlah_dpt')
                ->findOrFail(config('orchid_opinion.timses.dapil'));
        } else {
            $dapils = DataDapil::withCount('dataTpsDPRDKabKota as total_tps')
                ->withSum('dataTpsDPRDKabKota as total_dpt', 'jumlah_dpt')
                ->findOrFail(config('orchid_opinion.timses.dapil'));
        }

        $getUserRing1 = User::where('timses_ring', 1)
            ->whereRelation('timses', 'data_bakal_calon_id', config('orchid_opinion.timses.bacaleg'))
            ->withCount(['timses as total_dukungan_ring1' => fn($q) => ($q->where('data_bakal_calon_id', config('orchid_opinion.timses.bacaleg')))]);
        $getUserRing2 = User::where('timses_ring', 2)
            ->whereRelation('timses', 'data_bakal_calon_id', config('orchid_opinion.timses.bacaleg'))
            ->withCount(['timses as total_dukungan_ring2' => fn($q) => ($q->where('data_bakal_calon_id', config('orchid_opinion.timses.bacaleg')))]);

        $danaRing1 = $getUserRing1->orderByDesc('total_dukungan_ring1')->get()->sum('total_dukungan_ring1');
        $danaRing2 = $getUserRing2->orderByDesc('total_dukungan_ring2')->get()->sum('total_dukungan_ring2');

        // $timsesRing1 = $getUserRing1
        $timsesRing1 = $getUserRing1
            ->take(5)
            ->get();

        $timsesRing2 = $getUserRing2
            ->take(5)
            ->get();

        $dukungans = TimSukses::where('data_bakal_calon_id', config('orchid_opinion.timses.bacaleg'))->get();
        $totalDukungans = $dukungans->count();

        return view('livewire.timses.dashboard', [
            'dapils' => $dapils,
            'kabKotas' => $kabKotas,
            'kecamatans' => $kecamatans,
            'kelDesas' => $kelDesas,

            'dukungans' => $dukungans,
            'danaRing1' => $danaRing1,
            'danaRing2' => $danaRing2,
            'timsesRing1' => $timsesRing1,
            'timsesRing2' => $timsesRing2,
            'totalDukungans' => $totalDukungans,
        ]);
    }
}
