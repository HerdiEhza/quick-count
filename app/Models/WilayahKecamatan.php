<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class WilayahKecamatan extends Model
{
    use HasFactory;
    use Searchable;
    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;
    
    protected $fillable = [
        'wilayah_kabupaten_kota_id',
        'nama_kecamatan',
        'jumlah_tps',
        'jumlah_dpt',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'wilayah_kecamatans';

    public function wilayahKabupatenKota()
    {
        return $this->belongsTo(WilayahKabupatenKota::class);
    }

    public function wilayahKelurahanDesas()
    {
        return $this->hasMany(WilayahKelurahanDesa::class);
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
            'wilayah_kecamatan_id', // Foreign key on the environments table...
            'data_tps_id', // Foreign key on the deployments table...
            'id', // Local key on the projects table...
            'id' // Local key on the environments table...
        )->where('is_active', true);
    }

    public function perolehanSuaraCaleg()
    {
        return $this->hasManyDeep(PerolehanSuaraBacaleg::class, [DataTps::class, PerolehanSuara::class]);
    }
}
