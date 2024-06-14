<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login Administrator</title>
    {{-- <link rel="shortcut icon" href="{{ asset(@$setting->icon) ?? asset('static/admin/img/favicon.png')}}"> --}}

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="{{ url('static/admin/css/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('static/admin/css/components.css') }}" />

</head>

<body>
    <div id="">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="card card-primary">
                            <div class="card-header justify-content-center">
                                <h1>Welcome</h1>
                            </div>
                            <div class="card-body">
                                @if (Session::has('status'))
                                    <div class="alert alert-{{ session('status') }}" role="alert">
                                        {{ session('message') }}</div>
                                @endif
                                @if ($errors->any())
                                    <div class="alert alert-danger" role="alert">
                                        @foreach ($errors->all() as $error)
                                            <p>{{ $error }}</p>
                                        @endforeach
                                    </div>
                                @endif
                                <!-- Login Form -->
                                <p>Masukkan Email kamu yang terdaftar</p>
                                <form method="POST" action="{{ route('password.email') }}" class="needs-validation">
                                    @csrf
                                    <div class="form-group">
                                        <label class="mb-10" for="name">Email </label>
                                        <input id="email"
                                            class="web form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                            type="text" name="email" value="{{ old('email') }}" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-10" for="Password">New Password</label>
                                        <input id="Password"
                                            class="Password form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                            type="password" name="password">
                                    </div>
                                    <div class="form-group">

                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            submit
                                        </button>
                                    </div>
                                </form>
                                <!-- End Login Form -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>




</body>

</html>
