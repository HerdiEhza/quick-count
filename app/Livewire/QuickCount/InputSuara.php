<?php

namespace App\Livewire\QuickCount;

use App\Models\DataDapil;
use App\Models\DataKategoriPemilu;
use App\Models\DataPartai;
use App\Models\DataTps;
use App\Models\PerolehanSuara;
use App\Models\WilayahKabupatenKota;
use App\Models\WilayahKecamatan;
use App\Models\WilayahKelurahanDesa;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithFileUploads;

class InputSuara extends Component
{
    use WithFileUploads;

    public array $suaraPartai;

    public array $suaraBacaleg;

    public $formStep = 2;

    #[Url(as: 'kp')]
    public $kategoriPemiluActive;

    #[Url(as: 'd')]
    public $dapilActive;

    #[Url(as: 'kk')]
    public $kabKotaActive;

    #[Url(as: 'k')]
    public $kecamatanActive;

    #[Url(as: 'kd')]
    public $kelDesaActive;

    #[Url(as: 't')]
    public $tpsActive;

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

        foreach ($this->suaraBacaleg as $key => $value) {
            $masterSuara->perolehanSuaraBacalegs()->create([
                'data_bakal_calon_id' => $key,
                'suara' => $value,
            ]);
        }
        foreach ($this->suaraPartai as $key => $value) {
            $masterSuara->perolehanSuaraPartais()->create([
                'data_partai_id' => $key,
                'suara' => $value,
            ]);
        }

        $this->dispatch('refresh-page')->self();
    }

    public function render()
    {
        $kabKotas = WilayahKabupatenKota::select(['id', 'nama_kabupaten_kota'])->get();
        $kecamatans = WilayahKecamatan::select(['id', 'nama_kecamatan'])->where('wilayah_kabupaten_kota_id', $this->kabKotaActive)->get();
        $kelDesas = WilayahKelurahanDesa::select(['id', 'nama_kelurahan_desa'])->where('wilayah_kecamatan_id', $this->kecamatanActive)->get();
        $tps = DataTps::select(['id', 'nama_tps'])->where('wilayah_kelurahan_desa_id', $this->kelDesaActive)->get();

        $kategoriPemilus = DataKategoriPemilu::select(['id', 'nama_kategori_pemilu'])->get();

        $dapils = DataDapil::select(['id', 'nama_dapil', 'kategori_pemilu_id'])
            ->where('kategori_pemilu_id', $this->kategoriPemiluActive)
            ->whereHas('dataBakalCalons')
            ->get();

        $dataPilihans = DataPartai::select(['id', 'nomor_urut', 'nama_partai', 'logo_partai'])
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
