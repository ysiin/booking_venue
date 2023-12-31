@extends('template.lte')

@section('header')
    Tambah Pemesanan
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <main class="col-lg-8">
                <div class="mt-5">
                    <form action="{{ url('pemesanan') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Venue</label>
                                    <select name="venue_id" class="form-control select2" style="width: 100%;" required>
                                        <option selected></option>
                                        @foreach ($venue as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }} (<?php
                                            if ($item->unit == 1) {
                                                echo 'Dufan';
                                            } elseif ($item->unit == 2) {
                                                echo 'Sea World';
                                            } elseif ($item->unit == 3) {
                                                echo 'Samudra';
                                            } elseif ($item->unit == 4) {
                                                echo 'Atlantis';
                                            } elseif ($item->unit == 5) {
                                                echo 'Jakarta Bird Land';
                                            } else {
                                                echo 'Pantai Ancol';
                                            }
                                            ?>)
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 ml-3">
                                <div class="form-group">
                                    <label>Rombongan</label>
                                    <select name="rombongan_id" class="form-control select2" style="width: 100%;" required>
                                        <option value="" selected></option>
                                        @foreach ($rombongan as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_rombongan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Tanggal</span>
                            <input name="tanggal_sewa" type="date" aria-label="tanggal_sewa" class="form-control"
                                required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Jam Mulai</span>
                            <input name="jam_mulai" type="time" aria-label="jam_mulai" class="form-control" required>
                            <span class="input-group-text">Jam Selesai</span>
                            <input name="jam_selesai" type="time" aria-label="jam_selesai" class="form-control" required>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                <label for="bukti_transfer">Bukti Transfer</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="bukti_transfer"
                                            name="bukti_transfer">
                                        <label class="custom-file-label" for="exampleInputFile"></label>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <button type="button" class="btn btn-sm btn-success add-item">+</button>


                        <div class="newItem">

                        </div>
                </div>
                <div class="mb-3">
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button type="submit" class="btn btn-sm btn-primary btn-lg btn-block">Submit</button>
                    </div>
                </div>
                </form>
            </main>
        </div>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const container = document.querySelector('.newItem');
        const addButton = document.querySelector('.add-item');

        addButton.addEventListener('click', function() {
            const newInput = document.createElement('div');
            newInput.innerHTML = `
                        <div class="d-flex">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="item_id">Nama Item</label>
                                    <select name="item_ids[]" class="form-control select2" style="width: 100%;" required>
                                        <option value="" selected></option>
                                        @foreach ($barang as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_item }} (Rp. {{ number_format($item->harga) }})</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="pemesanan_item_quantity">Quantity</label>
                                    <input type="number" min="1" class="form-control" id="pemesanan_item_quantity"
                                        name="quantity[]" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="pemesanan_item_quantity">Harga (/Item)</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp</span>
                                        </div>
                                        <input type="number" min="1" class="form-control" id="pemesanan_item_harga" name="harga[]" required>
                                        <button type="button" class=" ml-2 btn btn-sm btn-danger del-item">-</button>
                                    </div>
                                </div>
                            </div>
                        </div>
            `;
            container.appendChild(newInput);

            var removeButton = newInput.querySelector('.del-item');
            removeButton.addEventListener('click', function() {
                newInput.remove();
            });
        });
    });
</script>
