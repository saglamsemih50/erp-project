<?php

namespace Modules\Purchase\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'category_id',
        'vendor_id',
        'name',
        'selling_price',
        'cost_price',
        'stock',
        'description',
    ];

    public function vendor()
    {
        return $this->belongsTo(PurchaseVendor::class, 'vendor_id');
    }
    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }
}
