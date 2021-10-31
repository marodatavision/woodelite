<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_description',
        'order_comments'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function woodlogs()
    {
        return $this->hasMany(Woodlog::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function inventoryitems()
    {
        return $this->belongsToMany(Inventoryitem::class);
    }
}
