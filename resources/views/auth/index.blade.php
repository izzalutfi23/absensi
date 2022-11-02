<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Login - Absensi</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('image/favicon.ico') }}">
    <link href="{{ asset('gymove/css/style.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h1 class="text-center">Login</h1> 
                                    <h4 class="text-center mb-4 text-info">Sign in your account</h4>
                                    @if ($message = Session::get('status'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>GAGAL</strong> {{$message}}
                                    </div>
                                    @endif
                                    <form action="{{ route('login.post') }}" method="POST">
                                    @csrf
                                        <div class="form-group">
                                            <label class="mb-1 text-dark"><strong>Email</strong></label>
                                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Masukkan email">
                                            @error('email')
                                            <div class="form-text text-danger small">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-dark"><strong>Password</strong></label>
                                            <input type="password" name="password" class="form-control" placeholder="Masukkan password">
                                            @error('password')
                                            <div class="form-text text-danger small">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                               <div class="custom-control custom-checkbox ml-1 text-dark">
													<input type="checkbox" class="custom-control-input" id="basic_checkbox_1">
													<label class="custom-control-label" for="basic_checkbox_1">Remember my preference</label>
												</div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn bg-secondary text-white btn-block">Sign In</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('gymove/vendor/global/global.min.js') }}"></script>
	<script src="{{ asset('gymove/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('gymove/js/custom.min.js') }}"></script>
    <script src="{{ asset('gymove/js/deznav-init.js') }}"></script>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

</body>

</html>