<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';

        /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'usr_id',
        'type',
        'product_name_en',
        'product_name_zh',
        'product_name_cn',
        'model',
        'sku',
        'symbology',
        'detail_en',
        'detail_zh',
        'detail_cn',
        'unit_price',
        'MOQ',
        'MOV',
        'discount',
        'weight',
        'height',
        'width',
        'length',
        'mfgr_id',
        'country',
        'safety',
        'spec_url',
        'photo1',
        'photo2',
        'photo3',
        'photo4'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'id'
    ];
}
