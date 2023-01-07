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
        <div class="row h-100 overflow-auto">
            <div class="col-12 text-center mb-auto px-0">
                <header class="header">
                    <div class="row">
                        <div class="col-auto"></div>
                        <div class="col">
                            <div class="logo-small">
                                <h5>Investasi Saham</h5>
                            </div>
                        </div>
                        <div class="col-auto"></div>
                    </div>
                </header>
            </div>
            <div class="col-10 col-md-6 col-lg-5 col-xl-3 mx-auto align-self-center text-center py-4">
                <h1 class="mb-4 text-color-theme">Sign in</h1>
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
                {!! Form::open([
                    'route' => 'cek-login-member',
                    'method' => 'POST',
                    'class' => 'was-validated needs-validation',
                    'autocomplete' => 'off',
                ]) !!}
                <div class="form-group form-floating mb-3 is-valid">
                    {!! Form::text('username', null, ['placeholder' => 'Masukan Username', 'class' => 'form-control', 'required']) !!}
                    <label class="form-control-label" for="email">Username</label>
                </div>

                <div class="form-group form-floating is-valid mb-3">
                    {!! Form::password('password', ['placeholder' => 'Masukan Password', 'class' => 'form-control', 'required']) !!}
                    <label class="form-control-label" for="password">Password</label>
                </div>
                <p class="mb-3 text-center">
                    <a href="forgot-password.html" class="">
                        Forgot your password?
                    </a>
                </p>

                <button type="submit" class="btn btn-lg btn-default w-100 mb-4 shadow">
                    Sign in
                </button>
                {!! Form::close() !!}
                <p class="mb-2 text-muted">Don't have account?</p>
                <a href="{{ route('daftar-member') }}" target="_self" class="">
                    Sign up <i class="bi bi-arrow-right"></i>
                </a>

            </div>
        </div>
    </main>


    <!-- Required jquery and libraries -->

</body>

</html>
