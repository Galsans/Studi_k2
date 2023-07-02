<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CarStoreRequest;
use App\Http\Requests\CarUpdateRequest;
use Illuminate\Support\Str;
use File;
use Alert;


class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        //
        $car = Car::latest()->get();
        return view('admin.car.index', compact('car'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.car.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarStoreRequest $request)
    {
        //
        if($request->validated()) {
            $img = $request->file('img')->store('gambar/cars', 'public');
            $slug = Str::of($request->namaMobil)->slug('-');

            Car::create($request->except('img') + ['img' => $img, 'slug'=> $slug]);
        }
        Alert::success('Success', 'Berhasil Menyimpan Data ');
        return redirect()->route('car.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car, $id)
    {
        //
        $car = Car::find($id);
        return view('admin.car.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarUpdateRequest $request, Car $car, $id)
    {
        //
        $car = Car::find($id);

        if($request->validated()) {
            $slug = Str::of($request->namaMobil)->slug('-');
            $car->update($request->validated() + ['slug'=>$slug]);
        }
        Alert::success('Success', 'Berhasil Mengubah Data ');

        return redirect()->route('car.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car, $id)
    {
        // CARA PERTAMA
        // hapus file
        $car = Car::where('id',$id)->first();
        File::delete('storage/'.$car->img);

        // hapus data
        Car::where('id',$id)->delete();

        Alert::succes('Success', 'Berhasil Menghapus Data ');

        return redirect()->back();

        // ATAU MENGGUNAKAN CARA
        // CARA KEDUA

        // $car = Car::findOrFail($id);
        // if($car->img){
        //     unlink('storage/'. $car->img);
        // }
        // $car->delete();
        // return redirect()->back()->with([
        //     'message'=>'data berhasil dihapus',
        //     'type-alert'=>'danger'
        // ]);

    }

    public function updateImg(Request $request, Car $car, $carId) {
        $request->validate([
            'img'=>'required|image'
        ]);

        $car = Car::findOrFail($carId);
        if($request->img) {
            unlink('storage/'. $car->img);
            $img = $request->file('img')->store('gambar/cars', 'public');

            $car->update(['img'=>$img]);
        }
        // dd($request);
        Alert::success('Success', 'Berhasil Menyimpan Data ');
        return redirect()->route('car.index');
    }

    public function home(){
        return view('admin.home');
    }
}
