<?php

namespace App\Livewire;

use App\Models\DataPartai;
use App\Models\PerolehanSuara;
use Livewire\Component;
// use Illuminate\Database\Eloquent\Builder;
// use Illuminate\Database\Query\Builder;
use Illuminate\Contracts\Database\Eloquent\Builder;

class Dashboard extends Component
{
    public function render()
    {
        $partais = DataPartai::
            select(['id','nama_partai','logo_partai','nomor_urut'])
            // with([
            //     'perolehanSuaraPartais' => function (Builder $query) {
            //         $query->withSum('suara as total_suara_partai', );
            //     },
            // ])
            ->with([
                'dataBakalCalons'=> function (Builder $query) {
                        $query->where('data_dapil_id', 68)->select(['id','data_partai_id','nama_bakal_calon', 'nomor_urut'])->withSum('perolehanSuaraBacalegs as total_suara_bacaleg', 'suara');
                    },
                ])
            ->withSum('perolehanSuaraPartais as total_suara_partai', 'suara')
            ->get();

        // $suaras = PerolehanSuara::with('perolehanSuaraPartais')->get();

        return view('livewire.dashboard', compact('partais'));
    }
}
