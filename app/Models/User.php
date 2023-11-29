<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Awobaz\Compoships\Database\Eloquent\Relations\HasMany as RelationsHasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    // use \Awobaz\Compoships\Compoships;
    use HasApiTokens;
    use HasFactory;
    use HasRoles;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function fotoCheckIn(): BelongsToMany
    {
        return $this->belongsToMany(DataTps::class, 'user_data_tps_photo', 'user_id', 'data_tps_id');
    }

    public function wilayahPemantau(): BelongsToMany
    {
        return $this->belongsToMany(WilayahKelurahanDesa::class, 'user_pemantau_wilayah_kelurahan_desa', 'user_id', 'wilayah_kelurahan_desa_id');
    }

    public function timsesTps(): BelongsToMany
    {
        return $this->belongsToMany(DataTps::class, 'user_timses_tps', 'user_id', 'data_tps_id');
    }

    public function timses(): HasMany
    {
        return $this->hasMany(TimSukses::class);
    }

    public function timsesRing1(): HasMany
    {
        return $this->hasMany(TimSukses::class);
    }

    public function InputSuara(): HasMany
    {
        return $this->hasMany(PerolehanSuara::class);
    }

    // public function timsesRing2(): RelationsHasMany
    // {
    //     return $this->hasMany(TimSukses::class);
    // }

    public function timsesRing2(): HasManyThrough
    {
        // return $this->hasManyThrough(WilayahKabupatenKota::class, DataTps::class);
        return $this->hasManyThrough(
            TimSukses::class, // Deploymet
            User::class, // Environment
            'timses_leader_id', // Foreign key on the environments table...
            'user_id', // Foreign key on the deployments table...
            'id', // Local key on the projects table...
            'id' // Local key on the environments table...
        );
    }
}
