<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Categories;
use App\Models\Discounts;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        // $latestProduct = Products::latest()->first();
        //  dd($latestProduct);

        // if ($latestProduct) {
        //     $images = $latestProduct->image;
        // } else {
        //     $images = collect(); // Si aucun article n'est trouvé, initialisez une collection vide
        // }

        $products = Products::query()
            ->when(
                $request->q,
                function (Builder $builder) use ($request) {
                    $builder
                        ->Where('category_id', 'like', "%{$request->q}%")
                        ->orderBy('title')
                        ->get();
                }
            )
            ->paginate(12);

        $categories = Categories::all();
        $discounts = Discounts::all();
        return view('home', compact('products', 'categories'));
    }
}
