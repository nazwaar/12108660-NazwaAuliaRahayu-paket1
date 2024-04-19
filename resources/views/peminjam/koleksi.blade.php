@extends('peminjam.dashboard-page')

@section('content')
    <div class="container">
        <h2>Koleksi Buku dalam Keranjang</h2><br></br>
        <div class="row">
         
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img class="card-img-top" src="" alt="Card image cap">
                        <div class="card-body">
                            <small class="text-muted text-center d-block">Gramedia - 2015</small>
                            <hr class="sidebar-divider my-0"><br>
                            <h5 class="card-title text-center">Bumi</h5>
                            <p class="card-text text-center">tere liye</p>
                        </div>
                        <div class="card-footer text-center">

                        <form action="" method="">
                            <button type="submit" class="btn btn-danger mr-1">Delete</button>
                        </form>
                            
                                        <form action="" method="">
                                            <input type="hidden" name="buku_id" value="">
                                            <button type="submit" class="btn btn-primary mt-2 btn-sm">Borrow Book</button>
                                        </form>
                        </div>
                    </div>
                </div>
         
        </div>
    </div>
@endsection
