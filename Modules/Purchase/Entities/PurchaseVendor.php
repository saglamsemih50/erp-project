<?php

namespace Modules\Purchase\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PurchaseVendor extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'name',
        'company_name',
        'email',
        'phone',
        'billing_address',
        'shipping_address'


    ];
}
