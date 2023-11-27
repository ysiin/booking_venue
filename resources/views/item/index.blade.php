@extends('template.lte')

@section('header')
    Item
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
                                    <th>Nama Item</th>
                                    <th>Quantity</th>
                                    <th>Harga (/item)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = $data1->firstItem(); ?>
                                @foreach ($data1 as $item)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $item->nama_item }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>Rp. {{ number_format($item->harga) }}</td>
                                        <td>
                                            <a href="{{ route('item.destroy', $item->id) }}" class="btn btn-danger btn-sm"
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
