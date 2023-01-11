@extends('layouts.member')
@section('title', 'Home')
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
            <div class="row">
                @foreach ($dataproduk as $item)
                    <div class="col-12 col-md-6 col-lg-4">
                        <a href="#" class="card mb-3" onclick="showModalQty('{{ $item }}')" href="javascript:;"
                            data-bs-target="#modalAddQty">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-auto d-flex justify-content-center align-self-center">
                                        <div class="avatar avatar-60 shadow-sm rounded-10 coverimg">
                                            <img src="{{ url('storage/images/' . $item->image . '') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col align-self-center ps-0">
                                        <p class="text-color-theme mb-1">{{ $item->nama_produk }}</p>
                                        <p class="text-muted size-12">Penghasilan : {{ $item->masa_kontrak }} Hari</br>
                                            Harga Investasi : {{ number_format($item->harga_produk) }} </br> Jumlah
                                            Pemasukan : {{ number_format($item->total_keuntungan) }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        @include('member/home/modal')

    </main>
@stop
