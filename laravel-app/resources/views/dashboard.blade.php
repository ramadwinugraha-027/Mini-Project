<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - Pemantauan MBG</title>
    <style>
        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background-color: #f8fafc;
            color: #0f172a;
            min-height: 100vh;
        }

        .navbar {
            background-color: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            padding: 0.875rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.125rem;
            color: #0f172a;
        }

        .navbar-user {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .user-info {
            text-align: right;
            line-height: 1.25;
        }

        .user-name {
            font-size: 0.875rem;
            font-weight: 600;
            color: #1e293b;
        }

        .badge-role {
            display: inline-block;
            font-size: 0.6875rem;
            font-weight: 700;
            text-transform: uppercase;
            padding: 0.125rem 0.5rem;
            border-radius: 4px;
        }

        .badge-pelapor { background-color: #e0f2fe; color: #0369a1; }
        .badge-pemantau { background-color: #fef3c7; color: #b45309; }
        .badge-koordinator { background-color: #dcfce7; color: #15803d; }

        .btn-logout {
            background-color: transparent;
            color: #64748b;
            border: 1px solid #cbd5e1;
            padding: 0.375rem 0.75rem;
            font-size: 0.8125rem;
            font-weight: 500;
            border-radius: 6px;
            cursor: pointer;
        }

        .btn-logout:hover {
            background-color: #fee2e2;
            color: #b91c1c;
            border-color: #fca5a5;
        }

        .main-content {
            max-width: 960px;
            margin: 2rem auto;
            padding: 0 1.5rem;
        }

        .page-header {
            margin-bottom: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .page-header h2 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #0f172a;
        }

        .btn-action {
            display: inline-block;
            background-color: #1e40af;
            color: #ffffff;
            padding: 0.625rem 1rem;
            font-size: 0.875rem;
            font-weight: 600;
            text-decoration: none;
            border-radius: 6px;
        }

        .btn-action:hover {
            background-color: #1d4ed8;
        }

        .card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .status-box {
            background-color: #f1f5f9;
            border-left: 4px solid #3b82f6;
            padding: 1rem;
            border-radius: 0 6px 6px 0;
            font-size: 0.875rem;
            line-height: 1.5;
            color: #334155;
        }
    </style>
</head>
<body>

    <header class="navbar">
        <div class="navbar-brand">
            <span>Pemantauan MBG</span>
        </div>

        <div class="navbar-user">
            <div class="user-info">
                <div class="user-name">{{ Auth::user()->name }}</div>
                @php
                    $role = Auth::user()->role;
                    $badgeClass = match($role) {
                        'pelapor' => 'badge-pelapor',
                        'pemantau' => 'badge-pemantau',
                        'koordinator' => 'badge-koordinator',
                        default => 'badge-pelapor'
                    };
                @endphp
                <span class="badge-role {{ $badgeClass }}">{{ strtoupper($role) }}</span>
            </div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn-logout">Keluar</button>
            </form>
        </div>
    </header>

    <main class="main-content">
        <div class="page-header">
            <div>
                <h2>Beranda Sistem</h2>
                <p style="color: #64748b; font-size: 0.875rem;">Sesi aktif untuk pengguna terotentikasi.</p>
            </div>
            @if(Auth::user()->isPelapor())
                <a href="{{ route('reports.create') }}" class="btn-action">+ Buat Laporan Baru</a>
            @endif
        </div>

        <div class="card">
            <div class="status-box">
                Sistem aktif sebagai <strong>{{ Auth::user()->name }}</strong> ({{ strtoupper(Auth::user()->role) }}).
            </div>
        </div>
    </main>

</body>
</html>