<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
