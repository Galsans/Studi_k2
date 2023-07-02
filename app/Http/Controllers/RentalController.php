<?php

namespace App\Http\Controllers;

use App\Models\rental;
use Illuminate\Http\Request;
use Alert;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $rental = Rental::all();
        return view('admin.rental.index', compact('rental'));
    }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'namaUser'=>'required',
            'email'=>'required|email|unique:users',
            'no_telp'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'alamat'=>'required',
            'namaMobil'=>'required'
        ]);
        Rental::create($request->all());
        Alert::success('Selamat', 'Berhasil CheckOut');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show(rental $rental)
    {
        //
        return view('frontend.tambah');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(rental $rental, $id)
    {
        //
        $rental = Rental::find($id)->delete();
        return redirect()->back();
    }
}
