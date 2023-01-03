@extends('layouts.index')
@section('title', 'Data Member')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Member</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h3 class="card-title">List Data Member</h3>
                    </div>
                    <div class="col-6 text-right">
                        <a onclick="showModalMember(this)" href="javascript:;"
                            class="btn btn-sm btn-icon btn-circle btn-primary"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="tbl_data_member" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Nama Lengkap</th>
                            <th>No Hp</th>
                            <th>No Rekening</th>
                            <th>ALamat</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </section>
    @include('admin/datamember/create')

    <script>
        $(document).ready(function() {
            getDataMember()
        })
    </script>
@stop
