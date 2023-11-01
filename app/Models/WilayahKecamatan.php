<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WilayahKecamatan extends Model
{
    use HasFactory;
    use Searchable;

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
}
