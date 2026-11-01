<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Laporan #{{ $report->id }}</title>

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

        .container { max-width: 720px; margin: 0 auto; }

        .back-link {
            display: inline-block;
            color: #4a5c4e;
            text-decoration: none;
            font-size: 13px;
            margin-bottom: 18px;
        }

        .back-link:hover { color: #1f5c37; text-decoration: underline; }

        .head-card {
            background: linear-gradient(135deg, #26713f 0%, #1c4f2c 100%);
            color: #ffffff;
            padding: 22px 24px;
            border-radius: 12px;
            margin-bottom: 16px;
            position: relative;
            overflow: hidden;
        }

        .head-card::after {
            content: "";
            position: absolute;
            right: -50px;
            top: -50px;
            width: 170px;
            height: 170px;
            border: 1px solid rgba(255, 255, 255, 0.14);
            border-radius: 50%;
        }

        .head-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            position: relative;
            z-index: 1;
            margin-bottom: 10px;
        }

        .head-top h1 {
            font-size: 19px;
            font-weight: 700;
            letter-spacing: -0.3px;
        }

        .btn-edit {
            background: #ffffff;
            color: #1c4f2c;
            text-decoration: none;
            padding: 8px 14px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            border: 1px solid #ffffff;
            white-space: nowrap;
        }

        .btn-edit:hover { background: #eaf5ec; border-color: #eaf5ec; }

        .head-sub {
            font-size: 12.5px;
            color: rgba(255, 255, 255, 0.82);
            position: relative;
            z-index: 1;
            line-height: 1.6;
        }

        .badge {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 3px;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 0.3px;
            text-transform: uppercase;
        }

        .badge-diajukan { background: #e0f2fe; color: #0369a1; }
        .badge-ditinjau { background: #fef3c7; color: #b45309; }
        .badge-diteruskan { background: #e0e7ff; color: #4338ca; }
        .badge-selesai { background: #dcfce7; color: #15803d; }

        .alert-success {
            background: #eaf5ec;
            border: 1px solid #c2e7cc;
            color: #137333;
            padding: 12px 16px;
            border-radius: 6px;
            margin-bottom: 16px;
            font-size: 13px;
        }

        .alert-info {
            background: #eff6ff;
            border: 1px solid #bfdbfe;
            color: #1e40af;
            padding: 12px 16px;
            border-radius: 6px;
            font-size: 12.5px;
            line-height: 1.6;
            margin-bottom: 16px;
        }

        .card {
            background: #ffffff;
            border: 1px solid #e3e8e4;
            border-radius: 10px;
            padding: 22px;
            margin-bottom: 16px;
        }

        .card-section-title {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.4px;
            text-transform: uppercase;
            color: #7a847c;
            margin-bottom: 14px;
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px 20px;
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .field.full { grid-column: 1 / -1; }

        .field-label {
            font-size: 11px;
            font-weight: 600;
            color: #6b756d;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        .field-value {
            font-size: 13.5px;
            color: #1c2621;
            line-height: 1.6;
            word-break: break-word;
        }

        .field-value.muted { color: #8d968f; }

        .evidence-link { color: #26713f; font-weight: 600; text-decoration: none; }
        .evidence-link:hover { text-decoration: underline; }

        .action-card {
            background: #ffffff;
            border: 1px solid #e3e8e4;
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 16px;
        }

        .action-head {
            padding: 14px 22px;
            border-bottom: 1px solid #eef1ee;
            font-size: 13px;
            font-weight: 700;
            color: #1c262f;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .action-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #26713f;
        }

        .action-body { padding: 18px 22px; }

        .form-group { margin-bottom: 12px; }

        .form-group label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 6px;
            color: #2c362f;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 9px 12px;
            border: 1px solid #d6dcd8;
            border-radius: 6px;
            background: #fbfcfb;
            font-family: inherit;
            font-size: 13px;
            color: #2c362f;
            outline: none;
            transition: border-color 0.15s, background 0.15s, box-shadow 0.15s;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            background: #ffffff;
            border-color: #2f7a4d;
            box-shadow: 0 0 0 3px rgba(47, 122, 77, 0.12);
        }

        .form-group textarea { resize: vertical; line-height: 1.6; }

        .form-group input::placeholder,
        .form-group textarea::placeholder { color: #9aa39c; }

        .btn-action {
            background: #26713f;
            color: #ffffff;
            border: 1px solid #26713f;
            padding: 9px 16px;
            border-radius: 6px;
            font-family: inherit;
            font-size: 12.5px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.15s, border-color 0.15s;
        }

        .btn-action:hover { background: #1e5a32; border-color: #1e5a32; }

        .btn-finish {
            background: #1c2621;
            color: #ffffff;
            border: 1px solid #1c2621;
            padding: 9px 16px;
            border-radius: 6px;
            font-family: inherit;
            font-size: 12.5px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.15s, border-color 0.15s;
        }

        .btn-finish:hover { background: #000000; border-color: #000000; }

        .divider { border-top: 1px solid #eef1ee; margin: 16px 0; }

        @media (max-width: 560px) {
            body { padding: 20px 12px; }
            .grid { grid-template-columns: 1fr; gap: 12px; }
            .head-top { flex-wrap: wrap; }
            .head-top h1 { font-size: 17px; }
            .card, .action-body { padding: 16px; }
            .action-head { padding: 12px 16px; }
            .btn-action, .btn-finish { width: 100%; }
        }
    </style>
</head>
<body>

<div class="container">
    <a href="{{ route('dashboard') }}" class="back-link">&larr; Kembali ke Beranda</a>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <div class="head-card">
        <div class="head-top">
            <h1>Detail Laporan #{{ $report->id }}</h1>
            @can('update', $report)
                <a href="{{ route('reports.edit', $report) }}" class="btn-edit">Ubah Laporan</a>
            @endcan
        </div>
        <div class="head-sub">
            <span class="badge badge-{{ $report->status }}">{{ $report->status }}</span>
            &nbsp; &middot; &nbsp;
            {{ $report->school->name }} &middot; {{ $report->incident_date->format('d/m/Y') }}
        </div>
    </div>

    @if(!Auth::user()->isPelapor() && $relatedReportsCount > 0)
        <div class="alert-info">
            <strong>Laporan terkait:</strong> Ada {{ $relatedReportsCount }} laporan lain dari sekolah dan jadwal distribusi yang sama.
        </div>
    @endif

    <div class="card">
        <div class="card-section-title">Informasi Laporan</div>

        <div class="grid">
            <div class="field">
                <span class="field-label">Pelapor</span>
                <span class="field-value">{{ $report->user->name }}</span>
            </div>

            <div class="field">
                <span class="field-label">Sekolah</span>
                <span class="field-value">{{ $report->school->name }}</span>
            </div>

            <div class="field">
                <span class="field-label">Tanggal Kejadian</span>
                <span class="field-value">{{ $report->incident_date->format('d/m/Y') }}</span>
            </div>

            <div class="field">
                <span class="field-label">Jumlah Terdampak</span>
                <span class="field-value">{{ $report->affected_count }} orang</span>
            </div>

            <div class="field full">
                <span class="field-label">Distribusi</span>
                <span class="field-value">
                    {{ $report->mbgDistribution->distribution_date->format('d/m/Y') }} ({{ $report->mbgDistribution->meal_time }}) &middot;
                    {{ $report->mbgDistribution->menu_description }}
                </span>
            </div>

            <div class="field full">
                <span class="field-label">Gejala / Keluhan</span>
                <span class="field-value">{{ $report->symptoms_description }}</span>
            </div>

            <div class="field full">
                <span class="field-label">Bukti</span>
                <span class="field-value">
                    @if($report->evidence_path)
                        <a href="{{ asset('storage/' . $report->evidence_path) }}" target="_blank" class="evidence-link">
                            Lihat Berkas Bukti
                        </a>
                    @else
                        <span class="muted">Tidak ada bukti diunggah</span>
                    @endif
                </span>
            </div>

            @if($report->notes)
                <div class="field full">
                    <span class="field-label">Catatan Telaah</span>
                    <span class="field-value">{{ $report->notes }}</span>
                </div>
            @endif

            @if($report->forwarded_to)
                <div class="field full">
                    <span class="field-label">Diteruskan Kepada</span>
                    <span class="field-value">{{ $report->forwarded_to }}</span>
                </div>
            @endif
        </div>
    </div>

    @can('review', $report)
        <div class="action-card">
            <div class="action-head"><span class="action-dot"></span> Telaah Pemantau</div>
            <div class="action-body">
                <form action="{{ route('reports.review', $report) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="notes">Catatan Verifikasi</label>
                        <textarea id="notes" name="notes" rows="3" required placeholder="Tulis hasil verifikasi bukti atau keterkaitan dengan kasus serupa..."></textarea>
                    </div>
                    <button type="submit" class="btn-action">Tandai Ditinjau</button>
                </form>
            </div>
        </div>
    @endcan

    @can('forward', $report)
        <div class="action-card">
            <div class="action-head"><span class="action-dot"></span> Tindak Lanjut Koordinator</div>
            <div class="action-body">

                @if($report->status === 'ditinjau')
                    <form action="{{ route('reports.forward', $report) }}" method="POST">
                        @csrf
                        <input type="hidden" name="action" value="forward">
                        <div class="form-group">
                            <label for="forwarded_to">Pihak yang Dihubungi</label>
                            <input type="text" id="forwarded_to" name="forwarded_to" required placeholder="Contoh: Puskesmas, SPPG, pihak sekolah">
                        </div>
                        <div class="form-group">
                            <label for="coord_notes">Catatan (Opsional)</label>
                            <textarea id="coord_notes" name="notes" rows="2" placeholder="Catatan hasil koordinasi..."></textarea>
                        </div>
                        <button type="submit" class="btn-action">Catat Penerusan</button>
                    </form>
                @endif

                @if($report->status === 'ditinjau' && in_array($report->status, ['ditinjau', 'diteruskan']))
                    <div class="divider"></div>
                @endif

                @if(in_array($report->status, ['ditinjau', 'diteruskan']))
                    <form action="{{ route('reports.forward', $report) }}" method="POST">
                        @csrf
                        <input type="hidden" name="action" value="finish">
                        <button type="submit" class="btn-finish">Selesaikan Laporan</button>
                    </form>
                @endif
            </div>
        </div>
    @endcan
</div>

</body>
</html>