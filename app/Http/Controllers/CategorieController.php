<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategorieController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::user()->role == "admin") {
            $request->validate([
                'category_name' => 'required|max:40'
            ]);

            Categories::create([
                'category_name' => $request->category_name
            ]);
            return back()->with('message', 'Vous venez de créer une nouvelle catégorie.');
        } else {
            return redirect()->route('home')->withErrors(['erreur' => 'OUPS, vous n\'êtes pas admin']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (Auth::user()->role == "admin") {

            $categorie = Categories::findOrFail($id);

            $request->validate([
                'category_name' => 'required|max:40'
            ]);
            $categorie->category_name = $request->input('category_name');
            $categorie->save();

            return back()->with('message', 'La catégorie a bien été modifié');
        } else {
            return back()->withErrors(['erreur' => 'OUPS problème']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (Auth::user()->role == "admin") {
            $categorie = Categories::findOrFail($id);
            $categorie->delete();

            return redirect()->route('admin')->with('message', 'suppression de la catégorie');
        }
    }
}
