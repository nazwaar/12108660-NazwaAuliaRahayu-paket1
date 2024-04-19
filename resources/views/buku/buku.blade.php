@extends('layouts.master')
@section('content')

<section class="section">
    <div class="section-header">
        <h3 class="section-title">BOOK Collection
            <a href="" title="Tambah Data" style="float: right; margin-right: 2%"
                class="btn btn-primary mr-1">Tambah Buku</a>
        </h3>
        <table id="data-admin" class="table table-striped table-bordered table-md" style="width: 100%; margin-top:5%; padding:2%;" cellspacing="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Cover</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Tahun Terbit</th>
                    <th>Category</th>
                    <!-- <th>Status</th> -->
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td style="width: 100px;"><img src="" class="img-fluid" alt="" style="width: 100%;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <a href="" class="btn btn-primary mr-1">
                            <i class="fas fa-edit">Edit</i>
                        </a>
                        <a href="" class="btn btn-danger mr-1">
                            <i class="fas fa-trash-alt">Delete</i>
                        </a>
                    </td>
                </tr>
                
            </tbody>
        </table>
    </div>
</section>
<script src="{{ asset('assets/admin/dataTables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/admin/dataTables/js/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#data-admin').DataTable({
            "iDisplayLength": 25
        });
    });

</script>

@endsection
