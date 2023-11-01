<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WilayahProvinsi extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['nama_provinsi', 'jumlah_tps', 'jumlah_dpt'];

    protected $searchableFields = ['*'];

    protected $table = 'wilayah_provinsis';

    public function wilayahKabupatenKotas()
    {
        return $this->hasMany(WilayahKabupatenKota::class);
    }

    public function allDataTps()
    {
        return $this->hasMany(DataTps::class);
    }
}
