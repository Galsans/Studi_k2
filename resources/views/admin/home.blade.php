@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header ">
                        <h3 class="text-center">Dashboard</h3>
                        <a href="{{ route('car.index') }}" class="btn btn-primary">CARS</a>
                        <a href="{{ route('rental.index') }}" class="btn btn-primary">Rental</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
