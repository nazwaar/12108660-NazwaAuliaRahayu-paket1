@extends('layouts.master')
@section('content')

<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-6">
            <h1 class="mb-0 fw-bold">History</h1>
            <br></br>
        </div>
    </div>
</div>

<form action="{{route('pinjamExcel')}}" method="get">
                    @csrf
                    <input name="search" value="{{request('search')}}" type="text" hidden>
                    <button type="submit" class="btn-terima" style="font-size: 13px;">
                        <i class="fa-solid fa-download" style="margin-right: 10px;"></i> Export Excel
                    </button>
                </form>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-end">
                        <div class="col text-end">
                        </div>
                    </div>
                    <div class="table-responsive">
                    <form action="{{route('dataPeminjaman')}}" method="GET">
                    <div class="input-group">
                        <div class="form-outline" data-mdb-input-init>
                          <input type="search" value="{{ request('search') }}" style="font-size: 14px; width: 400px;" name="search" id="search" class="form-control" placeholder="Cari buku pilihan anda disini .." />
                        </div>
                        <button type="button" class="btn btn-primary" data-mdb-ripple-init>
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                </form>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Peminjam</th>
                                    <th scope="col">Buku</th>
                                    <th scope="col">Tanggal Pinjam</th>
                                    <th scope="col">Tanggal Kembali</th>
                                    <th scope="col">Status Peminjaman</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;?>
                                @foreach($peminjaman as $peminjaman)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $peminjaman->user->username }}</td>
                                    <td>{{ $peminjaman->buku->judul }}</td>
                                    <td>{{ $peminjaman->tanggal_peminjaman }}</td>
                                    <td>
                                        @if ($peminjaman->status_peminjaman == 'dipinjam')
                                            {{ $peminjaman->tanggal_pengembalian }}
                                        @else
                                            {{ $peminjaman->tanggal_pengembalian }}
                                        @endif
                                    </td>
                                    <td>{{ $peminjaman->status_peminjaman }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
