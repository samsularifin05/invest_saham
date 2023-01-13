@extends('layouts.member')
@section('title', 'Data Produk')
@section('content')
    <main class="h-100">

        <!-- Header -->
        <header class="header position-fixed">
            <div class="row">
                <div class="col-auto">
                    <a href="javascript:void(0)" target="_self" class="btn btn-light btn-44 menu-btn">
                        <i class="bi bi-list"></i>
                    </a>
                </div>
                <div class="col align-self-center text-center">
                    <div class="logo-small">
                        {{-- <img src="assets/img/logo.png" alt=""> --}}
                        <h5>Investasi Saham</h5>
                    </div>
                </div>
                <div class="col-auto">
                    <a href="notifications.html" target="_self" class="btn btn-light btn-44">
                        <i class="bi bi-bell"></i>
                        <span class="count-indicator"></span>
                    </a>
                </div>
            </div>
        </header>
        <!-- Header ends -->

        <!-- main page content -->
        <div class="main-container container">
            <!-- wallet balance -->

            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-auto">
                            <figure class="avatar avatar-44 rounded-10">
                                <img src="{{ asset('images/user1.jpg') }}" alt="">
                            </figure>
                        </div>
                        <div class="col px-0 align-self-center">
                            <p class="mb-0 text-color-theme"><?= Session::get('datauser')->nama_lengkap ?></p>
                            <p class="text-muted size-12"><?= Session::get('datauser')->no_hp ?></p>
                        </div>
                        <div class="col-auto">
                            <a href="addmoney.html" class="btn btn-44 btn-light shadow-sm">
                                <i class="bi bi-plus-circle"></i>
                            </a>
                            <a href="withdraw.html" class="btn btn-44 btn-default shadow-sm ms-1">
                                <i class="bi bi-arrow-down-circle"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-md-12 mb-4 d-flex justify-content-center align-self-center">
                        <p> Kode Referal &nbsp; <?= Session::get('datauser')->kode_referal ?> </p>
                    </div>
                    <div class="col-6 col-md-6">
                        <div class="card theme-bg text-white border-0 text-center">
                            <div class="card-body">
                                <p >100.00</p>
                                <p >Saldo Diposit</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-6">
                        <a href="{{ url('data-bank') }}" class="card theme-bg text-white border-0 text-center">
                            <div class="card-body">
                                <p >100.00</p>
                                <p >Saldo Penarikan</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- summary -->
            <div class="row mb-3">

                <div class="col-6 col-md-6">
                    <div class="card shadow-sm mb-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto px-0">
                                    <div class="avatar avatar-40 bg-warning text-white shadow-sm rounded-10-end">
                                        <i class="bi bi-star"></i>
                                    </div>
                                </div>
                                <div class="col">
                                    <p class="text-muted size-12 mb-0 mt-3">Menyetorkan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-6">
                    <div class="card shadow-sm mb-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto px-0">
                                    <div class="avatar avatar-40 bg-success text-white shadow-sm rounded-10-end">
                                        <i class="bi bi-cash-stack"></i>
                                    </div>
                                </div>
                                <div class="col">
                                    <p class="text-muted size-12 mb-0 mt-3">Menarik</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <!-- tabs structuTransactionsre -->
            <div class="tab-content" id="assetstabsContent">
                <div class="tab-pane fade show active" id="cards" role="tabpanel">
                    <!-- swiper credit cards -->
                    <!-- Transactions -->

                    <div class="row mb-4">
                        <div class="col-12 px-0">
                            <ul class="list-group list-group-flush bg-none">
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-auto">
                                            <div class="avatar avatar-50 shadow rounded-10 ">
                                                <i class="fs-2 bi bi-person-circle"></i>
                                            </div>
                                        </div>
                                        <div class="col align-self-center ps-0">
                                            <p class="text-color-theme mb-0">Informasi Saya</p>
                                        </div>
                                    </div>
                                </li>

                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-auto">
                                            <div class="avatar avatar-50 shadow rounded-10">
                                                <i class="fs-2 bi bi-credit-card"></i>
                                            </div>
                                        </div>
                                        <div class="col align-self-center ps-0">
                                            <a href="{{ url('data-bank') }}">
                                            <p class="text-color-theme mb-0">Kartu Bank Saya</p>
                                            </a>
                                        </div>

                                    </div>
                                </li>

                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-auto">
                                            <div class="avatar avatar-50 shadow rounded-10">
                                                <i class="fs-2 bi bi-unlock"></i>
                                            </div>
                                        </div>
                                        <div class="col align-self-center ps-0">
                                            <p class="text-color-theme mb-0">Ubah Kata Sandi Masuk</p>
                                        </div>

                                    </div>
                                </li>

                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-auto">
                                            <div class="avatar avatar-50 shadow rounded-10">
                                                <i class="fs-2 bi bi-unlock"></i>
                                            </div>
                                        </div>
                                        <div class="col align-self-center ps-0">
                                            <p class="text-color-theme mb-0">Ubah Kata Sandi Perdagangan</p>
                                        </div>

                                    </div>
                                </li>

                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-auto">
                                            <div class="avatar avatar-50 shadow rounded-10">
                                                <i class="fs-2 bi bi-clock-history"></i>
                                            </div>
                                        </div>
                                        <div class="col align-self-center ps-0">
                                            <p class="text-color-theme mb-0">Catatan Saldo</p>
                                        </div>

                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-auto">
                                            <div class="avatar avatar-50 shadow rounded-10">
                                                <i class="fs-2 bi bi-clipboard-check"></i>
                                            </div>
                                        </div>
                                        <div class="col align-self-center ps-0">
                                            <p class="text-color-theme mb-0">Catatan Setoran</p>
                                        </div>

                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-auto">
                                            <div class="avatar avatar-50 shadow rounded-10">
                                                <i class="fs-2 bi bi-calendar4-event"></i>
                                            </div>
                                        </div>
                                        <div class="col align-self-center ps-0">
                                            <p class="text-color-theme mb-0">Tarik Catatan</p>
                                        </div>

                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-auto">
                                            <div class="avatar avatar-50 shadow rounded-10">
                                                <i class="fs-2 bi bi-cash-coin"></i>
                                            </div>
                                        </div>
                                        <div class="col align-self-center ps-0">
                                            <p class="text-color-theme mb-0">Catatan Penghasilan</p>
                                        </div>

                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="tab-pane fade" id="currency" role="tabpanel" aria-labelledby="currency-tab">
                    <div class="row">
                        <div class="col-12 col-md-6 align-self-center">
                            <div class="chartdoughnut mb-4">
                                <div class="datadisplay text-center shadow">
                                    <h1 class="fw-normal">15.56k</h1>
                                    <p class="text-muted">Expense</p>
                                </div>
                                <canvas id="doughnutchart"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- Transactions -->
                    <div class="row mb-3">
                        <div class="col">
                            <h6 class="title">Currencies</h6>
                        </div>
                        <div class="col-auto">
                            <a href="" class="small">Add Currency</a>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-12 px-0">
                            <ul class="list-group list-group-flush bg-none">
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-auto">
                                            <div class="avatar avatar-50 shadow rounded-10 bg-warning text-white">
                                                <span class="vm d-inline-block">$</span>
                                            </div>
                                        </div>
                                        <div class="col align-self-center ps-0">
                                            <p class="text-color-theme mb-0">US Dollar</p>
                                            <p class="text-muted size-12">USD</p>
                                        </div>
                                        <div class="col align-self-center text-end">
                                            <p class="mb-0 fw-bold">25485.00</p>
                                            <p class="text-muted size-12 text-success">2.4 EUR (0.15%)</p>
                                        </div>
                                    </div>
                                </li>

                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-auto">
                                            <div class="avatar avatar-50 shadow rounded-10 bg-success text-white">
                                                <span class="vm d-inline-block">O</span>
                                            </div>
                                        </div>
                                        <div class="col align-self-center ps-0">
                                            <p class="text-color-theme mb-0">Other</p>
                                            <p class="text-muted size-12">DGC, DRC, FIT</p>
                                        </div>
                                        <div class="col align-self-center text-end">
                                            <p class="mb-0 fw-bold">1001.36</p>
                                            <p class="text-muted size-12 text-success">1.65 USD (0.10%)</p>
                                        </div>
                                    </div>
                                </li>

                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-auto">
                                            <div class="avatar avatar-50 shadow rounded-10">
                                                <img src="{{ asset('images/company6.png') }}" alt="">
                                            </div>
                                        </div>
                                        <div class="col align-self-center ps-0">
                                            <p class="text-color-theme mb-0">BitCoin</p>
                                            <p class="text-muted size-12">BTC</p>
                                        </div>
                                        <div class="col align-self-center text-end">
                                            <p class="mb-0 fw-bold">150.00</p>
                                            <p class="text-muted size-12 text-danger">1.65 USD (0.08%)</p>
                                        </div>
                                    </div>
                                </li>

                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-auto">
                                            <div class="avatar avatar-50 shadow rounded-10">
                                                <img src="{{ asset('images/company7.jpg') }}" alt="">
                                            </div>
                                        </div>
                                        <div class="col align-self-center ps-0">
                                            <p class="text-color-theme mb-0">Etherium</p>
                                            <p class="text-muted size-12">ETH</p>
                                        </div>
                                        <div class="col align-self-center text-end">
                                            <p class="mb-0 fw-bold">146.00</p>
                                            <p class="text-muted size-12 text-success">2.65 USD (0.16%)</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- main page content ends -->
        <script>
            $(document).ready(function() {
                cekPin()
            })
        </script>

    </main>

@stop
