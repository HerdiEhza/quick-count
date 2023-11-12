<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class DataDapil extends Model
{
    use HasFactory;
    use Searchable;
    use \Awobaz\Compoships\Compoships;

    protected $fillable = [
        'kategori_dapil',
        'nama_dapil',
        'kategori_pemilu_id',
        'jumlah_kursi',
        'jumlah_penduduk',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'data_dapils';

    public function dataBakalCalons()
    {
        return $this->hasMany(DataBakalCalon::class);
    }

    public function dataTpsDPRRI()
    {
        return $this->hasMany(DataTps::class, 'data_dapil_ri_id');
    }

    public function dataTpsDPRDProvinsi()
    {
        return $this->hasMany(DataTps::class, 'data_dapil_prov_id');
    }

    public function dataTpsDPRDKabKota()
    {
        return $this->hasMany(DataTps::class, 'data_dapil_kab_kota_id');
    }

    public function provinsi(): BelongsToMany
    {
        return $this->belongsToMany(WilayahProvinsi::class, 'data_dapil_has_wilayah_provinsis', 'dapil_id', 'provinsi_id');
    }
    public function kabupatenKota(): BelongsToMany
    {
        return $this->belongsToMany(WilayahKabupatenKota::class, 'data_dapil_has_wilayah_kabupaten_kotas', 'dapil_id', 'kabupaten_kota_id');
    }
    public function kecamatan(): BelongsToMany
    {
        return $this->belongsToMany(WilayahKecamatan::class, 'data_dapil_has_wilayah_kecamatans', 'dapil_id', 'kecamatan_id');
    }
    public function kelurahanDesa(): BelongsToMany
    {
        return $this->belongsToMany(WilayahKelurahanDesa::class, 'data_dapil_has_wilayah_kelurahan_desas', 'dapil_id', 'kelurahan_desa_id');
    }

    // public function kabupatenKota(): HasManyThrough
    // {
    //     // return $this->hasManyThrough(WilayahKabupatenKota::class, DataTps::class);
    //     return $this->hasManyThrough(
    //         WilayahKabupatenKota::class, // Deploymet
    //         DataTps::class, // Environment
    //         'wilayah_kabupaten_kota_id', // Foreign key on the environments table...
    //         'id', // Foreign key on the deployments table...
    //         'id', // Local key on the projects table...
    //         'data_dapil_kab_kota_id' // Local key on the environments table...
    //     );
    // }
}
