<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Pemantauan MBG') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: "Inter", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background: #eef1ee;
            color: #1c2621;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            font-size: 14px;
        }

        .topbar {
            border-bottom: 1px solid #e3e8e4;
            background: #ffffff;
            padding: 14px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 700;
            font-size: 15px;
            color: #1c2621;
        }

        .brand-mark {
            width: 26px;
            height: 26px;
            border-radius: 7px;
            background: linear-gradient(160deg, #26713f, #1c4f2c);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-size: 12px;
            font-weight: 700;
        }

        .topbar-nav {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .link-plain {
            color: #4a5c4e;
            text-decoration: none;
            font-size: 13px;
            padding: 7px 12px;
            border-radius: 5px;
        }

        .link-plain:hover { background: #f2f4f2; color: #1f5c37; }

        .link-solid {
            background: #26713f;
            color: #ffffff;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            padding: 8px 14px;
            border-radius: 5px;
        }

        .link-solid:hover { background: #1e5a32; }

        main {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 48px 20px;
        }

        .hero-wrap {
            width: 100%;
            max-width: 900px;
            display: grid;
            grid-template-columns: 1fr 320px;
            gap: 40px;
            align-items: center;
        }

        .hero-tag {
            display: inline-block;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.4px;
            text-transform: uppercase;
            color: #26713f;
            background: #eaf5ec;
            border: 1px solid #c9e6d1;
            padding: 4px 9px;
            border-radius: 4px;
            margin-bottom: 16px;
        }

        .hero h1 {
            font-size: 32px;
            font-weight: 700;
            line-height: 1.22;
            letter-spacing: -0.5px;
            margin-bottom: 14px;
        }

        .hero p {
            color: #5a665e;
            font-size: 14px;
            line-height: 1.7;
            margin-bottom: 24px;
        }

        .hero-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 30px;
        }

        .btn {
            display: inline-block;
            font-family: inherit;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            padding: 10px 18px;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.15s, border-color 0.15s;
        }

        .btn-primary {
            background: #26713f;
            color: #ffffff;
            border: 1px solid #26713f;
        }

        .btn-primary:hover { background: #1e5a32; border-color: #1e5a32; }

        .btn-outline {
            background: #ffffff;
            color: #2c362f;
            border: 1px solid #cfd6d1;
        }

        .btn-outline:hover { background: #f2f4f2; }

        .steps {
            border-top: 1px solid #dfe4e0;
            padding-top: 22px;
        }

        .steps-title {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #7a847c;
            margin-bottom: 14px;
        }

        .steps ol {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .steps li {
            display: flex;
            gap: 12px;
            font-size: 13px;
            color: #2c362f;
            line-height: 1.6;
        }

        .step-num {
            flex-shrink: 0;
            width: 22px;
            height: 22px;
            border-radius: 50%;
            background: #eaf5ec;
            color: #26713f;
            border: 1px solid #c9e6d1;
            font-size: 11px;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .visual {
            background: linear-gradient(160deg, #26713f 0%, #1c4f2c 100%);
            border-radius: 16px;
            padding: 24px;
            color: #ffffff;
            position: relative;
            overflow: hidden;
            box-shadow: 0 12px 30px -12px rgba(28, 79, 44, 0.45);
        }

        .visual::after {
            content: "";
            position: absolute;
            right: -60px;
            top: -60px;
            width: 200px;
            height: 200px;
            border: 1px solid rgba(255, 255, 255, 0.14);
            border-radius: 50%;
        }

        .visual-title {
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.4px;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 14px;
            position: relative;
            z-index: 1;
        }

        .mini-card {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.16);
            border-radius: 10px;
            padding: 14px;
            margin-bottom: 10px;
            position: relative;
            z-index: 1;
        }

        .mini-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            font-size: 12px;
        }

        .mini-row + .mini-row { margin-top: 10px; }

        .mini-label {
            color: rgba(255, 255, 255, 0.7);
        }

        .mini-value {
            font-weight: 600;
            color: #ffffff;
        }

        .pill {
            display: inline-block;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 0.3px;
            text-transform: uppercase;
            padding: 3px 8px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.16);
            color: #ffffff;
        }

        .pill.good { background: #b7e6c6; color: #1c4f2c; }
        .pill.wait { background: #fde7b0; color: #7a4a06; }

        .visual-note {
            position: relative;
            z-index: 1;
            margin-top: 14px;
            font-size: 11.5px;
            line-height: 1.6;
            color: rgba(255, 255, 255, 0.78);
        }

        footer {
            text-align: center;
            font-size: 11px;
            color: #8d968f;
            padding: 20px;
        }

        @media (max-width: 820px) {
            .hero-wrap { grid-template-columns: 1fr; gap: 32px; }
            .visual { max-width: 420px; margin: 0 auto; width: 100%; }
        }

        @media (max-width: 520px) {
            .topbar { padding: 12px 16px; }
            .hero h1 { font-size: 24px; }
            main { padding: 32px 16px; }
            .btn { flex: 1; text-align: center; }
        }
    </style>
</head>
<body>

    <header class="topbar">
        <div class="brand">
            <span class="brand-mark">M</span>
            <span>Pemantauan MBG</span>
        </div>

        @if (Route::has('login'))
            <nav class="topbar-nav">
                @auth
                    <a href="{{ url('/dashboard') }}" class="link-solid">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="link-plain">Masuk</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="link-solid">Daftar</a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>

    <main>
        <div class="hero-wrap">

            <section class="hero">
                <span class="hero-tag">Sistem Laporan</span>

                <h1>Laporkan keluhan makanan MBG dengan mudah.</h1>

                <p>
                    Sampaikan keluhan terkait distribusi makanan MBG di sekolah.
                    Laporan Anda akan ditinjau pemantau dan diteruskan ke pihak terkait.
                </p>

                <div class="hero-actions">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-primary">Buka Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary">Masuk</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-outline">Buat Akun</a>
                        @endif
                    @endauth
                </div>

                <div class="steps">
                    <div class="steps-title">Alur Singkat</div>
                    <ol>
                        <li>
                            <span class="step-num">1</span>
                            <span>Isi form laporan dengan data sekolah, jadwal distribusi, dan keluhan.</span>
                        </li>
                        <li>
                            <span class="step-num">2</span>
                            <span>Laporan diperiksa oleh pemantau untuk memastikan kelengkapan.</span>
                        </li>
                        <li>
                            <span class="step-num">3</span>
                            <span>Koordinator menindaklanjuti ke pihak terkait hingga laporan selesai.</span>
                        </li>
                    </ol>
                </div>
            </section>

            <aside class="visual">
                <div class="visual-title">Contoh Alur Laporan</div>

                <div class="mini-card">
                    <div class="mini-row">
                        <span class="mini-label">Sekolah</span>
                        <span class="mini-value">SD Negeri 1</span>
                    </div>
                    <div class="mini-row">
                        <span class="mini-label">Menu</span>
                        <span class="mini-value">Nasi &amp; Ayam</span>
                    </div>
                    <div class="mini-row">
                        <span class="mini-label">Status</span>
                        <span class="pill wait">Ditinjau</span>
                    </div>
                </div>

                <div class="mini-card">
                    <div class="mini-row">
                        <span class="mini-label">Tahap</span>
                        <span class="mini-value">Diteruskan</span>
                    </div>
                    <div class="mini-row">
                        <span class="mini-label">Pihak</span>
                        <span class="mini-value">Puskesmas</span>
                    </div>
                    <div class="mini-row">
                        <span class="mini-label">Hasil</span>
                        <span class="pill good">Selesai</span>
                    </div>
                </div>

                <p class="visual-note">
                    Tiap laporan punya alur jelas: diajukan, ditinjau, diteruskan, lalu selesai.
                </p>
            </aside>

        </div>
    </main>

    <footer>
        &copy; {{ date('Y') }} Pemantauan MBG &middot; v{{ app()->version() }}
    </footer>

</body>
</html>