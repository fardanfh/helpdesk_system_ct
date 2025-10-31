<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>PIC Login</title>
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <style>
        body { background: #f7f9fb; }
        .login-wrapper { min-height: 100vh; display:flex; align-items:center; }
        .card { box-shadow: 0 6px 20px rgba(86, 96, 148, 0.08); }
    </style>
</head>

<body>
    <div class="container login-wrapper">
        <div class="row justify-content-center w-100">
            <div class="col-12 col-sm-10 col-md-6 col-lg-4">
                <div class="text-center mb-4">
                    <img src="{{ asset('assets/images/logo-dark.svg') }}" alt="Logo" style="height:48px;" />
                </div>
                <div class="card">
                    <div class="card-body p-4">
                        <h4 class="mb-3">PIC Sign in</h4>

                        @if($errors->any())
                            <div class="alert alert-danger">{{ $errors->first() }}</div>
                        @endif

                        <form method="POST" action="{{ route('pic.login.post') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input id="username" name="username" value="{{ old('username') }}" class="form-control" required autofocus />
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input id="password" name="password" type="password" class="form-control" required />
                            </div>

                            <div class="d-grid mb-2">
                                <button class="btn btn-primary" type="submit">Login as PIC</button>
                            </div>

                            <div class="text-center small text-muted">Use your PIC credentials to sign in.</div>
                        </form>
                    </div>
                </div>
                <div class="text-center mt-3 small text-muted">
                    © {{ date('Y') }} Helpdesk
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
</body>

</html>
