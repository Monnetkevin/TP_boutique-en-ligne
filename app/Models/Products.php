<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;


    public function categorie()
    {
        return $this->belongsTo(Categories::class);
    }
    public function discount()
    {
        return $this->belongsTo(Discounts::class);
    }
}
