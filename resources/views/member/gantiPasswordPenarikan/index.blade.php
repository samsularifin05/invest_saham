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
                        <h5>Setting Password Penarikan</h5>
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

        <div class="container">
            <form method="POST" id="form_setting_password_penarikan" onsubmit="simpanPasswordPenarikan(event)">
               <div class="row">
                <div class="col-12">
                    <label> PIN Penarikan  </label>
                    <input class="form-control" id="pin" autocomplete="off" type="password" name="pin"
                        placeholder="Masukan Pin" required>
                </div>
                <div class="col-12 mt-4">
                    <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-block"> Simpan </button>
                    </div>
                </div>
               </div>
            </form>
        </div>

    </main>
@stop
