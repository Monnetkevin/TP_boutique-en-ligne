<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discounts extends Model
{
    use HasFactory;

    protected $fillable = [
        'discount_name',
        'discount_percent',
        'start_date',
        'end_date'
    ];

    public function discountProduct()
    {
        return $this->belongsToMany(Products::class);
    }
}
