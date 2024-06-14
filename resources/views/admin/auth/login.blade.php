<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login Administrator</title>
    <link rel="shortcut icon" href="{{ asset(@$setting->icon) ?? asset('static/admin/img/favicon.png') }}">

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
    <div id="app">
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
                                <form method="POST" action="#" class="needs-validation" novalidate="">
                                    @csrf
                                    <div class="form-group">
                                        <label class="mb-10" for="name">Username </label>
                                        <input id="name"
                                            class="web form-control {{ $errors->has('username') ? 'is-invalid' : '' }}"
                                            type="text" name="username" value="{{ old('username') }}" autofocus>

                                    </div>
                                    <div class="form-group">
                                        <label class="mb-10" for="Password">Password </label>
                                        <input id="Password"
                                            class="Password form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                            type="password" name="password">

                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="remember" class="custom-control-input"
                                                tabindex="3" id="remember-me"
                                                {{ old('remember') ? 'checked' : '' }} />
                                            <label class="custom-control-label" for="remember-me">Remember Me</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Login
                                        </button>
                                    </div>

                                </form>
                                <!-- End Login Form -->

                                <!-- Register Form -->
                                <div class="text-center mt-4">
                                    <p>Don't have an account? <a href="{{ route('admin.auth.register') }}">Register
                                            Here</a></p>
                                    <p>Forgot your password? <a href="{{ route('password.request') }}">Reset
                                            Password</a></p>
                                </div>

                                <!-- End Register Form -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- jquery -->
    <script src="{{ url('static/website/js/jquery-3.3.1.min.js') }}"></script>

    <!-- plugins-jquery -->
    <script src="{{ url('static/website/js/plugins-jquery.js') }}"></script>

    <!-- plugin_path -->
    <script>
        var plugin_path = '{{ url('static/website/js/') }}/';
        console.log(plugin_path);
    </script>

    <!-- custom -->
    <script src="{{ url('static/website/js/custom.js') }}"></script>


</body>

</html>
