<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class WilayahKelurahanDesa extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'wilayah_kecamatan_id',
        'nama_kelurahan_desa',
        'jumlah_tps',
        'jumlah_dpt',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'wilayah_kelurahan_desas';

    public function wilayahKecamatan()
    {
        return $this->belongsTo(WilayahKecamatan::class);
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
            'wilayah_kelurahan_desa_id', // Foreign key on the environments table...
            'data_tps_id', // Foreign key on the deployments table...
            'id', // Local key on the projects table...
            'id' // Local key on the environments table...
        )->where('is_active', true);
    }
}
