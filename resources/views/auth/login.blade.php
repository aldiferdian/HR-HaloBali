@extends('admin.layouts.app')

@section('content')
    <link rel="shortcut icon" href="{{ asset('assets/media/favicons/favicon.png') }}" />
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/media/favicons/favicon-192x192.png') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/media/favicons/apple-touch-icon-180x180.png') }}" />

    <!-- Stylesheets -->
    <!-- Codebase framework -->
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/codebase.min.css') }}" />

    <!-- Stylesheets -->
    <!-- Codebase framework -->
    <link rel="stylesheet" id="css-main" href="assets/css/codebase.min.css" />
    <div id="page-container" class="main-content-boxed">
        <!-- Main Container -->
        <main id="main-container">
            <!-- Page Content -->
            <div class="bg-body-dark">
                <div class="hero-static content content-full px-1">
                    <div class="row mx-0 justify-content-center">
                        <div class="col-lg-8 col-xl-6">
                            <!-- Header -->

                            <!-- END Header -->

                            <!-- Sign In Form -->
                            <!-- jQuery Validation functionality is initialized with .js-validation-signin class in js/pages/op_auth_signin.min.js which was auto compiled from _js/pages/op_auth_signin.js -->
                            <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                            <form class="js-validation-signin" action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="block block-themed block-rounded block-fx-shadow">
                                    <div class="block-header border-bottom border-2 border-scondary bg-white">
                                        <a class="fw-bold">
                                            <i class="fa"></i>
                                            <span class="fs-4">Please</span> <span class="fs-4">Login</span>
                                        </a>
                                        {{-- <h3 class="block-title">Please Sign In</h3> --}}
                                    </div>
                                    <div class="py-4 text-center">
                                        <div class="mb-1 mt-1">
                                            <center><img class="justify-content-center" alt="Logo"
                                                    src="{{ asset('Login.png') }}" width="150px" /></center>

                                        </div>
                                        <div class="py-2 text-center">
                                            <h1 class="h5 fw-bold mt-2 mb-1">
                                                Welcome to Your Dashboard
                                            </h1>
                                        </div>
                                        <div class="block-content">
                                            <div class="form-floating mb-4">
                                                <input type="text" class="form-control" id="login-username"
                                                    name="username" placeholder="Enter your username" />
                                                <label class="form-label" for="login-username">Username</label>
                                            </div>
                                            <div class="form-floating mb-4">
                                                <input type="password" class="form-control" id="login-password"
                                                    name="password" placeholder="Enter your password" />
                                                <label class="form-label" for="login-password">Password</label>

                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 d-sm-flex align-items-center push">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="login-remember-me" name="login-remember-me" />
                                                        <label class="form-check-label" for="login-remember-me">Remember
                                                            Me</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 text-sm-end push">
                                                    <button type="submit" class="btn btn-lg btn-alt-primary fw-medium">
                                                        Sign In
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </form>
                            <!-- END Sign In Form -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->
    </div>
    <!-- END Page Container -->
    <script src="{{ asset('assets/js/codebase.app.min.js') }}"></script>

    <!-- jQuery (required for jQuery Validation plugins) -->
    <script src="{{ asset('assets/js/lib/jquery.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('assets/js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('assets/js/pages/op_auth_signin.min.js') }}"></script>
@endsection
