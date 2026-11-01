<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Pemantauan MBG</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: "Inter", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background: #eef1ee;
            color: #1c2621;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px 16px;
            font-size: 14px;
        }

        /* Kartu utama: dua panel */
        .auth {
            width: 100%;
            max-width: 820px;
            background: #ffffff;
            border: 1px solid #e3e8e4;
            border-radius: 14px;
            overflow: hidden;
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        /* Panel kiri (branding) */
        .auth-side {
            background: linear-gradient(160deg, #26713f 0%, #1c4f2c 100%);
            color: #ffffff;
            padding: 40px 32px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
        }

        /* ornamen garis tipis di sudut */
        .auth-side::after {
            content: "";
            position: absolute;
            right: -40px;
            bottom: -40px;
            width: 160px;
            height: 160px;
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 50%;
        }

        .side-tag {
            display: inline-block;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 0.6px;
            text-transform: uppercase;
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 4px 10px;
            border-radius: 999px;
            width: fit-content;
            margin-bottom: 28px;
        }

        .auth-side h1 {
            font-size: 24px;
            font-weight: 700;
            line-height: 1.3;
            letter-spacing: -0.3px;
            margin-bottom: 12px;
        }

        .auth-side p {
            font-size: 12.5px;
            line-height: 1.7;
            color: rgba(255, 255, 255, 0.85);
        }

        .side-foot {
            margin-top: 28px;
            font-size: 11px;
            color: rgba(255, 255, 255, 0.7);
        }

        /* Panel kanan (form) */
        .auth-main {
            padding: 40px 36px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .auth-main h2 {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .auth-main .sub {
            color: #6b756d;
            font-size: 12.5px;
            line-height: 1.6;
            margin-bottom: 24px;
        }

        .alert-error {
            background: #fdf3f3;
            border: 1px solid #e8c4c4;
            color: #9c2b2b;
            padding: 10px 14px;
            border-radius: 6px;
            margin-bottom: 16px;
            font-size: 12px;
            line-height: 1.6;
        }

        .alert-success {
            background: #eaf5ec;
            border: 1px solid #c2e7cc;
            color: #137333;
            padding: 10px 14px;
            border-radius: 6px;
            margin-bottom: 16px;
            font-size: 12px;
        }

        .form-group { margin-bottom: 16px; }

        label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 7px;
            color: #2c362f;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 11px 13px;
            border: 1px solid #d6dcd8;
            border-radius: 7px;
            background: #fbfcfb;
            font-family: inherit;
            font-size: 13px;
            color: #2c362f;
            outline: none;
            transition: border-color 0.15s, background 0.15s, box-shadow 0.15s;
        }

        input::placeholder { color: #9aa39c; }

        input[type="email"]:focus,
        input[type="password"]:focus {
            background: #ffffff;
            border-color: #2f7a4d;
            box-shadow: 0 0 0 3px rgba(47, 122, 77, 0.12);
        }

        button {
            width: 100%;
            padding: 11px 14px;
            background: #26713f;
            color: #ffffff;
            border: 1px solid #26713f;
            border-radius: 7px;
            font-family: inherit;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 6px;
            transition: background 0.15s, border-color 0.15s;
        }

        button:hover { background: #1e5a32; border-color: #1e5a32; }

        /* Responsif: jadi satu kolom */
        @media (max-width: 720px) {
            .auth { grid-template-columns: 1fr; }

            .auth-side { padding: 28px 24px; }

            .auth-side h1 { font-size: 20px; }

            .auth-main { padding: 28px 24px; }
        }
    </style>
</head>
<body>

<div class="auth">

    <!-- Panel kiri -->
    <aside class="auth-side">
        <div>
            <span class="side-tag">Pemantauan MBG</span>
            <h1>Lapor dan pantau keluhan makanan MBG.</h1>
            <p>Masuk untuk mengirim laporan keluhan atau menindaklanjuti laporan yang masuk.</p>
        </div>
        <div class="side-foot">
            &copy; {{ date('Y') }} Pemantauan MBG
        </div>
    </aside>

    <!-- Panel kanan -->
    <main class="auth-main">
        <h2>Masuk</h2>
        <p class="sub">Gunakan email dan kata sandi akun Anda.</p>

        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert-error">{{ $errors->first() }}</div>
        @endif

        <form action="{{ url('/login') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus placeholder="contoh: pelapor@mbg.test">
            </div>

            <div class="form-group">
                <label for="password">Kata Sandi</label>
                <input type="password" id="password" name="password" required placeholder="••••••••">
            </div>

            <button type="submit">Masuk</button>
        </form>
    </main>

</div>

</body>
</html>