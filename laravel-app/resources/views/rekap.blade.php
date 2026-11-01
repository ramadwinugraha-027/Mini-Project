<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekapitulasi Laporan MBG</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: "Inter", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background: #eef1ee;
            color: #1c2621;
            padding: 32px 20px;
            font-size: 14px;
            min-height: 100vh;
        }

        .container { max-width: 960px; margin: 0 auto; }

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background-color: #ffffff;
            color: #3b4b41;
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
            padding: 8px 16px;
            border: 1px solid #d0d7d2;
            border-radius: 999px;
            margin-bottom: 20px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.03);
            transition: all 0.2s ease;
        }

        .back-button svg {
            width: 16px;
            height: 16px;
            stroke: #6b756d;
            transition: stroke 0.2s ease;
        }

        .back-button:hover {
            background-color: #f8faf8;
            border-color: #26713f;
            color: #26713f;
            box-shadow: 0 2px 4px rgba(38, 113, 63, 0.08);
            transform: translateX(-2px);
        }

        .back-button:hover svg {
            stroke: #26713f;
        }

        .page-header {
            background: linear-gradient(135deg, #26713f 0%, #1c4f2c 100%);
            color: #ffffff;
            padding: 22px 24px;
            border-radius: 12px;
            margin-bottom: 20px;
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
            letter-spacing: -0.3px;
            margin-bottom: 4px;
        }

        .page-header p {
            font-size: 12.5px;
            color: rgba(255, 255, 255, 0.82);
        }

        .metrics-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 14px;
            margin-bottom: 20px;
        }

        .metric-card {
            background: #ffffff;
            padding: 18px 20px;
            border-radius: 10px;
            border: 1px solid #e3e8e4;
        }

        .metric-title {
            font-size: 11px;
            color: #6b756d;
            font-weight: 600;
            letter-spacing: 0.3px;
            text-transform: uppercase;
        }

        .metric-value {
            font-size: 26px;
            font-weight: 700;
            color: #1c2621;
            margin-top: 6px;
        }

        .metric-card.accent { background: #eaf5ec; border-color: #c9e6d1; }
        .metric-card.accent .metric-value { color: #26713f; }
        
        .metric-card.dark { background: #1c2621; border-color: #1c2621; }
        .metric-card.dark .metric-title { color: rgba(255, 255, 255, 0.7); }
        .metric-card.dark .metric-value { color: #ffffff; }

        .card {
            background: #ffffff;
            border-radius: 10px;
            border: 1px solid #e3e8e4;
            padding: 22px;
        }

        .filter-bar {
            display: flex;
            gap: 12px;
            margin-bottom: 20px;
            align-items: center;
            flex-wrap: wrap;
            padding-bottom: 20px;
            border-bottom: 1px solid #eef1ee;
        }

        .filter-bar label {
            font-size: 13px;
            font-weight: 600;
            color: #2c362f;
        }

        .filter-controls {
            display: flex;
            gap: 10px;
            align-items: center;
            flex-wrap: wrap;
            flex: 1;
        }

        select {
            padding: 9px 12px;
            border: 1px solid #cfd6d1;
            border-radius: 6px;
            background: #fbfcfb;
            font-family: inherit;
            font-size: 13px;
            color: #2c362f;
            outline: none;
            cursor: pointer;
            min-width: 220px;
            transition: border-color 0.15s, background 0.15s, box-shadow 0.15s;
        }

        select:focus {
            border-color: #2f7a4d;
            background: #ffffff;
            box-shadow: 0 0 0 3px rgba(47, 122, 77, 0.12);
        }

        .btn-filter {
            background: #26713f;
            color: #ffffff;
            border: 1px solid #26713f;
            padding: 9px 18px;
            border-radius: 6px;
            font-family: inherit;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.15s, border-color 0.15s;
        }

        .btn-filter:hover { background: #1e5a32; border-color: #1e5a32; }

        .btn-reset {
            color: #5a665e;
            text-decoration: none;
            font-size: 13px;
            padding: 9px 14px;
            border: 1px solid #cfd6d1;
            border-radius: 6px;
            background: #ffffff;
            transition: background 0.15s;
        }

        .btn-reset:hover { background: #f2f4f2; }

        .table-responsive { width: 100%; overflow-x: auto; }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
            text-align: left;
        }

        th {
            background: #f6f8f7;
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
        tbody tr:hover td { background: #f9fbf9; }

        .badge {
            display: inline-block;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 0.3px;
            text-transform: uppercase;
            padding: 3px 8px;
            border-radius: 3px;
        }

        .badge-diajukan { background: #e0f2fe; color: #0369a1; }
        .badge-ditinjau { background: #fef3c7; color: #b45309; }
        .badge-diteruskan { background: #e0e7ff; color: #4338ca; }
        .badge-selesai { background: #dcfce7; color: #15803d; }

        .btn-detail {
            color: #26713f;
            font-weight: 600;
            text-decoration: none;
            font-size: 12px;
        }

        .btn-detail:hover { text-decoration: underline; }

        .empty-state {
            text-align: center;
            color: #7a847c;
            padding: 32px 16px;
            font-size: 13px;
        }

        .pagination {
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }

        .pagination nav svg { width: 18px; height: 18px; }

        @media (max-width: 700px) {
            .metrics-grid { grid-template-columns: 1fr; }
        }

        @media (max-width: 560px) {
            body { padding: 20px 12px; }
            .page-header { padding: 18px; }
            .page-header h2 { font-size: 18px; }
            .card { padding: 16px; }
            
            .filter-bar { flex-direction: column; align-items: stretch; }
            .filter-controls { flex-direction: column; align-items: stretch; }
            select, .btn-filter, .btn-reset { width: 100%; text-align: center; }
        }
    </style>
</head>
<body>

<div class="container">
    <a href="{{ route('dashboard') }}" class="back-button">
        <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="19" y1="12" x2="5" y2="12"></line>
            <polyline points="12 19 5 12 12 5"></polyline>
        </svg>
        Kembali ke Dashboard
    </a>

    <div class="page-header">
        <h2>Rekapitulasi Laporan</h2>
        <p>Ringkasan dan daftar laporan keluhan MBG.</p>
    </div>

    <div class="metrics-grid">
        <div class="metric-card">
            <div class="metric-title">Total Laporan</div>
            <div class="metric-value">{{ $totalReports }}</div>
        </div>
        <div class="metric-card accent">
            <div class="metric-title">Sedang Diproses</div>
            <div class="metric-value">{{ $inProgressReports }}</div>
        </div>
        <div class="metric-card dark">
            <div class="metric-title">Selesai</div>
            <div class="metric-value">{{ $completedReports }}</div>
        </div>
    </div>

    <div class="card">
        <form method="GET" action="{{ route('rekap.index') }}" class="filter-bar">
            <label for="school_id">Filter Sekolah</label>
            <div class="filter-controls">
                <select name="school_id" id="school_id">
                    <option value="" disabled {{ request('school_id') ? '' : 'selected' }} hidden>Semua Sekolah</option>
                    <option value="" {{ request('school_id') ? 'selected' : '' }} style="display:none;">Semua Sekolah</option>
                    
                    @foreach($schools as $school)
                        <option value="{{ $school->id }}" {{ request('school_id') == $school->id ? 'selected' : '' }}>
                            {{ $school->name }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="btn-filter">Terapkan</button>
                @if(request('school_id'))
                    <a href="{{ route('rekap.index') }}" class="btn-reset">Reset</a>
                @endif
            </div>
        </form>

        @if($reports->isEmpty())
            <p class="empty-state">Tidak ada laporan pada kriteria ini.</p>
        @else
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Sekolah</th>
                            <th>Menu</th>
                            <th>Pelapor</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reports as $r)
                            <tr>
                                <td>{{ $r->incident_date->format('d/m/Y') }}</td>
                                <td>{{ $r->school->name }}</td>
                                <td>{{ $r->mbgDistribution->menu_description }}</td>
                                <td>{{ $r->user->name }}</td>
                                <td><span class="badge badge-{{ $r->status }}">{{ $r->status }}</span></td>
                                <td><a href="{{ route('reports.show', $r) }}" class="btn-detail">Detail</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="pagination">
                {{ $reports->links() }}
            </div>
        @endif
    </div>
</div>

</body>
</html>