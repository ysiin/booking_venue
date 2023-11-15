@extends('template.layouts')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <main class="col-lg-12 ms-sm-auto col-lg-10 px-md-4">
                <div class="container">
                    <div class="mt-5">
                        <table class="table  table-borderless">
                            <thead>
                                <tr style="color: #FFFFFF">
                                    <th>No. </th>
                                    <th>Nama Venue</th>
                                    <th>Unit</th>
                                    <th>Nama Rombongan</th>
                                    <th>Tanggal Sewa</th>
                                    <th>Jam Mulai</th>
                                    <th>Jam Selesai</th>
                                    <th>Status</th>
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
                                            <a href="{{ route('pemesanan.destroy', $item->id) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">Del</a>
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
