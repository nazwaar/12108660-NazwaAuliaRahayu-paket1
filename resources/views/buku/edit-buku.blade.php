@extends('layouts.master')

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Edit Buku</h1>
  </div>

  <div class="section-body">
    <p class="section-lead"></p>
    <br>
    <form method="" action="" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              <h4>Form Edit Buku</h4>
            </div>
            <div class="card-body">
              <div class="form-group row">
                <label for="judul" class="col-sm-3 col-form-label">Judul</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="judul" value="">
                </div>
              </div>
              <div class="form-group row">
                <label for="penulis" class="col-sm-3 col-form-label">Penulis</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="penulis" value="">
                </div>
              </div>
              <div class="form-group row">
                <label for="penerbit" class="col-sm-3 col-form-label">Penerbit</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="penerbit" value="">
                </div>
              </div>
              <div class="form-group row">
                <label for="tahun_terbit" class="col-sm-3 col-form-label">Tahun Terbit</label>
                <div class="col-sm-5">
                  <input type="number" class="form-control" name="tahun_terbit" value="">
                </div>
              </div>
              <div class="form-group row">
                <label for="kategori_id" class="col-sm-3 col-form-label">Kategori</label>
                <div class="col-sm-5">
                <select name="kategori_id" class="form-control">
              
                    <option value="">
              
                    </option>
              
                </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="cover" class="col-sm-3 col-form-label">Cover</label>
                <div class="col-sm-5">
                  <input type="file" class="form-control" name="cover" value="">
                </div>
              </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </div>
    </div>
    </form>
  </div>
</section>
@endsection
