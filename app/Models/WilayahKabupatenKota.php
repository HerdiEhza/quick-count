<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class WilayahKabupatenKota extends Model
{
    use HasFactory;
    use Searchable;
    use \Awobaz\Compoships\Compoships;

    protected $fillable = [
        'wilayah_provinsi_id',
        'nama_kabupaten_kota',
        'jumlah_tps',
        'jumlah_dpt',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'wilayah_kabupaten_kotas';

    public function wilayahProvinsi()
    {
        return $this->belongsTo(WilayahProvinsi::class);
    }

    public function wilayahKecamatans()
    {
        return $this->hasMany(WilayahKecamatan::class);
    }

    public function allTimSukses()
    {
        return $this->hasMany(TimSukses::class);
    }

    public function allDataTps()
    {
        return $this->hasMany(DataTps::class);
    }

    public function perolehanSuara(): HasManyThrough
    {
        return $this->hasManyThrough(
            PerolehanSuara::class, // Deployment | yang mau diambil
            DataTps::class, // Environment
            'wilayah_kabupaten_kota_id', // Foreign key on the environments table...
            'data_tps_id', // Foreign key on the deployments table...
            'id', // Local key on the projects table...
            'id' // Local key on the environments table...
        )->where('is_active', true);
    }
}
