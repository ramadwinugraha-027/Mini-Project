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
            transition: background-color 0.15s ease;
        }

        .btn-action:hover {
            background-color: #1d4ed8;
        }

        .alert-success {
            background: #e6f4ea;
            border: 1px solid #c2e7cc;
            color: #137333;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
        }

        .card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .card-title {
            font-size: 1.05rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 1rem;
        }

        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.875rem;
            text-align: left;
        }

        th {
            background-color: #f8fafc;
            color: #475569;
            font-weight: 600;
            padding: 0.75rem 1rem;
            border-bottom: 1px solid #e2e8f0;
        }

        td {
            padding: 0.875rem 1rem;
            border-bottom: 1px solid #f1f5f9;
            color: #1e293b;
            vertical-align: middle;
        }

        tr:hover td {
            background-color: #f8fafc;
        }

        .status-tag {
            display: inline-block;
            font-size: 0.6875rem;
            font-weight: 700;
            text-transform: uppercase;
            padding: 0.2rem 0.5rem;
            border-radius: 4px;
        }

        .status-diajukan { background-color: #e0f2fe; color: #0369a1; }
        .status-ditinjau { background-color: #fef3c7; color: #b45309; }
        .status-diteruskan { background-color: #e0e7ff; color: #4338ca; }
        .status-selesai { background-color: #dcfce7; color: #15803d; }

        .btn-detail {
            color: #1e40af;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.8125rem;
        }

        .btn-detail:hover {
            text-decoration: underline;
        }

        .empty-state {
            text-align: center;
            padding: 2.5rem 1rem;
            color: #64748b;
            font-size: 0.875rem;
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

        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-title">
                @if(Auth::user()->isPelapor())
                    Riwayat Laporan Saya
                @else
                    Daftar Semua Laporan Masuk
                @endif
            </div>

            @if($reports->isEmpty())
                <div class="empty-state">
                    Belum ada laporan keluhan yang tercatat di dalam sistem.
                </div>
            @else
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>Tanggal Kejadian</th>
                                <th>Sekolah</th>
                                <th>Menu Distribusi</th>
                                <th>Korban</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reports as $report)
                                <tr>
                                    <td>{{ $report->incident_date->format('d/m/Y') }}</td>
                                    <td>{{ $report->school->name }}</td>
                                    <td>{{ $report->mbgDistribution->menu_description }}</td>
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