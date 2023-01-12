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
                <div class="col-6">
                    <h6 class="title">Data Bank</h6>
                </div>
                <div class="col-6 d-flex justify-content-end" data-bs-toggle="modal" data-bs-target="#modalBank">
                    Tambah Bank
                </div>
            </div>

            <div class="row" id="content-data-bank">



            </div>
        </div>
        @include('member/databank/modal')

        </div>

        <script>
            $(document).ready(function() {
                getDataBank()
            })
        </script>
    </main>
@stop
