<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Squaretimber extends Model
{
    use HasFactory;

    protected $fillable = [
        'timber_price',
        'timber_height',
        'timber_width',
        'timber_length',
        'timber_quality',
        'timber_moisture'
    ];
}
