@extends('layouts.index')
@section('title', 'Data Produk')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Produk</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h3 class="card-title">List Data Produk</h3>
                    </div>
                    <div class="col-6 text-right">
                        <a onclick="showModalProduk(this)" href="javascript:;"
                            class="btn btn-sm btn-icon btn-circle btn-primary"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="tbl_data_produk" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Harga Produk</th>
                            <th>Keuntungan Harian</th>
                            <th>Total Keuntungan</th>
                            <th>Masa Kontrak</th>
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
    @include('admin/dataproduk/create')

    <script>
        $(document).ready(function() {
            getDataProduk()
        })
    </script>
@stop
