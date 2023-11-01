<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataBakalCalon extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'data_partai_id',
        'data_dapil_id',
        'nama_bakal_calon',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'data_bakal_calons';

    public function dataPartai()
    {
        return $this->belongsTo(DataPartai::class);
    }

    public function perolehanSuaraBacalegs()
    {
        return $this->hasMany(PerolehanSuaraBacaleg::class);
    }

    public function dataDapil()
    {
        return $this->belongsTo(DataDapil::class);
    }

    public function allTimSukses()
    {
        return $this->hasMany(TimSukses::class);
    }
}
