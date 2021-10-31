<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventoryitem extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name',
        'item_description',
        'item_comments',
        'item_price',
        'package_units'
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
