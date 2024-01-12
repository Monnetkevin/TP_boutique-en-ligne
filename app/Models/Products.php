<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description_product',
        'price',
        'quantity',
        'image',
        'user_id',
        'category_id',
        'discount_id',
    ];

    public function productCategory()
    {
        return $this->belongsTo(Categories::class);
    }
    public function productDiscount()
    {
        return $this->belongsTo(Discounts::class);
    }
    public function productUser()
    {
        return $this->belongsTo(User::class);
    }
}
