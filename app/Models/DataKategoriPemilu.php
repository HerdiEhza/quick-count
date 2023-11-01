<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataKategoriPemilu extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['nama_kategori_pemilu'];

    protected $searchableFields = ['*'];

    protected $table = 'data_kategori_pemilus';

    public function perolehanSuaras()
    {
        return $this->hasMany(PerolehanSuara::class);
    }
}
