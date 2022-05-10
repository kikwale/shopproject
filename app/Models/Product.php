<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
 
   
    protected $fillable = [
        'name',
        'owner_id',
        'shop_id',
        'category',
        'unit',
        'quantity',
        'money_unit',
        'total',
        'notification',
        'purchased_price',
        'sold_price',
        'expire',
        'location',
        'description',
    ];
}
	