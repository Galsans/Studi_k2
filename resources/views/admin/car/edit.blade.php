@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        @if (session()->has('message'))
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
        @endif
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Form Edit</h3>
                        <a href="{{ route('car.index') }}" class="btn btn-success">Go Back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('car.update', $car->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Nama Mobil</label>
                                <input name="namaMobil" value="{{ old('namaMobil', $car->namaMobil) }}"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Harga</label>
                                <input name="harga" value="{{ old('harga', $car->harga) }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Denda</label>
                                <input name="denda" value="{{ old('denda', $car->denda) }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Bahan Bakar</label>
                                <input name="bahan_bakar" value="{{ old('bahan_bakar', $car->bahan_bakar) }}"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Jumlah Kursi</label>
                                <input name="jumlah_kursi" value="{{ old('jumlah_kursi', $car->jumlah_kursi) }}"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Transmisi</label>
                                <select name="transmisi" class="form-control" id="transmisi">
                                    <option selected disabled>Pilih Transmisi</option>
                                    <option {{ $car->transmisi == 'manual' ? 'selected' : null }} value="manual">Manual
                                    </option>
                                    <option {{ $car->transmisi == 'otomatis' ? 'selected' : null }} value="otomatis">
                                        Otomatis</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Status</label>
                                <select name="status" class="form-control" id="status">
                                    <option selected disabled>Pilih Status</option>
                                    <option {{ $car->status == 'tersedia' ? 'selected' : null }} value="tersedia">Tersedia
                                    </option>
                                    <option {{ $car->status == 'tidak tersedia' ? 'selected' : null }}
                                        value="tidak tersedia">Tidak Tersedia</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Deskripsi</label>
                                <textarea name="dkr" id="dkr" cols="30" rows="10" class="form-control">{{ old('dkr', $car->dkr) }}</textarea>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">SAVE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            {{-- IMAGE UPDATE/EDIT --}}
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Form Edit Gambar</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('car.updateImg', $car->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <img src="{{ Storage::url($car->img) }}" alt="" class="form-control w-100">
                            </div>
                            <div class="form-group">
                                <label for="">Gambar</label>
                                <input type="file" name="img" class="form-control">
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">SAVE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
