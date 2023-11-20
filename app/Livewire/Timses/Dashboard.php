<?php

namespace App\Livewire\Timses;

use App\Models\User;
use Livewire\Component;
use App\Models\DataDapil;
use App\Models\TimSukses;
use App\Models\WilayahKabupatenKota;
use App\Models\WilayahKecamatan;
use App\Models\WilayahKelurahanDesa;
use Illuminate\Support\Facades\Config;

// kurang display data per-wilayah

class Dashboard extends Component
{
    // public $kategoriPemilu = Config::get('orchid_opinion.kategori_pemilu', 'default');
    // public $dapilId = config('orchid_opinion.dapil');
    // public $bacalegId = config('orchid_opinion.bacaleg');

    public function render()
    {
        $getDapil = DataDapil::findOrFail(config('orchid_opinion.dapil'));
        $kabKotas = WilayahKabupatenKota::withCount(['allTimSukses as total_dukungan_kab_kota' => fn ($q) => ($q->where('data_bakal_calon_id', config('orchid_opinion.bacaleg')))])
                    ->orderByDesc('total_dukungan_kab_kota')
                    ->take(9)
                    ->get();
        $kecamatans = WilayahKecamatan::withCount(['allTimSukses as total_dukungan_kecamatan' => fn ($q) => ($q->where('data_bakal_calon_id', config('orchid_opinion.bacaleg')))])
                    ->orderByDesc('total_dukungan_kecamatan')
                    ->take(9)
                    ->get();
        $kelDesas = WilayahKelurahanDesa::withCount(['allTimSukses as total_dukungan_kel_desa' => fn ($q) => ($q->where('data_bakal_calon_id', config('orchid_opinion.bacaleg')))])
                    ->orderByDesc('total_dukungan_kel_desa')
                    ->take(9)
                    ->get();

        if (config('orchid_opinion.kategori_pemilu') === 2) {
            $dapils = DataDapil::withCount('dataTpsDPRRI as total_tps')
            ->withSum('dataTpsDPRRI as total_dpt', 'jumlah_dpt')
            ->findOrFail(config('orchid_opinion.dapil'));
        } elseif (config('orchid_opinion.kategori_pemilu') === 3) {
            $dapils = DataDapil::withCount('dataTpsDPRDProvinsi as total_tps')
            ->withSum('dataTpsDPRDProvinsi as total_dpt', 'jumlah_dpt')
            ->findOrFail(config('orchid_opinion.dapil'));
        } else {
            $dapils = DataDapil::withCount('dataTpsDPRDKabKota as total_tps')
            ->withSum('dataTpsDPRDKabKota as total_dpt', 'jumlah_dpt')
            ->findOrFail(config('orchid_opinion.dapil'));
        }
        $getUserRing1 = User::where('timses_ring', 1);
        $getDanaRing1 = User::where('timses_ring', 1)
                            ->withCount(['timses as dana_ring_1' => fn ($q) => ($q->where('data_bakal_calon_id', config('orchid_opinion.bacaleg')))])
                            ->get();
        $danaRing1 = $getDanaRing1->sum('dana_ring_1');
        $getDanaRing2 = User::where('timses_ring', 2)
                            ->withCount(['timses as dana_ring_2' => fn ($q) => ($q->where('data_bakal_calon_id', config('orchid_opinion.bacaleg')))])
                            ->get();
        $danaRing2 = $getDanaRing2->sum('dana_ring_2');

        $timsesRing1 = User::where('timses_ring', 1)
                        ->whereRelation('timses', 'data_bakal_calon_id', config('orchid_opinion.bacaleg'))
                        ->withCount(['timses as total_dukungan_ring1' => fn ($q) => ($q->where('data_bakal_calon_id', config('orchid_opinion.bacaleg')))])
                        ->orderByDesc('total_dukungan_ring1')
                        ->take(5)
                        ->get();

        $timsesRing2 = User::where('timses_ring', 2)
                        ->whereRelation('timses', 'data_bakal_calon_id', config('orchid_opinion.bacaleg'))
                        ->withCount(['timses as total_dukungan_ring2' => fn ($q) => ($q->where('data_bakal_calon_id', config('orchid_opinion.bacaleg')))])
                        ->orderByDesc('total_dukungan_ring2')
                        ->take(5)
                        ->get();

        $dukungans = TimSukses::where('data_bakal_calon_id', config('orchid_opinion.bacaleg'))->get();
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
