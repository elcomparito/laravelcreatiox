@extends('layouts.app')

@section('content-login')

    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="/"><b>Tele</b>práctica</a>
            </div>

            {{-- <div class="card" id="app">
                <user-login-component></user-login-component>
            </div> --}}

            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Iniciar sesión</p>

                    <form action="{{ route('login') }}" method="POST">
                        @csrf

                        <div class="input-group mb-3">
                            <input id="email" placeholder="Email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <input id="password" placeholder="Contraseña" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember">
                                    <label for="remember">
                                        Recordarme
                                    </label>
                                </div>
                            </div>

                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                            </div>
                            <!-- /.col -->

                        </div>
                    </form>

                    <p class="mb-0">
                        <a href="{{ route('register') }}" class="text-center">Registrar</a>
                    </p>
                </div>
                <!-- /.login-card-body -->
            </div>

        </div>
    </body>

@endsection
