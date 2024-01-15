<?php

namespace App\Repositories;

use App\Models\Products;


class BasketSessionRepository implements BasketInterfaceRepository
{
    public function show()
    {
        return view('basket.show');
    }

    public function add(Products $product, $quantity)
    {
        $basket = session()->get("basket");

        if ($product->discount_price !== NULL) {
            $product_details = [
                'title' => $product->title,
                'image' => $product->image,
                'price' => $product->discount_price,
                'quantity' => $quantity,
                'id' => $product->id,
            ];
        } else {
            $product_details = [
                'title' => $product->title,
                'image' => $product->image,
                'price' => $product->price,
                'quantity' => $quantity,
                'id' => $product->id,
            ];
        }

        $basket[$product->id] = $product_details;
        session()->put('basket', $basket);
    }
    public function remove(Products $products)
    {
        $basket = session()->get('babsket');
        unset($basket[$products->id]);
        session()->put('basket', $basket);
    }
    public function empty()
    {
        session()->forget('basket');
    }
}
