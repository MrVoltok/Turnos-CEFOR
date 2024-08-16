<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'modulo1',
        'modulo2',
        'modulo3',
        'global',
        'restrict'
    ];
}
