<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_firstname',
        'supplier_lastname',
        'supplier_company',
        'supplier_comments'
    ];

    public function addresses()
    {
        return $this->morphMany(Address::class, 'addressable');
    }  

    public function inventoryitems()
    {
        return $this->hasMany(Inventoryitem::class);
    }
}
