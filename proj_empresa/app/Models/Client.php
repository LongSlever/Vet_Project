<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
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
