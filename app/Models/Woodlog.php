<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Woodlog extends Model
{
    use HasFactory;

    protected $fillable = [
        'log_price',
        'log_owner',
        'log_diameter',
        'log_length',
        'wood_type',
        'wood_quality'
    ];
}
