<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PerolehanSuaraPartai extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['perolehan_suara_id', 'data_partai_id', 'suara'];

    protected $searchableFields = ['*'];

    protected $table = 'perolehan_suara_partais';

    public function perolehanSuara()
    {
        return $this->belongsTo(PerolehanSuara::class);
    }

    public function dataPartai()
    {
        return $this->belongsTo(DataPartai::class);
    }
}
