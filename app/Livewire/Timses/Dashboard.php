<?php

namespace App\Livewire\Timses;

use App\Models\DataDapil;
use App\Models\TimSukses;
use App\Models\User;
use Livewire\Component;

// kurang display data per-wilayah

class Dashboard extends Component
{
    public $kategoriPemilu = 2;
    public $dapilId = 1;
    public $bacalegId = 127;

    public function render()
    {
        if ($this->kategoriPemilu === 2) {
            $dapils = DataDapil::withCount('dataTpsDPRRI as total_tps')
            ->withSum('dataTpsDPRRI as total_dpt', 'jumlah_dpt')
            ->findOrFail($this->dapilId);
        } elseif ($this->kategoriPemilu === 3) {
            $dapils = DataDapil::withCount('dataTpsDPRDProvinsi as total_tps')
            ->withSum('dataTpsDPRDProvinsi as total_dpt', 'jumlah_dpt')
            ->findOrFail($this->dapilId);
        } else {
            $dapils = DataDapil::withCount('dataTpsDPRDKabKota as total_tps')
            ->withSum('dataTpsDPRDKabKota as total_dpt', 'jumlah_dpt')
            ->findOrFail($this->dapilId);
        }
        $getUserRing1 = User::where('timses_ring', 1);
        $getDanaRing1 = User::where('timses_ring', 1)->withCount('timses as dana_ring_1')->get();
        $danaRing1 = $getDanaRing1->sum('dana_ring_1');
        $getDanaRing2 = User::where('timses_ring', 2)->withCount('timses as dana_ring_2')->get();
        $danaRing2 = $getDanaRing2->sum('dana_ring_2');

        $timsesRing1 = User::where('timses_ring', 1)
                        ->withCount('timses as total_dukungan_ring1')
                        ->orderByDesc('total_dukungan_ring1')
                        ->take(5)
                        ->get();

        $timsesRing2 = User::where('timses_ring', 2)
                        ->withCount('timses as total_dukungan_ring2')
                        ->orderByDesc('total_dukungan_ring2')
                        ->take(5)
                        ->get();

        $dukungans = TimSukses::where('data_bakal_calon_id', $this->bacalegId)->get();
        $totalDukungans = $dukungans->count();

        return view('livewire.timses.dashboard', [
            'dapils' => $dapils,
            'dukungans' => $dukungans,
            'danaRing1' => $danaRing1,
            'danaRing2' => $danaRing2,
            'timsesRing1' => $timsesRing1,
            'timsesRing2' => $timsesRing2,
            'totalDukungans' => $totalDukungans,
        ]);
    }
}
