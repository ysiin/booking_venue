@extends('template.lte')

@section('header')
    Pemesanan
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <main class="col-lg-12 ms-sm-auto col-lg-10 px-md-4">
                <div class="container">
                    <div class="mt-5">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No. </th>
                                    <th>Nama Venue</th>
                                    <th>Unit</th>
                                    <th>Nama Rombongan</th>
                                    <th>Tanggal Sewa</th>
                                    <th>Jam Mulai</th>
                                    <th>Jam Selesai</th>
                                    <th>Status</th>
                                    <th>Item</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = $data1->firstItem(); ?>
                                @foreach ($data1 as $item)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $item->venue->nama }}</td>
                                        <td>
                                            <?php
                                            if ($item->venue->unit == 1) {
                                                echo 'Dufan';
                                            } elseif ($item->venue->unit == 2) {
                                                echo 'Sea World';
                                            } elseif ($item->venue->unit == 3) {
                                                echo 'Samudra';
                                            } elseif ($item->venue->unit == 4) {
                                                echo 'Atlantis';
                                            } elseif ($item->venue->unit == 5) {
                                                echo 'Jakarta Bird Land';
                                            } else {
                                                echo 'Pantai Ancol';
                                            }
                                            ?>
                                        </td>
                                        <td>{{ $item->rombongan->nama_rombongan }}</td>
                                        <td>{{ $item->tanggal_sewa }}</td>
                                        <td>{{ $item->jam_mulai }}</td>
                                        <td>{{ $item->jam_selesai }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>
                                            <button type="button" onclick="itemDetails()"
                                                class="btn-detail btn btn-info btn-sm"
                                                data-pemesanan-id="{{ $item->id }}">Item</button>
                                        </td>
                                        <td>
                                            <a href="{{ route('pemesanan.destroy', $item->id) }}"
                                                class="btn btn-danger btn-sm" data-confirm-delete="true">Del</a>
@if ($item->status == 'back')
<a href="{{ route('pemesanan.edit', $item->id) }}"
    class="btn btn-warning btn-sm">Edit</a>
@else
<button href="{{ route('pemesanan.edit', $item->id) }}"
    class="btn btn-warning btn-sm" disabled>Edit </button>
@endif
                                            


                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $data1->links() }}
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var detailButtons = document.querySelectorAll('.btn-detail');
        detailButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var pemesananId = this.getAttribute('data-pemesanan-id');
                var itemDetails = '';
                var quantities = '';

                // Mengambil nama item dan quantities dari data pemesanan
                @foreach ($data1 as $dataPemesanan)
                    if ("{{ $dataPemesanan->id }}" == pemesananId) {
                        @foreach ($dataPemesanan->item as $item)
                            itemDetails += '<li>' + "{{ $item->nama_item }}" + " " +
                                "{{ $item->pivot->quantity }}" + " " +
                                "Rp. " + "{{ number_format($item->pivot->harga) }}" + '</li>';
                        @endforeach
                    }
                @endforeach

                // Tampilkan SweetAlert dengan informasi detail pemesanan
                Swal.fire({
                    title: 'Detail Item',
                    html: itemDetails,
                    showCloseButton: true,
                });
            });
        });
    });
</script>
