<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vafactory | Login</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base_url" content="{{ url('') }}">
    <script src="{{ asset('js/app.js') }}"></script>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-body">
                <p class="login-box-msg">Selamat Datang Member</p>
                @if ($message = Session::get('info'))
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        {{ $message }}
                    </div>
                @endif


                {!! Form::open(['route' => 'cek-login-member', 'method' => 'POST']) !!}
                <div class="input-group mb-3">
                    {!! Form::text('username', null, ['placeholder' => 'Masukan Username', 'class' => 'form-control', 'required']) !!}
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
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
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</body>

</html>
