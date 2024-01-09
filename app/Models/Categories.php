<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'category_name',
        'icon'
    ];

    public function categoriesProduct()
    {
        return $this->hasMany(Products::class);
    }
}
