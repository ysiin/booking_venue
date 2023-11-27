@extends('template.lte')

@section('header')
    Tambah Item
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <main class="col-lg-9">
                <div class="mt-5">
                    <form action="{{ url('item') }}" method="POST">
                        @csrf
                        <div class="d-flex">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="nama_item">Nama Item</label>
                                    <input type="text" class="form-control" id="nama_item" name="nama_item"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="quantity">Quantity</label>
                                    <input type="number" min="1" class="form-control" id="quantity" name="quantity"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="nama_rombongan">Harga (/Item)</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp</span>
                                        </div>
                                        <input type="number" min="1" class="form-control" id="harga" name="harga" required>
                                    </div>
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
