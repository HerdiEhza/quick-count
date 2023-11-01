<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TimSukses extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'nomor_ktp',
        'nomor_hp',
        'nama',
        'data_bakal_calon_id',
        'user_id',
        'data_tps_id',
        'wilayah_kabupaten_kota_id',
        'wilayah_kecamatan_id',
        'wilayah_kelurahan_desa_id',
        'is_out_range',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'tim_sukses';

    protected $casts = [
        'is_out_range' => 'boolean',
    ];

    public function dataBakalCalon()
    {
        return $this->belongsTo(DataBakalCalon::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dataTps()
    {
        return $this->belongsTo(DataTps::class);
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
}
