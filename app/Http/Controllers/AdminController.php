<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Discounts;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();

        return view('admin.home', compact('users'));
    }

    public function showCategories(Categories $categorie)
    {
        $categories = Categories::all();

        return view('admin.categoriesAdmin', compact('categories'));
    }

    public function showProducts()
    {
        $products = Products::all();

        return view('admin.productsAdmin', compact('products'));
    }

    public function showDiscounts()
    {
        $discounts = Discounts::all();

        return view('admin.discountsAdmin', compact('discounts'));
    }
}
