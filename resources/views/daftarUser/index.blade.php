@extends('template.layouts')

@section('content')
    <div class="container-fluid">
        <div class="ro">
            <div class="col-lg-12 ms-sm-auto col-lg-10 px-md-4">
                <div class="container">
                    <div class="mt-5">
                        <table class="table  table-borderless">
                            <thead>
                                <tr style="color: #FFFFFF">
                                    <th>No. </th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = $data1->firstItem(); ?>
                                @foreach ($data1 as $item)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{$item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->role }}</td>
                                        <td>
                                            <a href="{{ route('user.destroy', $item->id) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">Del</a>
                                        </td>
                                    </tr>
                                @endforeach
                                <?php $i++; ?>
                            </tbody>
                        </table>
                        {{ $data1->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection