<?php

namespace App\Livewire\QuickCount;

use Livewire\Component;
use App\Models\DataPartai;

class InputSuara extends Component
{
    public function render()
    {
        $partais = DataPartai::
        // with([
        //     'perolehanSuaraPartais' => function (Builder $query) {
        //         $query->withSum('suara as total_suara_partai', );
        //     },
        // ])
        with([
            'dataBakalCalons:id,data_partai_id,nama_bakal_calon',
            ])
        ->select(['id','nama_partai','logo_partai'])
        ->get();

        return view('livewire.quick-count.input-suara', compact(
            'partais',
        ));
    }
}
