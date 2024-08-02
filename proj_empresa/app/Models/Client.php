<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'cell_phone',
        'address',
        'city',
        'UF',
        'photo'

    ];

    public function pets() : HasMany {
        return $this->hasMany(Pet::class);
    }
}
