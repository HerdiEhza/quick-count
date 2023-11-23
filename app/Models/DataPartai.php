<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPartai extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['nama_partai', 'logo_partai', 'nomor_urut'];

    protected $searchableFields = ['*'];

    protected $table = 'data_partais';

    public function dataBakalCalons()
    {
        return $this->hasMany(DataBakalCalon::class);
    }

    public function perolehanSuaraPartais()
    {
        return $this->hasMany(PerolehanSuaraPartai::class);
    }
}
