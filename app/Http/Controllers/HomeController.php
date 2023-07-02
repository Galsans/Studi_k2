<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Rental;
// use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CarController;
use App\Http\Requests\CarStoreRequest;
use App\Http\Requests\CarUpdateRequest;


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
    public function index()
    {
        return view('frontend.homepage');
    }

    public function detail(Car $car, $id) {
        $car = Car::find($id);
        return view('frontend.detail', compact('car'));
    }
}
