@extends('layouts.master')
@section('content')


<section class="section">
    <div class="section-header">
        <h3 class="section-title">Data Account Petugas<a href="" title="Tambah Data"
                style="float: right; margin-right: 2%" class="btn btn-primary mr-1">Tambah Data</a></h3>
        <table id="data-admin" class="table table-striped table-bordered table-md"
            style="width: 100%; margin-top:5%; padding:2%;" cellspacing="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Action</th>
                   
                </tr>
            </thead>
            <tbody>
            

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <a href="" class="btn btn-primary mr-1">Edit Data</a>
                        <a href="" class="btn btn-danger mr-1">Delete Data</i></a>
                    </td>
                    
                </tr>
                
            </tbody>
        </table>
    </div>
</section>
<script src="../../assets/admin/dataTables/js/jquery.dataTables.min.js"></script>
<script src="../../assets/admin/dataTables/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#data-admin').DataTable({
            "iDisplayLength": 25
        });
    });

</script>


@endsection
