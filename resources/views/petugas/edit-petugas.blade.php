@extends('layouts.master')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Create Account Petugas</h1>
    </div>

    <div class="section-body">
      <p class="section-lead"></p>
      <br>
      <form method="" action="" enctype="multipart/form-data">   
        
        <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              <h4>Form Petugas</h4>
            </div>
            <div class="card-body">
              <div class="form-group row">
                <label for="username" class="col-sm-3 col-form-label">Username</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="username" value="" >
                </div>
              </div>
              <div class="form-group row">
                <label for="password" class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-5">
                  <input type="password" class="form-control" name="password" value="">
                </div>
              </div>
              <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-5">
                  <input type="email" class="form-control" name="email" value="">
                </div>
              </div>
              <div class="form-group row">
                <label for="nama_lengkap" class="col-sm-3 col-form-label">Nama Lengkap</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nama_lengkap" value="">
                </div>
              </div>
              <div class="form-group row">
                <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="alamat" value="">
                </div>
              </div>
               <!-- Dropdown untuk memilih peran -->
               <div class="form-group row">
                <label for="role" class="col-sm-3 col-form-label">Role</label>
                <div class="col-sm-5">
                  <select class="form-control" id="role" name="role" required>
                    <option value="petugas">Petugas</option>
                    <option value="peminjam">Peminjam</option>
                  </select>
                </div>
               </div>

            </div>
            <div class="card-footer text-right">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</section>
@endsection