<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paymentinfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'bank_name',
        'iban',
        'bic',
        'receiver_name',
        'receiver_email',
        'receiver_phone',
        'tax_number'
    ];

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
