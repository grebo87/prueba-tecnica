<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Tareas')</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<br>
<br>
    <div class="form-signin w-100 m-auto col-6">
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Ingreso al Sistema</p>

                <form method="post" action="{{ route('login') }}">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" class="form-control">
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" name="password" placeholder="Password" class="form-control">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
                        </div>

                    </div>
                </form>


                <!-- /.login-card-body -->
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

</body>

</html>
