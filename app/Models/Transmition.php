<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transmition extends Model
{
    use HasFactory;

    protected $fillable = [
        'emberUrl',
        'name',
    ];
}
