@extends('layouts.member')
@section('title', 'Data Bank')
@section('content')
    <main class="h-100">


        <header class="header position-fixed">
            <div class="row">
                <div class="col-auto">
                    <a href="javascript:void(0)" target="_self" class="btn btn-light btn-44 menu-btn">
                        <i class="bi bi-list"></i>
                    </a>
                </div>
                <div class="col align-self-center text-center">
                    <div class="logo-small">
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
        <div class="main-container container">

            <div class="row mb-3">
                <div class="col">
                    <h6 class="title">Produk Stabil</h6>
                </div>
            </div>
            <ul class="nav nav-pills nav-justified tabs mb-3" id="assetstabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#cards"
                        type="button" role="tab" aria-controls="cards" aria-selected="true">Cards</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="currency-tab" data-bs-toggle="tab" data-bs-target="#currency"
                        type="button" role="tab" aria-controls="currency" aria-selected="false">Currency</button>
                </li>
            </ul>
            <div class="tab-content" id="assetstabsContent">
                <div class="tab-pane fade show active" id="cards" role="tabpanel" >
                    <!-- swiper credit cards -->
                    <div class="row mb-3">
                        <div class="col-12 px-0">
                            <div class="swiper-container cardswiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="card dark-bg">
                                            <div class="card-body">
                                                <div class="row mb-3">
                                                    <div class="col-auto align-self-center">
                                                        <img src="assets/img/masterocard.png" alt="">
                                                    </div>
                                                    <div class="col align-self-center text-end">
                                                        <p class="small">
                                                            <span class="text-uppercase size-10">Validity</span><br>
                                                            <span class="text-muted">06/25</span>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h4 class="fw-normal mb-2">
                                                            56040.00
                                                            <span class="small text-muted">USD</span>
                                                        </h4>
                                                        <p class="mb-0 text-muted size-12">10141 0021 0001 0154</p>
                                                        <p class="text-muted size-12">Debit Card</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card theme-radial-gradient border-0">
                                            <div class="card-body">
                                                <div class="row mb-3">
                                                    <div class="col-auto align-self-center">
                                                        <i class="bi bi-wallet2"></i> Wallet
                                                    </div>
                                                    <div class="col align-self-center text-end">
                                                        <p class="small">
                                                            <span class="text-uppercase size-10">Validity</span><br>
                                                            <span class="text-muted">Unlimited</span>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h4 class="fw-normal mb-2">
                                                            100.00
                                                            <span class="small text-muted">USD</span>
                                                        </h4>
                                                        <p class="mb-0 text-muted size-12">10141 0021 0001 0154</p>
                                                        <p class="text-muted size-12">Debit Card</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row mb-3">
                                                    <div class="col-auto align-self-center">
                                                        <img src="assets/img/masterocard.png" alt="">
                                                    </div>
                                                    <div class="col align-self-center text-end">
                                                        <p class="small">
                                                            <span class="text-uppercase size-10">Validity</span><br>
                                                            <span class="text-muted">09/24</span>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h4 class="fw-normal mb-2">
                                                            150540.00
                                                            <span class="small text-muted">USD</span>
                                                        </h4>
                                                        <p class="mb-0 text-muted size-12">10141 0021 0001 0154</p>
                                                        <p class="text-muted size-12">Debit Card</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Transactions -->
                    <div class="row mb-3">
                        <div class="col">
                            <h6 class="title">Transactions</h6>
                        </div>
                        <div class="col-auto">
                            <a href="" class="small">Add Card</a>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-12 px-0">
                            <ul class="list-group list-group-flush bg-none">
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-auto">
                                            <div class="avatar avatar-50 shadow rounded-10 ">
                                                <img src="assets/img/company4.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="col align-self-center ps-0">
                                            <p class="text-color-theme mb-0">Zomato</p>
                                            <p class="text-muted size-12">Food</p>
                                        </div>
                                        <div class="col align-self-center text-end">
                                            <p class="mb-0">-25.00</p>
                                            <p class="text-muted size-12">Debit Card 4545</p>
                                        </div>
                                    </div>
                                </li>

                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-auto">
                                            <div class="avatar avatar-50 shadow rounded-10">
                                                <img src="assets/img/company5.png" alt="">
                                            </div>
                                        </div>
                                        <div class="col align-self-center ps-0">
                                            <p class="text-color-theme mb-0">Uber</p>
                                            <p class="text-muted size-12">Travel</p>
                                        </div>
                                        <div class="col align-self-center text-end">
                                            <p class="mb-0">-26.00</p>
                                            <p class="text-muted size-12">Debit Card 4545</p>
                                        </div>
                                    </div>
                                </li>

                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-auto">
                                            <div class="avatar avatar-50 shadow rounded-10">
                                                <img src="assets/img/company1.png" alt="">
                                            </div>
                                        </div>
                                        <div class="col align-self-center ps-0">
                                            <p class="text-color-theme mb-0">Starbucks</p>
                                            <p class="text-muted size-12">Food</p>
                                        </div>
                                        <div class="col align-self-center text-end">
                                            <p class="mb-0">-18.00</p>
                                            <p class="text-muted size-12">Cash</p>
                                        </div>
                                    </div>
                                </li>

                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-auto">
                                            <div class="avatar avatar-50 shadow rounded-10">
                                                <img src="assets/img/company3.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="col align-self-center ps-0">
                                            <p class="text-color-theme mb-0">Walmart</p>
                                            <p class="text-muted size-12">Clothing</p>
                                        </div>
                                        <div class="col align-self-center text-end">
                                            <p class="mb-0">-105.00</p>
                                            <p class="text-muted size-12">Wallet</p>
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
                                                <img src="assets/img/company6.png" alt="">
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
                                                <img src="assets/img/company7.jpg" alt="">
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

    </main>
@stop
