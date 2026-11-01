<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - Pemantauan MBG</title>

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
            background-color: #eef1ee;
            color: #1c2621;
            min-height: 100vh;
            font-size: 14px;
        }

        .navbar {
            background-color: #ffffff;
            border-bottom: 1px solid #e3e8e4;
            padding: 14px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 700;
            font-size: 15px;
            color: #1c2621;
        }

        .brand-mark {
            width: 28px;
            height: 28px;
            border-radius: 7px;
            background: linear-gradient(160deg, #26713f, #1c4f2c);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-size: 13px;
            font-weight: 700;
        }

        .navbar-user {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-name {
            font-size: 13px;
            font-weight: 600;
            color: #2c362f;
        }

        .badge-role {
            display: inline-block;
            font-size: 9px;
            font-weight: 700;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            padding: 3px 8px;
            border-radius: 99px;
        }

        .badge-pelapor { background-color: #e0f2fe; color: #0369a1; border: 1px solid #bae6fd; }
        .badge-pemantau { background-color: #fef3c7; color: #b45309; border: 1px solid #fde68a; }
        .badge-koordinator { background-color: #dcfce7; color: #15803d; border: 1px solid #bbf7d0; }

        .btn-logout {
            background-color: #ffffff;
            color: #5a665e;
            border: 1px solid #cfd6d1;
            padding: 7px 14px;
            font-family: inherit;
            font-size: 12px;
            font-weight: 600;
            border-radius: 99px;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-logout:hover {
            background-color: #fdf3f3;
            color: #a82e2e;
            border-color: #e8c4c4;
        }

        .main-content {
            max-width: 960px;
            margin: 28px auto;
            padding: 0 20px;
        }

        .page-header {
            background: linear-gradient(135deg, #26713f 0%, #1c4f2c 100%);
            color: #ffffff;
            padding: 22px 24px;
            border-radius: 12px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;
            position: relative;
            overflow: hidden;
        }

        .page-header::after {
            content: "";
            position: absolute;
            right: -50px;
            top: -50px;
            width: 170px;
            height: 170px;
            border: 1px solid rgba(255, 255, 255, 0.14);
            border-radius: 50%;
        }

        .page-header h2 {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 4px;
            letter-spacing: -0.3px;
        }

        .page-header p {
            font-size: 12.5px;
            color: rgba(255, 255, 255, 0.82);
        }

        .header-actions {
            display: flex;
            gap: 10px;
            align-items: center;
            position: relative;
            z-index: 1;
        }

        .btn-action,
        .btn-secondary {
            display: inline-block;
            padding: 9px 16px;
            font-family: inherit;
            font-size: 12.5px;
            font-weight: 600;
            text-decoration: none;
            border-radius: 6px;
            white-space: nowrap;
            transition: background 0.15s, border-color 0.15s;
        }

        .btn-action {
            background-color: #ffffff;
            color: #1c4f2c;
            border: 1px solid #ffffff;
        }

        .btn-action:hover { background-color: #eaf5ec; border-color: #eaf5ec; }

        .btn-secondary {
            background-color: rgba(255, 255, 255, 0.12);
            color: #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .btn-secondary:hover { background-color: rgba(255, 255, 255, 0.2); }

        .alert-success {
            background: #eaf5ec;
            border: 1px solid #c2e7cc;
            color: #137333;
            padding: 12px 16px;
            border-radius: 6px;
            margin-bottom: 18px;
            font-size: 13px;
        }

        .card {
            background: #ffffff;
            border: 1px solid #e3e8e4;
            border-radius: 10px;
            padding: 22px;
        }

        .card-head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
        }

        .card-title {
            font-size: 15px;
            font-weight: 700;
            color: #1c2621;
        }

        .card-count {
            font-size: 11px;
            font-weight: 600;
            color: #5a665e;
            background: #f2f4f2;
            padding: 3px 9px;
            border-radius: 99px;
        }

        .table-responsive {
            width: 100%;
            overflow-x: auto;
            margin: 0 -22px;
            padding: 0 22px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
            text-align: left;
        }

        th {
            background-color: #f6f8f7;
            color: #556159;
            font-weight: 600;
            padding: 10px 14px;
            border-bottom: 1px solid #e3e8e4;
            white-space: nowrap;
        }

        th:first-child { border-top-left-radius: 6px; border-bottom-left-radius: 6px; }
        th:last-child { border-top-right-radius: 6px; border-bottom-right-radius: 6px; }

        td {
            padding: 12px 14px;
            border-bottom: 1px solid #eef1ee;
            color: #2c362f;
            vertical-align: middle;
        }

        tbody tr:last-child td { border-bottom: none; }
        tbody tr:hover td { background-color: #f9fbf9; }

        .status-tag {
            display: inline-block;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 0.3px;
            text-transform: uppercase;
            padding: 3px 8px;
            border-radius: 3px;
        }

        .status-diajukan { background-color: #e0f2fe; color: #0369a1; }
        .status-ditinjau { background-color: #fef3c7; color: #b45309; }
        .status-diteruskan { background-color: #e0e7ff; color: #4338ca; }
        .status-selesai { background-color: #dcfce7; color: #15803d; }

        .btn-detail {
            color: #26713f;
            text-decoration: none;
            font-weight: 600;
            font-size: 12px;
        }

        .btn-detail:hover { text-decoration: underline; }

        .empty-state {
            text-align: center;
            padding: 36px 16px;
            color: #7a847c;
            font-size: 13px;
        }

        @media (max-width: 600px) {
            .navbar { padding: 12px 16px; }
            .main-content { padding: 0 14px; margin: 20px auto; }
            .user-name { display: none; }
            .page-header { padding: 18px; }
            .page-header h2 { font-size: 18px; }
            .header-actions { width: 100%; }
            .btn-action, .btn-secondary { flex: 1; text-align: center; }
            .card { padding: 16px; }
            .table-responsive { margin: 0 -16px; padding: 0 16px; }
        }
    </style>
</head>
<body>

    <header class="navbar">
        <div class="navbar-brand">
            <span class="brand-mark">M</span>
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
                <span class="badge-role {{ $badgeClass }}">{{ $role }}</span>
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
                <h2>Beranda</h2>
                <p>Ringkasan laporan keluhan MBG.</p>
            </div>

            <div class="header-actions">
                @if(Auth::user()->isPelapor())
                    <a href="{{ route('reports.create') }}" class="btn-action">+ Buat Laporan</a>
                @else
                    <a href="{{ route('rekap.index') }}" class="btn-secondary">Lihat Rekap</a>
                @endif
            </div>
        </div>

        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-head">
                <div class="card-title">
                    @if(Auth::user()->isPelapor())
                        Riwayat Laporan Saya
                    @else
                        Semua Laporan Masuk
                    @endif
                </div>
                <span class="card-count">{{ $reports->count() }} laporan</span>
            </div>

            @if($reports->isEmpty())
                <div class="empty-state">
                    Belum ada laporan yang masuk.
                </div>
            @else
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Sekolah</th>
                                <th>Menu</th>
                                @if(!Auth::user()->isPelapor())
                                    <th>Pelapor</th>
                                @endif
                                <th>Korban</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reports as $report)
                                <tr>
                                    <td>{{ $report->incident_date->format('d/m/Y') }}</td>
                                    <td>{{ $report->school->name }}</td>
                                    <td>{{ $report->mbgDistribution->menu_description }}</td>
                                    @if(!Auth::user()->isPelapor())
                                        <td>{{ $report->user->name }}</td>
                                    @endif
                                    <td>{{ $report->affected_count }} orang</td>
                                    <td>
                                        <span class="status-tag status-{{ $report->status }}">
                                            {{ $report->status }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('reports.show', $report->id) }}" class="btn-detail">Lihat Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </main>

</body>
</html>