<?php

namespace App\Livewire\QuickCount;

use Livewire\Component;
use App\Models\DataDapil;
use App\Models\DataPartai;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use App\Models\PerolehanSuara;
use App\Models\DataKategoriPemilu;
use App\Models\DataTps;
use App\Models\WilayahKabupatenKota;
use App\Models\WilayahKecamatan;
use App\Models\WilayahKelurahanDesa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Database\Eloquent\Builder;

class InputSuara extends Component
{
    use WithFileUploads;

    public array $suaraPartai;
    public array $suaraBacaleg;
    public $tpsActive = 1;
    public $kategoriPemiluActive = 1;

    public $formStep = 2;

    public $kabKotaActive;
    public $kecamatanActive;
    public $kelDesaActive;

    public $kategoriPemilu;
    public $dapilActive;

    #[Rule('image|max:1024')]
    public $photo;

    #[On('refresh-page')]
    public function refreshPost()
    {
        // $refresh;
    }

    // protected $listeners = ['refresh-page' => '$refresh'];

    public function prevStep()
    {
        $this->formStep--;
    }
    public function nextStep()
    {
        $this->formStep++;
    }
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
        $kabKotas = WilayahKabupatenKota::all();
        $kecamatans = WilayahKecamatan::where('wilayah_kabupaten_kota_id', $this->kabKotaActive)->get();
        $kelDesas = WilayahKelurahanDesa::where('wilayah_kecamatan_id', $this->kecamatanActive)->get();
        $tps = DataTps::where('wilayah_kelurahan_desa_id', $this->kelDesaActive)->get();

        $kategoriPemilus = DataKategoriPemilu::select(['id','nama_kategori_pemilu'])->get();

        $dapils = DataDapil::where('kategori_pemilu_id', $this->kategoriPemilu)->whereHas('dataBakalCalons')->get();

        $dataPilihans = DataPartai::select(['id','nomor_urut','nama_partai','logo_partai'])
            ->withOnly([
                'dataBakalCalons' => function (Builder $q) {
                    $q->where('data_dapil_id', $this->dapilActive);
                },
            ])
            ->get();

        return view('livewire.quick-count.input-suara', [
            'kabKotas' => $kabKotas,
            'kecamatans' => $kecamatans,
            'kelDesas' => $kelDesas,
            'tps' => $tps,
            'kategoriPemilus' => $kategoriPemilus,
            'dapils' => $dapils,
            'dataPilihans' => $dataPilihans,
        ]);
    }
}
