<?php

namespace App\Livewire\Timses;

use App\Models\TimSukses;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class InputRelawan extends Component
{
    public array $data;
    public array $nomor_ktp;
    public array $nomor_hp;
    public $nama = 'test';
    public $data_bakal_calon_id = 1;
    public $user_id;
    public $data_tps_id = 1;
    public $wilayah_kabupaten_kota_id = 1;
    public $wilayah_kecamatan_id = 1;
    public $wilayah_kelurahan_desa_id = 1;
    public $is_out_range = false;

    public function store()
    {
        TimSukses::create([
            'nomor_ktp' => $this->nomor_ktp,
            'nomor_hp' => $this->nomor_hp,
            'nama' => $this->nama,
            'data_bakal_calon_id' => $this->data_bakal_calon_id,
            'user_id' => Auth::id(),
            'data_tps_id' => $this->data_tps_id,
            'wilayah_kabupaten_kota_id' => $this->wilayah_kabupaten_kota_id,
            'wilayah_kecamatan_id' => $this->wilayah_kecamatan_id,
            'wilayah_kelurahan_desa_id' => $this->wilayah_kelurahan_desa_id,
            'is_out_range' => $this->is_out_range,
        ]);
    }
    public function render()
    {
        return view('livewire.timses.input-relawan');
    }
}
