@extends('template.lte')

@section('header')
    Rombongan
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
                                            <a href="{{ route('rombongan.destroy', $item->id) }}"
                                                class="btn btn-danger btn-sm" data-confirm-delete="true">Del</a>
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
