@extends('template.layouts')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <main class="col-lg-12 ms-sm-auto col-lg-10 px-md-4">
                <div class="container">
                    <div class="mt-5">
                        <form class="d-flex form-inline my-2 my-lg-0">
                            <input style="border-radius: 20px" class="form-control mr-sm-2" type="search" placeholder="Search"
                                aria-label="Search">
                            {{-- <button class="btn btn-sm btn-outline-dark" type="submit">Search</button> --}}
                        </form>
                        <table class="table  table-borderless">
                            <thead>
                                <tr style="color: #FFFFFF">
                                    <th>No. </th>
                                    <th>Nama Venue</th>
                                    <th>Unit</th>
                                    <th>Ukuran (m)</th>
                                    <th>Kapasitas Maksimal (orang)</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = $data1->firstItem(); ?>
                                @foreach ($data1 as $item)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td style="font-weight: bold">{{ $item->nama }}</td>
                                        <td>
                                            <?php
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
                                            ?>
                                        </td>
                                        <td>
                                            {{ $item->panjang }} x {{ $item->lebar }}
                                        </td>
                                        <td>{{ $item->max_kapasitas }}</td>
                                        <td>
                                            <a href="{{ route('venue.destroy', $item->id) }}" class="btn btn-danger btn-sm"
                                                data-confirm-delete="true">Del</a>
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
