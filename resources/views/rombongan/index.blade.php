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
                                    <th>Nama Rombongan</th>
                                    <th>Jumlah Rombongan</th>
                                    <th>No Rekening</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = $data1->firstItem(); ?>
                                @foreach ($data1 as $item)
                                    <tr>
                                        <td style="border-bottom-left-radius: 20px; border-start-start-radius: 20px;">
                                            {{ $i }}</td>
                                        <td style="font-weight: bold">{{ $item->nama_rombongan }}</td>
                                        <td>{{ $item->jumlah_rombongan }}</td>
                                        <td>
                                            {{ $item->no_rekening }} </td>
                                        <td style="border-bottom-right-radius: 20px; border-top-right-radius: 20px">
                                            <form onsubmit="return confirm('Yakin hapus data ini?')" class="d-inline"
                                                action="{{ url('rombongan/' . $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" name="submit"
                                                    class="btn btn-danger btn-sm">Del</button>
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
