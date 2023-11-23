<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class DataTps extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'nama_tps',
        'alamat_tps',
        'jumlah_dpt',
        'wilayah_provinsi_id',
        'wilayah_kabupaten_kota_id',
        'wilayah_kecamatan_id',
        'wilayah_kelurahan_desa_id',
        'data_dapil_ri_id',
        'data_dapil_prov_id',
        'data_dapil_kab_kota_id',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'data_tps';

    public function perolehanSuaras()
    {
        return $this->hasMany(PerolehanSuara::class);
    }

    public function perolehanSuaraCaleg(): HasManyThrough
    {
        return $this->hasManyThrough(
            PerolehanSuaraBacaleg::class, // Deployment | yang mau diambil
            PerolehanSuara::class, // Environment
            'data_tps_id', // Foreign key on the environments table...
            'perolehan_suara_id', // Foreign key on the deployments table...
            'id', // Local key on the projects table...
            'id' // Local key on the environments table...
        )->where('is_active', true);
    }

    public function tpsTimses(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_timses_tps', 'data_tps_id', 'user_id');
    }

    public function allTimSukses()
    {
        return $this->hasMany(TimSukses::class);
    }

    public function wilayahProvinsi()
    {
        return $this->belongsTo(WilayahProvinsi::class);
    }

    public function wilayahKabupatenKota()
    {
        return $this->belongsTo(WilayahKabupatenKota::class);
    }

    public function wilayahKecamatan()
    {
        return $this->belongsTo(WilayahKecamatan::class);
    }

    public function wilayahKelurahanDesa()
    {
        return $this->belongsTo(WilayahKelurahanDesa::class);
    }

    public function dataDapilRi()
    {
        return $this->belongsTo(DataDapil::class, 'data_dapil_ri_id');
    }

    public function dataDapilProv()
    {
        return $this->belongsTo(DataDapil::class, 'data_dapil_prov_id');
    }

    public function dataDapilKabKota()
    {
        return $this->belongsTo(DataDapil::class, 'data_dapil_kab_kota_id');
    }
}
