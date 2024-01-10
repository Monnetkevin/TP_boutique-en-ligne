<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Products $product)
    {
        $categories = Categories::all();

        return view('product.create', compact('categories', 'product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'description_product' => 'required',
            'category_id' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required|integer',
            'image' => 'max:3000|image|mimes:jpeg,png,jpg,svg',
            // 'discount_id' => 'nullable'
        ]);

        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filenameWithExt = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = $filenameWithExt . '_' . time() . '.' . $extension;
            $request->file('image')->storeAs('public/uploads', $filename);
        }

        Products::create([
            'title' => $request->title,
            'description_product' => $request->description_product,
            'category_id' => $request->category_id,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'image' => $filename,
            'user_id' => Auth::user()->id,
            // 'discount_id' => $request->discount_id,
        ]);

        return redirect()->route('home')->with('message', 'Votre produit a été ajouté avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Products::findOrFail($id);
        return view('product.show', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Products $product)
    {
        $request->validate([
            'title' => 'required',
            'description_product' => 'required',
            'price' => 'required',

        ]);

        if ($request->hasFile('image')) {

            $request->validate([
                'image' => 'required|max:3000|image|mimes:jpeg,png,jpg,svg'
            ]);

            $fileLink = 'public/uploads/' . $product->image;
            if (Storage::exists($fileLink)) {

                Storage::delete($fileLink);
            }

            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filenameWithExt = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = $filenameWithExt . '_' . time() . '.' . $extension;
            $request->file('image')->storeAs('public/uploads', $filename);

            $product->image = $filename;
        }

        $product->title = $request->input('title');
        $product->description_product = $request->input('description_product');
        $product->price = $request->input('price');

        $product->save();
        return back()->with('message', 'Modification du produit effectuée');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (Auth::user()->role == "admin") {
            $product = Products::findOrFail($id);
            $fileLink = 'public/uploads/' . $product->image;

            Storage::delete($fileLink);
            $product->delete();
            return redirect()->route('home')->with('message', 'Le produit a bien été supprimé');
        } else {
            return back()->withErrors(['erreur' => 'suprression du produit impossible']);
        }
    }
}
