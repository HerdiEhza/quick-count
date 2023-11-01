<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
}
