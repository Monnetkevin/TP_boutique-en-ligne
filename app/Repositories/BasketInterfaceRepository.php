<?php

namespace App\Repositories;

use App\Models\Products;

interface BasketInterfaceRepository
{

    // Afficher le panier
    public function show();

    // Ajouter un produit au panier
    public function add(Products $product, $quantity);

    // Retirer un produit du panier
    public function remove(Products $product);

    // Vider le panier
    public function empty();
}
