<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderProduct extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $fillable = [
        'quantity',
        'payment_id',
        'payment_type',
        'price',
        'product_id',
        'user_id',
    ];

}
