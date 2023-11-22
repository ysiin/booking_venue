@extends('template.lte')

@section('header')
    Pemesanan Pending
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
                                            <a href="{{ url('pemesanan/destroyPending', $item->id) }}"
                                                class="btn btn-danger btn-sm" data-confirm-delete="true">Del</a>
                                            <form class="d-inline" action="{{ route('updateStatus' , $item->id) }}" method="POST" id="updateStatus">
                                                @csrf
                                                @method('PUT')
                                                <button type="button" onclick="confirmUpdate()" name="status" value="approved"
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    function confirmUpdate() {
            Swal.fire({
                title: 'Verifikasi Data Pemesanan!',
                text: "Yakin verifikasi data pemesanan ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If the user clicks "OK", submit the form
                    document.getElementById('updateStatus').submit();
                }
            });
        }
</script>