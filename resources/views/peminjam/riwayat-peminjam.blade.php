@extends('peminjam.dashboard-page')
@section('content')

<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-6">
            <h1 class="mb-0 fw-bold">History</h1>
            <br></br>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-end">
                        <div class="col text-end">
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Peminjam</th>
                                    <th scope="col">Buku</th>
                                    <th scope="col">Tanggal Pinjam</th>
                                    <th scope="col">Tanggal Kembali</th>
                                    <th scope="col">Status Peminjaman</th>
                                    <th scope="col">Actions</th> <!-- Tambah kolom untuk tombol aksi -->
                                </tr>
                            </thead>
                            <tbody>
                
                                <tr>
                                    <th scope="row"></th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    </td>
                                    <td></td>
                                    <td>
                                            <button class="btn btn-primary" disabled>Kembalikan</button>
                                    </td>
                                </tr>
                              
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
