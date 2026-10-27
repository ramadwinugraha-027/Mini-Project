<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Pemantauan Keamanan Makanan MBG</title>
    <style>
        body {
            font-family: system-ui, -apple-system, sans-serif;
            background-color: #f1f5f9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .login-card {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            width: 100%;
            max-width: 400px;
        }
        h2 { margin-top: 0; color: #1e293b; font-size: 1.5rem; text-align: center; }
        p.subtitle { color: #64748b; font-size: 0.875rem; text-align: center; margin-bottom: 1.5rem; }
        .form-group { margin-bottom: 1rem; }
        label { display: block; margin-bottom: 0.5rem; font-weight: 500; font-size: 0.875rem; color: #334155; }
        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 0.625rem;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 0.875rem;
        }
        button {
            width: 100%;
            padding: 0.75rem;
            background-color: #2563eb;
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 0.5rem;
        }
        button:hover { background-color: #1d4ed8; }
        .alert-error {
            background-color: #fee2e2;
            color: #991b1b;
            padding: 0.75rem;
            border-radius: 6px;
            margin-bottom: 1rem;
            font-size: 0.875rem;
        }
        .alert-success {
            background-color: #dcfce7;
            color: #166534;
            padding: 0.75rem;
            border-radius: 6px;
            margin-bottom: 1rem;
            font-size: 0.875rem;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <h2>Aplikasi MBG</h2>
        <p class="subtitle">Sistem Pelaporan & Pemantauan Keamanan Makanan</p>

        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert-error">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ url('/login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Alamat Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus placeholder="contoh: pelapor@mbg.test">
            </div>

            <div class="form-group">
                <label for="password">Kata Sandi</label>
                <input type="password" id="password" name="password" required placeholder="••••••••">
            </div>

            <button type="submit">Masuk ke Sistem</button>
        </form>
    </div>
</body>
</html>