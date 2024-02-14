<?php

namespace App\Livewire\QuickCount;

use App\Models\DataTps;
use Livewire\Component;
use App\Models\DataDapil;
use App\Models\DataPartai;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use App\Models\PerolehanSuara;
use App\Models\WilayahKecamatan;
use App\Models\DataKategoriPemilu;
use App\Models\WilayahKabupatenKota;
use App\Models\WilayahKelurahanDesa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Spatie\ImageOptimizer\OptimizerChainFactory;

class InputSuara extends Component
{
    use WithFileUploads;

    #[Url(as: 'step', keep: true)]
    public $activeStep = 1;
    public $totalStep = 5;

    // #[Url(as: 'kk')]
    // public $kabKotaActive;
    // #[Url(as: 'k')]
    // public $kecamatanActive;
    #[Url(as: 'kd')]
    public $kelDesaActive;
    #[Url(as: 't')]
    public $tpsActive;

    #[Rule('image|max:5024')]
    public $photoCheckIn;

    #[Url(as: 'kp')]
    public $kategoriPemiluActive;
    #[Url(as: 'd')]
    public $dapilActive;

    public array $suaraPartai;
    public array $suaraBacaleg;

    public $jumlahSuaraSah;
    public $jumlahSuaraTidakSah;
    public $jumlahDPT;
    #[Rule('image|max:5024')]
    public $photoC1;
    #[Rule('image|max:5024')]
    public $photoBAHPS;

    public function nextStep()
    {
        $this->validateForm();
        if($this->activeStep < $this->totalStep) {
            $this->activeStep++;
        }
    }
    public function prevStep()
    {
        if($this->activeStep > 1) {
            $this->activeStep--;
        }
    }

    public function validateForm()
    {
        switch ($this->activeStep) {
            case 1:
                $validated = $this->validate(
                    [
                    'kelDesaActive' => 'required',
                    'tpsActive' => 'required',
                ],
                    [
                    'kelDesaActive.required' => 'harap pilih Kel/Desa terlebih dahulu',
                    'tpsActive.required' => 'harap pilih lokasi TPS terlebih dahulu'
                ]
                );
                break;
            case 2:
                $validated = $this->validate(
                    [
                    'photoCheckIn' => 'required|max:5024',
                ],
                    [
                    'photoCheckIn.required' => 'harap unggah foto bahwa Anda berada di lokasi TPS',
                    'photoCheckIn.max' => 'foto yang di unggah tidak boleh lebih dari 3 MB',
                ]
                );
                break;
            case 3:
                $validated = $this->validate(
                    [
                    'kategoriPemiluActive' => 'required',
                    'dapilActive' => 'required',
                ],
                    [
                    'kategoriPemiluActive.required' => 'harap pilih Ketegori Pemilu terlebih dahulu',
                    'dapilActive.required' => 'harap pilih DAPIL terlebih dahulu'
                ]
                );
                break;
            case 4:
                $validated = $this->validate(
                    [
                    'suaraPartai' => 'required',
                    'suaraBacaleg' => 'required',
                ],
                    [
                'suaraPartai.required' => 'harap isi semua Suara Partai terlebih dahulu',
                'suaraBacaleg.required' => 'harap isi semua Suara CALEG terlebih dahulu'
            ]
                );
                break;
            case 5:
                $validated = $this->validate([
                    'photoC1' => 'required|max:5024',
                    'photoBAHPS' => 'required|max:5024',
                ]);
                break;
        }
    }

    public function resetForm()
    {
        $this->activeStep = 1;
        $this->kelDesaActive = null;
        $this->tpsActive = null;
        $this->photoCheckIn = null;
        $this->kategoriPemiluActive = null;
        $this->dapilActive = null;
        $this->suaraPartai = [];
        $this->suaraBacaleg = [];
        $this->jumlahSuaraSah = null;
        $this->jumlahSuaraTidakSah = null;
        $this->jumlahDPT = null;
        $this->photoC1 = null;
        $this->photoBAHPS = null;

        return redirect('/admin/quick-count/input-suara');
    }

