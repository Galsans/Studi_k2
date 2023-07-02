@extends('welcome')
@section('title', 'Halaman Pemesanan')
@section('content')
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Pemesanan</h1>
            </div>
        </div>
    </header>
    {{-- @if (session()->has('message'))
        <div class="alert alert-{{ session()->get('alert-type') }} alert-dismissible fade show" role="alert">
            {{ session()->get('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 m-auto">
                    <div class="contact-form">

                        <form action="{{ route('rental.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6 mb-2">
                                    <div class="name-input form-group">
                                        <input type="text" name="namaUser" class="form-control"
                                            placeholder="Isikan nama lengkap" />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 mb-2">
                                    <div class="email-input form-group">
                                        <input type="email" name="email" class="form-control"
                                            placeholder="Isikan Alamat Email" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-6 mb-2">
                                    <div class="subject-input form-group">
                                        <input type="number" name="no_telp" class="form-control"
                                            placeholder="Isikan No telepon" />
                                    </div>
                                </div>
                            </div>
                            <div class="message-input form-group mb-3">
                                <textarea name="alamat" class="form-control" placeholder="Isikan Alamat Rumah"></textarea>
                            </div>
                            <div class="message-input form-group mb-3">
                                <label for="">Tipe Mobil</label>
                                <select name="namaMobil" id="" class="form-control">
                                    @php
                                        $car = App\Models\Car::all();
                                    @endphp
                                    <option selected disabled>Pilih Tipe Mobil</option>
                                    @foreach ($car as $item)
                                        <option value="{{ $item->namaMobil }}">{{ $item->namaMobil }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-submit form-group">
                                <button type="submit" style="height: 50px; width: 400px; margin: 0 auto"
                                    class="d-block btn btn-primary">
                                    SEND
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="maparea">
        <div class="mapouter">
            <div class="gmap_canvas">
                <iframe width="100%" height="498" id="gmap_canvas"
                    src="https://maps.google.com/maps?q=jeringo&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
                    scrolling="no" marginheight="0" marginwidth="0"></iframe><a
                    href="https://fmovies-online.net">fmovies</a><br />
                <style>
                    .mapouter {
                        position: relative;
                        text-align: right;
                        height: 498px;
                        width: 100%;
                    }
                </style><a href="https://www.embedgooglemap.net"></a>
                <style>
                    .gmap_canvas {
                        overflow: hidden;
                        background: none !important;
                        height: 498px;
                        width: 100%;
                    }
                </style>
            </div>
        </div>
    </div>
@endsection
