<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WilayahKabupatenKota extends Model
{
    use HasFactory;
    use Searchable;

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
}
