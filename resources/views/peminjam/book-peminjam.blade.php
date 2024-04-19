@extends('peminjam.dashboard-page')


@section('content')
   
   <div class="row">
       <div class="col-lg-12 mb-4">
           <div class="card-deck">
               <!-- BUKU -->
              
               <div class="col-md-3 mb-4">
                   <div class="card">
                       <img src="" />


                       <div class="card-body">
                           <small class="text-muted text-center d-block">Gramedia - 2015</small>
                           <hr class="sidebar-divider my-0"> <br>
                           <h5 class="card-title text-center">Bumi</h5>
                           <p class="card-text text-center">Tere Liye</p>
                           <a class="nav-link text-center" href=""><span>See Review</span></a>
                       </div>
                       <div class="card-footer">
                           <div class="text-center">
                           
           
                <form action="" method="post">
                    
                    <input type="hidden" name="buku_id" value="">
                    <button type="submit" class="btn btn-primary mt-2 btn-sm">Borrow Book</button>
                </form>

                                        <form action="" method="post">

                                            <input type="hidden" name="buku_id" value="">
                                            <button type="submit" class="btn btn-success mt-2 btn-sm">Add to Collection</button>
                                        </form>
                
                                        <a href="" class="btn btn-info mt-2 btn-sm">Review</a>
                           
                           </div>
                       </div>
                   </div>
               </div>
              
           </div>
       </div>
   </div>
@endsection
