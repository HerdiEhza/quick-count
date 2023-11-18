<?php

namespace App\Models\Timses;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Timses extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $guard = 'admin';
}
