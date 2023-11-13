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
                                        <td>
                                            <form onsubmit="return confirm('Yakin hapus data ini?')" class="d-inline"
                                                action="{{ url('pemesanan/' . $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" name="submit"
                                                    class="btn btn-danger btn-sm">Del</button>
                                            </form>
                                            <form onsubmit="return confirm('Yakin hapus data ini?')" class="d-inline"
                                                action="{{ url('/pemesanan/status/' . $item->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" name="status" value="active"
                                                    class="btn btn-success btn-sm">Acc</button>
                                            </form>
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
