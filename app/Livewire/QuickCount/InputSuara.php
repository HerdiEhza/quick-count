<?php

namespace App\Livewire\QuickCount;

use Livewire\Component;
use App\Models\DataPartai;
use App\Models\PerolehanSuara;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;

class InputSuara extends Component
{
    public array $suaraPartai;
    public array $suaraBacaleg;
    public $tpsActive = 1;
    public $kategoriPemiluActive = 1;

    #[On('refresh-page')]
    public function refreshPost()
    {
        // $refresh;
    }

    // protected $listeners = ['refresh-page' => '$refresh'];

    public function store()
    {
        $masterSuara = PerolehanSuara::create([
            'user_id' => Auth::id(),
            'suara_sah' => '1000',
            'suara_tidak_sah' => '1000',
            'foto_c1' => 'test',
            'foto_ba' => 'test',
            'data_tps_id' => $this->tpsActive,
            'data_kategori_pemilu_id' => $this->kategoriPemiluActive,
        ]);

        foreach($this->suaraBacaleg as $key => $value) {
            $masterSuara->perolehanSuaraBacalegs()->create([
                'data_bakal_calon_id' => $key,
                'suara' => $value,
            ]);
        }
        foreach($this->suaraPartai as $key => $value){
            $masterSuara->perolehanSuaraPartais()->create([
                'data_partai_id' => $key,
                'suara' => $value,
            ]);
        }

        $this->dispatch('refresh-page')->self();
    }

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
        ->take(3)
        ->get();

        return view('livewire.quick-count.input-suara', compact(
            'partais',
        ));
    }
}
