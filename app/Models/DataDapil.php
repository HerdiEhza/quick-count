<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataDapil extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['nama_dapil'];

    protected $searchableFields = ['*'];

    protected $table = 'data_dapils';

    public function dataBakalCalons()
    {
        return $this->hasMany(DataBakalCalon::class);
    }

    public function allDataTps()
    {
        return $this->hasMany(DataTps::class, 'data_dapil_ri_id');
    }

    public function allDataTps2()
    {
        return $this->hasMany(DataTps::class, 'data_dapil_prov_id');
    }

    public function allDataTps3()
    {
        return $this->hasMany(DataTps::class, 'data_dapil_kab_kota_id');
    }
}
