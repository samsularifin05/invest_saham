@extends('layouts.index')
@section('title', 'Data User')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data User</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h3 class="card-title">List Data User</h3>
                    </div>
                    <div class="col-6 text-right">
                        <a onclick="showModalUsers(this)" href="javascript:;"
                            class="btn btn-sm btn-icon btn-circle btn-primary"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="tbl_data_users" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Level</th>
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
    @include('admin/datauser/create')

    <script>
        $(document).ready(function() {
            getDataUsers()
        })
    </script>
@stop
