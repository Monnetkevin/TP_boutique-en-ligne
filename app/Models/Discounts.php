<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discounts extends Model
{
    use HasFactory;

    protected $fillable = [
        'discount_name',
        'description_discount',
        'discount_percent',
    ];

    public function discountProduct()
    {
        return $this->hasMany(Products::class);
    }
}
