<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerolehanSuaraBacaleg extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'perolehan_suara_id',
        'data_bakal_calon_id',
        'suara',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'perolehan_suara_bacalegs';

    public function perolehanSuara()
    {
        return $this->belongsTo(PerolehanSuara::class);
    }

    public function dataBakalCalon()
    {
        return $this->belongsTo(DataBakalCalon::class);
    }
}
