<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Repositories\BasketInterfaceRepository;

class BasketController extends Controller
{
    protected $basketRepository;

    public function __construct(BasketInterfaceRepository $basketRepository)
    {
        $this->basketRepository = $basketRepository;
    }


    public function show()
    {
        return view("basket.show");
    }


    public function add(Products $product, Request $request)
    {


        $this->validate($request, [
            "quantity" => "numeric|min:1"
        ]);

        $this->basketRepository->add($product, $request->quantity);

        return redirect()->route("basket.show")->withMessage("Produit ajouté au panier");
    }


    public function remove(Products $product)
    {

        $this->basketRepository->remove($product);

        return back()->withMessage("Produit retiré du panier");
    }


    public function empty()
    {

        $this->basketRepository->empty();

        return back()->withMessage("Panier vidé");
    }
}
