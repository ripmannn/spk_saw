<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pengguna</title>
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <style>
        body {
            background-color: #f4f4f4;
            min-height: 100vh;
        }

        .login-container {
            max-width: 400px;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            width: 100%;
            padding: 32px 24px;
        }

        @media (min-width: 576px) {
            .login-container {
                max-width: 450px;
            }

            .card {
                padding: 40px 32px;
            }
        }

        @media (min-width: 768px) {
            .login-container {
                max-width: 500px;
            }

            .card {
                padding: 48px 40px;
            }
        }
    </style>
</head>

<body>
    <div class="container login-container">
        <div class="card shadow">
            <div class="card-body">
                <div class="text-center mb-4">
                    <i class='bx bx-lock fs-1 text-primary mb-2'></i>
                    <h2 class="card-title mb-0 fw-bold">Login</h2>
                    <h2 class="card-title mb-0 fw-bold">SPK SAW</h2>
                </div>
               
                {{-- Menampilkan error validasi umum --}}
                @if ($errors->any() && !$errors->has('email') && !$errors->has('password'))
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Menampilkan error spesifik kredensial dari controller --}}
                @if ($errors->has('email') && old('email') && !$errors->has('password') && count($errors->all()) == 1)
                    <div class="alert alert-danger">
                        {{ $errors->first('email') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">Alamat Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required
                            autofocus class="form-control @error('email') is-invalid @enderror">
                        @if ($errors->has('email') && !$errors->has('password') && count($errors->all()) > 1)
                            <div class="invalid-feedback d-block">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input id="password" type="password" name="password" required
                            class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" name="remember" id="remember" class="form-check-input"
                            {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember" class="form-check-label">Ingat Saya</label>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap 5 JS Bundle CDN (optional, for interactivity) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
