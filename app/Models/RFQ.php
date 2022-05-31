<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RFQ extends Model
{
    use HasFactory;

    protected $table = 'rfq';

    protected $fillable = [
        'seller_id',
        'buyer_id',
        'product_img',
        'product_type',
        'product_name',
        'product_number',
        'total_price',
        'detail'
    ];


}
