<?php

namespace App\Http\Controllers;

use App\Models\Discounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiscountController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::user()->role == "admin") {
            $request->validate([
                'discount_name' => 'required',
                'discount_percent' => 'required|integer',
                'start_date' => 'required|date',
                'end_date' => 'required|date',
            ]);

            Discounts::create([
                'discount_name' => $request->discount_name,
                'discount_percent' => $request->discount_percent,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,

            ]);
            return back()->with('message', 'La promotion a bien été créée');
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
    public function update(Request $request, string $id)
    {
        if (Auth::user()->role == "admin") {

            $discount = Discounts::findOrFail($id);

            $request->validate([
                'discount_name' => 'required',
                'discount_percent' => 'required|integer',
                'end_date' => 'required|date',
            ]);

            $discount->discount_name = $request->input('discount_name');
            $discount->discount_percent = $request->input('discount_percent');
            $discount->end_date = $request->input('end_date');

            $discount->save();

            return back()->with('message', 'La catégorie a bien été modifié');
        } else {
            return back()->withErrors(['erreur' => 'OUPS problème']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Auth::user()->role == "admin") {
            $discount = Discounts::findOrFail($id);
            $discount->delete();
            return back()->with('message', 'La promotion a bien été supprimé');
        }
    }
}
