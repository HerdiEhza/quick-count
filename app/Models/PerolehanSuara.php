<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PerolehanSuara extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'user_id',
        'suara_sah',
        'suara_tidak_sah',
        'foto_c1',
        'foto_ba',
        'data_tps_id',
        'data_kategori_pemilu_id',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'perolehan_suaras';

    public function perolehanSuaraPartais()
    {
        return $this->hasMany(PerolehanSuaraPartai::class);
    }

    public function perolehanSuaraBacalegs()
    {
        return $this->hasMany(PerolehanSuaraBacaleg::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dataTps()
    {
        return $this->belongsTo(DataTps::class);
    }

    public function dataKategoriPemilu()
    {
        return $this->belongsTo(DataKategoriPemilu::class);
    }
}
