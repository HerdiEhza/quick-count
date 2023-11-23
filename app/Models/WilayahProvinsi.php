<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class WilayahProvinsi extends Model
{
    use \Awobaz\Compoships\Compoships;
    use HasFactory;
    use Searchable;

    protected $fillable = ['nama_provinsi', 'jumlah_tps', 'jumlah_dpt'];

    protected $searchableFields = ['*'];

    protected $table = 'wilayah_provinsis';

    public function wilayahKabupatenKotas()
    {
        return $this->hasMany(WilayahKabupatenKota::class);
    }

    public function dapils(): BelongsToMany
    {
        return $this->belongsToMany(DataDapil::class, 'data_dapil_has_wilayah_provinsis', 'provinsi_id', 'dapil_id');
    }

    public function allDataTps()
    {
        return $this->hasMany(DataTps::class);
    }
}
