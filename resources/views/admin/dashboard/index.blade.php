@extends('layouts.index')
@section('content')
@section('title', 'Dashboard')

<div class="row">
    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3> <?= $data['dataMember'] ?> </h3>
                <p>Total Member AKtif</p>
            </div>
            <div class="icon">
                <i class="nav-icon  fas fa-box-archive"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>3</h3>

                <p>Menunggu Konfirmasi Pembayaran</p>
            </div>
            <div class="icon">
                <i class="nav-icon  fas fa-box-archive"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>2</h3>
                <p>Total Member Aktif Transaksi</p>
            </div>
            <div class="icon">
                <i class="nav-icon  fas fa-box-archive"></i>
            </div>
        </div>
    </div>

</div>

@stop
