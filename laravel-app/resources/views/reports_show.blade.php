<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Laporan #{{ $report->id }}</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f5f7f5; color: #252d28; padding: 24px; }
        .container { max-width: 680px; margin: 0 auto; }
        .back-link { display: inline-block; color: #52675a; text-decoration: none; font-size: 14px; margin-bottom: 20px; }
        .card { background: #ffffff; border: 1px solid #e7ebe7; border-radius: 8px; padding: 24px; }
        .card-header { display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #eee; padding-bottom: 10px; margin-bottom: 16px; }
        h2 { font-size: 18px; margin: 0; }
        .row { display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid #f9f9f9; font-size: 14px; }
        .label { color: #666; font-weight: 600; width: 180px; }
        .value { color: #222; flex: 1; }
        .badge { display: inline-block; padding: 3px 8px; border-radius: 4px; font-size: 12px; font-weight: bold; text-transform: uppercase; }
        .badge-diajukan { background: #e0f2fe; color: #0369a1; }
        .badge-ditinjau { background: #fef3c7; color: #b45309; }
        .badge-diteruskan { background: #e0e7ff; color: #4338ca; }
        .badge-selesai { background: #dcfce7; color: #15803d; }
        .btn-edit { background: #0284c7; color: white; text-decoration: none; padding: 6px 12px; border-radius: 4px; font-size: 13px; font-weight: 600; }
        .btn-edit:hover { background: #0369a1; }
        .alert-success { background: #e6f4ea; border: 1px solid #c2e7cc; color: #137333; padding: 12px 16px; border-radius: 8px; margin-bottom: 16px; font-size: 14px; }
    </style>
</head>
<body>

<div class="container">
    <a href="{{ route('dashboard') }}" class="back-link">&larr; Kembali ke Dashboard</a>

    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h2>Detail Laporan #{{ $report->id }}</h2>
            @can('update', $report)
                <a href="{{ route('reports.edit', $report) }}" class="btn-edit">Ubah Laporan</a>
            @endcan
        </div>

        <div class="row">
            <div class="label">Status Penanganan:</div>
            <div class="value">
                <span class="badge badge-{{ $report->status }}">{{ $report->status }}</span>
            </div>
        </div>

        <div class="row">
            <div class="label">Pelapor:</div>
            <div class="value">{{ $report->user->name }}</div>
        </div>

        <div class="row">
            <div class="label">Sekolah:</div>
            <div class="value">{{ $report->school->name }}</div>
        </div>

        <div class="row">
            <div class="label">Distribusi Terkait:</div>
            <div class="value">
                {{ $report->mbgDistribution->distribution_date->format('d/m/Y') }} ({{ $report->mbgDistribution->meal_time }})<br>
                Menu: {{ $report->mbgDistribution->menu_description }}
            </div>
        </div>

        <div class="row">
            <div class="label">Tanggal Kejadian:</div>
            <div class="value">{{ $report->incident_date->format('d/m/Y') }}</div>
        </div>

        <div class="row">
            <div class="label">Jumlah Terdampak:</div>
            <div class="value">{{ $report->affected_count }} orang</div>
        </div>

        <div class="row">
            <div class="label">Gejala / Keluhan:</div>
            <div class="value">{{ $report->symptoms_description }}</div>
        </div>

        <div class="row">
            <div class="label">Bukti Pendukung:</div>
            <div class="value">
                @if($report->evidence_path)
                    <a href="{{ asset('storage/' . $report->evidence_path) }}" target="_blank" style="color: #287746; font-weight: 600;">
                        Lihat Berkas Bukti
                    </a>
                @else
                    <span style="color: #888;">Tidak ada bukti diunggah</span>
                @endif
            </div>
        </div>
    </div>
</div>

</body>
</html>