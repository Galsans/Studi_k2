@extends('layouts.app')
@section('content')
    <div class="container">
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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Form Create</h3>
                        <a href="{{ route('car.index') }}" class="btn btn-success">Go Back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('car.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Nama Mobil</label>
                                <input name="namaMobil" value="{{ old('namaMobil') }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Harga</label>
                                <input name="harga" value="{{ old('harga') }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Denda</label>
                                <input name="denda" value="{{ old('denda') }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Bahan Bakar</label>
                                <input name="bahan_bakar" value="{{ old('bahan_bakar') }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Jumlah Kursi</label>
                                <input name="jumlah_kursi" value="{{ old('jumlah_kursi') }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Transmisi</label>
                                <select name="transmisi" class="form-control" id="transmisi">
                                    <option selected disabled>Pilih Transmisi</option>
                                    <option value="manual">Manual</option>
                                    <option value="otomatis">Otomatis</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Status</label>
                                <select name="status" class="form-control" id="status">
                                    <option selected disabled>Pilih Status</option>
                                    <option value="tersedia">Tersedia</option>
                                    <option value="tidak tersedia">Tidak Tersedia</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Deskripsi</label>
                                <textarea name="dkr" id="dkr" cols="30" rows="10" class="form-control">{{ old('dkr') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Gambar</label>
                                <input type="file" name="img" class="form-control">
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">SAVE</button>
                                <button type="reset" class="btn btn-warning">RESET</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
