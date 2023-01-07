<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>Investasi Saham | Login</title>

    <!-- manifest meta -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="manifest" href="manifest.json" />

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="assets/img/favicon180.png" sizes="180x180">
    <link rel="icon" href="assets/img/favicon32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="assets/img/favicon16.png" sizes="16x16" type="image/png">

    <!-- Google fonts-->
    <link rel="stylesheet" href="{{ asset('css/test.css') }}" id="style">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <meta name="base_url" content="{{ url('') }}">
    <script src="{{ asset('js/mobile.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="body-scroll d-flex flex-column h-100" data-page="signin">

    <main class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-12 text-center mb-auto px-0">
                <header class="header">
                    <div class="row">
                        <div class="col-auto">
                            <a href="{{ url('/') }}" target="_self" class="btn btn-light btn-44">
                                <i class="bi bi-arrow-left"></i>
                            </a>
                        </div>
                        <div class="col align-self-center">
                            <h5>Sign up</h5>
                        </div>
                        <div class="col-auto">
                            <a class="btn btn-light btn-44 invisible"></a>
                        </div>
                    </div>
                </header>
            </div>
            <div class="col-10 col-md-6 col-lg-5 col-xl-3 mx-auto align-self-center text-center py-4">
                {!! Form::open(['route' => 'save-member', 'method' => 'POST', 'class' => 'was-validated']) !!}
                @if ($message = Session::get('info'))
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @endif
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @endif
                <div class="form-floating is-valid mb-3">
                    {!! Form::text('username', null, ['placeholder' => 'Masukan Username', 'class' => 'form-control', 'required']) !!}
                    <label for="username">Username</label>
                </div>

                <div class="form-floating is-valid mb-3">
                    {!! Form::text('nama_lengkap', null, ['placeholder' => 'Masukan Nama Lengkap', 'class' => 'form-control', 'required']) !!}
                    <label for="emailphone">Nama Lengkap</label>
                </div>
                <div class="form-floating is-valid mb-3">
                    {!! Form::text('no_hp', null, ['placeholder' => 'Masukan No Hp', 'class' => 'form-control', 'required']) !!}
                    <label for="emailphone">No Hp</label>
                </div>
                <div class="form-floating is-valid mb-3">
                    {!! Form::password('password', ['placeholder' => 'Masukan Password', 'class' => 'form-control', 'required']) !!}
                    <label for="password">Password</label>
                </div>
                <div class="form-floating is-valid mb-3">
                    {!! Form::text('kode_referal', null, [
                        'placeholder' => 'Masukan Kode Referal',
                        'class' => 'form-control',
                    ]) !!}
                    <label for="emailphone">Kode Referal</label>
                </div>
                <button type="submit" class="btn btn-lg btn-default w-100 mb-4 shadow">
                    Sign up
                </button>
                {!! Form::close() !!}
            </div>
            <div class="col-12 text-center mt-auto">
                <div class="row justify-content-center footer-info">
                    <div class="col-auto">
                        <p class="text-muted">Or you can continue with </p>
                    </div>
                    <div class="col-auto ps-0">
                        <a href="#" class="p-1"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="p-1"><i class="bi bi-google"></i></a>
                        <a href="#" class="p-1"><i class="bi bi-facebook"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>

</html>