    public function submitQC()
    {
        $savephotoCheckIn = $this->photoCheckIn->storePublicly('photo_check_in', 'store_public');
        $savephotoC1 = $this->photoC1->storePublicly('photo_c1', 'store_public');
        $savephotoBAHPS = $this->photoBAHPS->storePublicly('photo_bahps', 'store_public');

        $optimizerChain = OptimizerChainFactory::create();

        $optimizerChain->optimize($savephotoCheckIn);
        $optimizerChain->optimize($savephotoC1);
        $optimizerChain->optimize($savephotoBAHPS);

        DataTps::findOrFail($this->tpsActive)
            ->fotoCheckIn()
            ->sync([Auth::id() => ['photo_path' => $savephotoCheckIn]]);

        $masterSuara = PerolehanSuara::create([
            'user_id' => Auth::id(),
            'suara_sah' => $this->jumlahSuaraSah,
            'suara_tidak_sah' => $this->jumlahSuaraTidakSah,
            'jumlah_dpt' => $this->jumlahDPT,
            'foto_c1' => $savephotoC1,
            'foto_ba' => $savephotoBAHPS,
            'data_tps_id' => $this->tpsActive,
            'data_kategori_pemilu_id' => $this->kategoriPemiluActive,
            'data_dapil_id' => $this->dapilActive,
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

        $this->resetForm();
    }

    // ----- //

    #[Url(as: 'formStep')]
    public $formStep = 2;


    // public function prevStep()
    // {
    //     $this->formStep--;
    // }

    // public function nextStep()
    // {
    //     $this->formStep++;
    // }

    public function store()
    {
        $savephotoCheckIn = $this->photoCheckIn->storePublicly('photo_check_in', 'store_public');
        $savephotoC1 = $this->photoC1->storePublicly('photo_c1', 'store_public');
        $savephotoBAHPS = $this->photoBAHPS->storePublicly('photo_bahps', 'store_public');

        $optimizerChain = OptimizerChainFactory::create();

        $optimizerChain->optimize($savephotoCheckIn);
        $optimizerChain->optimize($savephotoC1);
        $optimizerChain->optimize($savephotoBAHPS);

        // Auth::user()->check_in->updateOrCreate([
        //     'data_tps_id' => $this->tpsActive,
        //     'photo_path'	 => $this->photoCheckIn,
        // ]);

        DataTps::findOrFail($this->tpsActive)
            ->fotoCheckIn()
            ->sync([Auth::id() => ['photo_path' => $savephotoCheckIn]]);

        $masterSuara = PerolehanSuara::create([
            'user_id' => Auth::id(),
            'suara_sah' => $this->jumlahSuaraSah,
            'suara_tidak_sah' => $this->jumlahSuaraTidakSah,
            'jumlah_dpt' => $this->jumlahDPT,
            'foto_c1' => $savephotoC1,
            'foto_ba' => $savephotoBAHPS,
            'data_tps_id' => $this->tpsActive,
            'data_kategori_pemilu_id' => $this->kategoriPemiluActive,
            'data_dapil_id' => $this->dapilActive,
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

        // $this->dispatch('refresh-page')->self();
    }

    public function render()
    {
        $kabKotas = WilayahKabupatenKota::select(['id', 'nama_kabupaten_kota'])->get();
        $kecamatans = WilayahKecamatan::select(['id', 'nama_kecamatan'])->where('wilayah_kabupaten_kota_id', $this->kabKotaActive)->get();
        $kelDesas = WilayahKelurahanDesa::select(['id', 'nama_kelurahan_desa'])
            // ->whereRelation('userPemantau', 'user_id', Auth::id())
            // ->withOnly([
            //     'wilayahKecamatan',
            //     'wilayahKecamatan.wilayahKabupatenKota',
            // ])
            ->where('wilayah_kecamatan_id', $this->kecamatanActive)
            ->get();
        $tps = DataTps::select(['id', 'nama_tps'])
            ->where('wilayah_kelurahan_desa_id', $this->kelDesaActive)
            // ->doesntHave('perolehanSuaras')
            ->whereDoesntHave('perolehanSuaras', function (Builder $query) {
                $query->where('perolehan_suaras.user_id', Auth::id());
            })
            ->get();

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
            // 'kabKotas' => $kabKotas,
            // 'kecamatans' => $kecamatans,
            'kelDesas' => $kelDesas,
            'tps' => $tps,
            'kategoriPemilus' => $kategoriPemilus,
            'dapils' => $dapils,
            'dataPilihans' => $dataPilihans,
            ]);
    }
}
