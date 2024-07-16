<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'breed',
        'specie',
        'color',
        'age',
        'birth_date',
        'weight',
        'gender',
        'photo',
        'descript'

    ];

    public function client() : BelongsTo {
        return $this->belongsTo(Client::class);
    }
}
