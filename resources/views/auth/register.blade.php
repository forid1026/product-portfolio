<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Admin Login </title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="Admin Dashboard">

    <meta name="msapplication-tap-highlight" content="no">
    <link href="{{ asset('admin-backend/assets/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow">
        <div class="app-container">
            <div class="h-100 bg-premium-dark">
                <div class="d-flex h-100 justify-content-center align-items-center">
                    <div class="mx-auto app-login-box col-md-8">
                        <div class="app-logo-inverse mx-auto mb-3"></div>
                        <div class="modal-dialog w-100">
                            <div class="modal-content">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="modal-body">
                                        <h5 class="modal-title">
                                            <h4 class="mt-2 text-center">
                                                <div>Welcome,</div>
                                                <span>It only takes a <span class="text-success">few seconds</span> to
                                                    create your account</span>
                                            </h4>
                                        </h5>
                                        <div class="divider row"></div>
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <input name="email" id="email" placeholder="Email here..."
                                                        type="email" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <input type="text" id="name" name="name"
                                                        placeholder="Name here..." type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <input name="password" id="password" placeholder="Password here..."
                                                        type="password" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <input name="password_confirmation" id="password_confirmation"
                                                        placeholder="Repeat Password here..." type="password"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-3 position-relative form-check">
                                            <input name="check" id="exampleCheck" type="checkbox"
                                                class="form-check-input">
                                            <label for="exampleCheck" class="form-check-label">Accept our <a
                                                    href="javascript:void(0);">Terms and Conditions</a>.</label>
                                        </div>
                                        <div class="divider row"></div>
                                        <h6 class="mb-0">Already have an account?
                                            <a href="{{ route('login') }}" class="text-primary">Sign in</a> | <a
                                                href="{{ route('password.request') }}" class="text-primary">Recover
                                                Password</a>
                                        </h6>
                                    </div>
                                    <div class="modal-footer d-block text-center">
                                        <button
                                            class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg">Create
                                            Account</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="text-center text-white opacity-8 mt-3">Copyright © Nebula IT 2023</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('admin-backend/assets/scripts/main.js') }}"></script>
</body>

</html>
