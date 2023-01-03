<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Investasi Jangka Panjang | Daftar Member</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base_url" content="{{ url('') }}">
    <script src="{{ asset('js/app.js') }}"></script>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-body">
                <p class="login-box-msg">Daftar Akun Baru</p>
                @if ($message = Session::get('info'))
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        {{ $message }}
                    </div>
                @endif

                {!! Form::open(['route' => 'save-member', 'method' => 'POST']) !!}
                <div class="input-group mb-3">
                    {!! Form::text('username', null, ['placeholder' => 'Masukan Username', 'class' => 'form-control', 'required']) !!}
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    {!! Form::text('no_hp', null, ['placeholder' => 'Masukan No Hp', 'class' => 'form-control', 'required']) !!}
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-phone"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    {!! Form::text('nama_lengkap', null, ['placeholder' => 'Masukan Nama Lengkap', 'class' => 'form-control', 'required']) !!}
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user-tie"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    {!! Form::text('alamat_lengkap', null, ['placeholder' => 'Masukan Alamat Lengkap', 'class' => 'form-control', 'required']) !!}
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-location-dot"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    {!! Form::password('password', ['placeholder' => 'Masukan Password', 'class' => 'form-control', 'required']) !!}
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                    </div>

                </div>
                {!! Form::close() !!}

                <p class="mt-3">
                    <a href="{{ route('login-member') }}" class="text-center">I already have a membershipip</a>
                </p>
            </div>
        </div>
    </div>
</body>

</html>
