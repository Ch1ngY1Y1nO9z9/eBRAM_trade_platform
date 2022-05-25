<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $table = 'account';

        /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'usr_id',
        'tel',
        'fax',
        'website',
        'social',
        'address_en',
        'address_zh',
        'address_cn',
        'zip_code',
        'city',
        'detail',
        'tax_code',
        'status',
        'bill_address_en',
        'bill_address_zh',
        'bill_address_cn',
        'delivery_address_en',
        'delivery_address_zh',
        'delivery_address_cn'
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
