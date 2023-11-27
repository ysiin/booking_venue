@extends('template.lte')

@section('header')
    Tambah Venue
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <main class="col-lg-8 ">
                <div class="mt-5">
                    <form action="{{ url('venue') }}" method="POST">
                        @csrf
                        <div class="d-flex">
                            <div class="col-lg-6">
                                <div class=" mb-3">
                                    <label for="nama_venue">Nama Venue</label>
                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                </div>
                                <div class=" mb-3">
                                    <label for="harga_venue">Harga Venue</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp</span>
                                        </div>
                                        <input type="number" min="1" class="form-control" id="harga" name="harga" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Unit</label>
                                    <select id="unit" name="unit" class="form-control select2" style="width: 100%;"
                                        required>
                                        <option selected></option>
                                        <option value="1">Dufan</option>
                                        <option value="2">Sea World</option>
                                        <option value="3">Samudra</option>
                                        <option value="4">Atlantis</option>
                                        <option value="5">Jakarta Bird Land</option>
                                        <option value="6">Pantai Ancol</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 ml-3">
                                <label for="ukuran">Ukuran Venue</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">p x l</span>
                                    <input placeholder="Panjang" type="number" aria-label="panjang" id="panjang"
                                        name="panjang" class="form-control">
                                    <input placeholder="Lebar" type="number" aria-label="lebar" id="lebar"
                                        name="lebar" class="form-control">
                                </div>
                                <label for="kapasitas">Kapasitas</label>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" id="max_kapasitas" name="max_kapasitas"
                                        required aria-describedby="basic-addon2">
                                    <span class="input-group-text" id="basic-addon2">Orang</span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button type="submit" class="btn btn-sm btn-primary btn-lg btn-block">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
@endsection
