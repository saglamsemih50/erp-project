<?php

namespace Modules\QRCode\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\QRCode\Enums\Type;

class QRCode extends Model
{
    use HasFactory;
    protected $table = 'qr_code';
    protected $fillable = [
        'id',
        'company_id',
        'title',
        'data',
        'type',
        'size',
        'margin',
        'foreground_color',
        'background_color',
        'form_data'
    ];

    protected $casts = [
        'type' => Type::class,
        'form_data' => 'json',
    ];
}
