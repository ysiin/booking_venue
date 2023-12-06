@extends('template.lte')

@section('header')
    Edit Pemesanan
@endsection'

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <main class="col-lg-8">
                <div class="mt-5">
                    <form action="{{ url('pemesanan/' . $data->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="d-flex">
                            <div class="col-lg-6">
                                <div class="mb-3 ">
                                    <label for="nama_rombongan" class="col-form-label">Nama Rombongan</label>
                                    <p>{{ $data->rombongan->nama_rombongan }}</p>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3 ">
                                    <label for="jam_mulai" class="col-form-label">Jam Mulai</label>
                                    <p>{{ $data->jam_mulai }}</p>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3 ">
                                    <label for="jam_selesai" class="col-form-label">Jam Selesai</label>
                                    <p>{{ $data->jam_selesai }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3 ">
                                <label for="item" class="col-form-label">Item :</label>
                                <ul>
                                    @if ($data->item)
                                        @foreach ($data->item as $item)
                                            <li>{{ $item->nama_item }} - {{ $item->pivot->quantity }} - Rp.
                                                {{ number_format($item->pivot->harga) }}</li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <div class="form-group">
                                    <label>Venue</label>
                                    <select name="venue_id" class="form-control select2" style="width: 100%;" required>
                                        <option selected></option>
                                        @foreach ($venue as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $item->id == $data->venue_id ? 'selected' : '' }}>
                                                {{ $item->nama }}
                                                (<?php
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
                        </div>
                        <div class="col-lg-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Tanggal</span>
                                <input value="{{ $data->tanggal_sewa }}" name="tanggal_sewa" type="date"
                                    aria-label="tanggal_sewa" class="form-control" required>
                            </div>
                        </div>
                        <button type="button" class="btn btn-sm btn-success add-item">+</button>

                        <div class="newItem">

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
                                    </div>
                                </div>
                            </div>
                        </div>
            `;
            container.appendChild(newInput);
        });
    });
</script>
