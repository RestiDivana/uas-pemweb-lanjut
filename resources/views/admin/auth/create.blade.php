<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Create User |</title>
    <link rel="shortcut icon" href="">
    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="{{url('static/admin/css/style.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('static/admin/css/components.css')}}" />
    <style>
        .form-group img {
            height: 7rem;
            width: 7rem;
            object-fit: cover;
            border-radius: .25rem;
            flex: none;
        }
    </style>
</head>
<body>
<section class="section">
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    @if (Session::has('status'))
                        <div class="alert alert-{{ session('status') }}" role="alert">{{ session('message') }}</div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                        @endforeach
                    </div>
                    @endif
                    <!-- Form Start -->
                    <form class="form-horizontal" action="{{ route('admin.auth.register.process') }}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <!-- Name Input -->
                        <div class="form-group">
                            <label class="col-form-label" for="name">Name</label>
                            <div class="controls">
                                <input class="form-control" id="name" size="16" type="text" name="name" value="{{ old('name') }}" placeholder="Name">
                            </div>
                        </div>
                        <!-- Username and Email Inputs -->
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label class="col-form-label" for="username">Username</label>
                                    <div class="controls">
                                        <input class="form-control" id="username" type="text" name="username" value="{{ old('username') }}" placeholder="Username">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label class="col-form-label" for="email">Email</label>
                                    <div class="controls">
                                        <input class="form-control" id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Password Inputs -->
                        <hr>
                        <small class="text-muted">Change Password</small>
                        <div class="row mt-2">
                            <div class="col-md">
                                <div class="form-group">
                                    <label class="col-form-label" for="password">Password</label>
                                    <div class="controls">
                                        <input class="form-control" id="password" type="password" name="password" placeholder="Password">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label class="col-form-label" for="password_confirmation">Password Confirmation</label>
                                    <div class="controls">
                                        <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" placeholder="Password Confirmation">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Photo and Role Inputs -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="photo">Photo</label>
                                    <div class="d-flex">
                                        <img src="{{ asset('static/admin/img/default.png') }}" alt="photo">
                                        <div class="custom-file ml-3">
                                            <input id="photo" type="file" name="image" class="custom-file-input" onchange="document.querySelector('.form-group img').src = window.URL.createObjectURL(this.files[0])" accept="image/*">
                                            <label class="custom-file-label" for="photo">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select name="role" id="role" class="form-control">
                                        <option disabled @if (!old('role')) selected @endif>Select Role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}" @if (old('role') === $role->name) selected @endif @if ($role->name === 'superadmin') disabled @endif>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- Submit Button -->
                        <div class="mt-4">
                            <a href="{{ route('admin.users.index') }}" class="btn btn-light"><i class="fa fa-arrow-left"></i> Back</a>
                            <button class="btn btn-primary ml-2"><i class="fa fa-save"></i> Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.col-->
    </div>
</div>
</section>
</body>
</html>
