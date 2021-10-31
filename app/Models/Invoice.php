<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_text',
        'invoice_comments',
        'invoice_number',
        'invoice_discount'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function paymentinfo()
    {
        return $this->belongsTo(Paymentinfo::class);
    }
}
