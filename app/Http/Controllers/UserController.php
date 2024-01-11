<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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
        //
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
        if (Auth::user()->id == $id) {
            $user = User::findOrFail($id);
            return view('users.edit', compact('user'));
        } else {
            return back()->withErrors(['erreur' => 'OUPS c\'est pas votre compte']);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        if (Auth::user()->id == $user->id) {

            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email|unique:users',
                'phone' => 'required',
                'address' => 'required',
                'postal_code' => 'required',
                'city' => 'required',
            ]);

            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->address = $request->input('address');
            $user->postal_code = $request->input('postal_code');
            $user->city = $request->input('city');

            $user->save();

            return back()->with('message', 'votre compte a bien été modifié');
        } else {
            return back()->withErrors(['erreur' => 'OUPS c\'est pas votre compte']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (Auth::user()->role == "admin") {

            $user = User::findOrFail($id);
            $user->delete();

            return back()->with('message', 'Le compte a été supprimé');
        }
    }
}
