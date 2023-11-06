@extends('template.layouts')

@section('content')

<div class="container">
        <div class="row justify-content-center">
            <main class="col-lg-8 ">
                <div class="mt-5">
                    <form action="{{ url('rombongan') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex">
                            <div class="col-lg-6">
                                <div class=" mb-3">
                                    <label style="color: #F5F5F5" for="nama_rombongan">Nama Rombongan</label>
                                    <input type="text" class="form-control" id="nama_rombongan" name="nama_rombongan"
                                        required>
                                </div>
                                <div class=" mb-3">
                                    <label style="color: #F5F5F5" for="jumlah_rombongan">Jumlah Rombongan</label>
                                    <input type="number" class="form-control" id="jumlah_rombongan"
                                        name="jumlah_rombongan" required>
                                </div>
                            </div>
                            <div class="col-lg-6 ms-3">
                                <div class=" mb-3">
                                    <label style="color: #F5F5F5" for="no_rekening">No. Rekening</label>
                                    <input type="text" class="form-control" id="no_rekening" name="no_rekening"
                                        required>
                                </div>
                                <div class=" mb-3">
                                    <label style="color: #F5F5F5" for="bukti_transfer">Bukti Transfer</label>
                                    <input type="file" class="form-control" id="bukti_transfer"
                                        name="bukti_transfer">
                                </div>
                            </div>
                        </div>
                        <div class=" mb-3">
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button type="submit" class="btn"
                                    style="background-color: #E5ECFF;color: #3A467E;border-radius: 20px">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>

    @endsection
