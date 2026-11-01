<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Laporan #{{ $report->id }}</title>

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

        .container { max-width: 860px; margin: 0 auto; }

        .back-link {
            display: inline-block;
            color: #4a5c4e;
            text-decoration: none;
            font-size: 13px;
            margin-bottom: 18px;
        }

        .back-link:hover { color: #1f5c37; text-decoration: underline; }

        .form-shell {
            display: grid;
            grid-template-columns: 260px 1fr;
            background: #ffffff;
            border: 1px solid #e3e8e4;
            border-radius: 14px;
            overflow: hidden;
        }

        .form-side {
            background: linear-gradient(160deg, #26713f 0%, #1c4f2c 100%);
            color: #ffffff;
            padding: 28px 22px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
        }

        .form-side::after {
            content: "";
            position: absolute;
            left: -50px;
            bottom: -50px;
            width: 160px;
            height: 160px;
            border: 1px solid rgba(255, 255, 255, 0.14);
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
            margin-bottom: 20px;
        }

        .form-side h2 {
            font-size: 18px;
            font-weight: 700;
            line-height: 1.35;
            margin-bottom: 12px;
        }

        .side-meta {
            display: flex;
            flex-direction: column;
            gap: 10px;
            font-size: 12px;
            color: rgba(255, 255, 255, 0.88);
            line-height: 1.6;
        }

        .side-meta strong {
            display: block;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            color: rgba(255, 255, 255, 0.65);
            margin-bottom: 2px;
        }

        .side-foot {
            margin-top: 24px;
            font-size: 11px;
            color: rgba(255, 255, 255, 0.7);
        }

        .form-main { padding: 28px 30px; }

        .form-main h1 {
            font-size: 19px;
            font-weight: 700;
            letter-spacing: -0.3px;
            margin-bottom: 6px;
        }

        .form-main .lead {
            color: #6b756d;
            font-size: 12.5px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .form-group { margin-bottom: 18px; }

        label {
            display: block;
            font-size: 12.5px;
            font-weight: 600;
            margin-bottom: 7px;
            color: #2c362f;
        }

        input, textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #d6dcd8;
            border-radius: 7px;
            background: #fbfcfb;
            font-family: inherit;
            font-size: 13px;
            color: #2c362f;
            outline: none;
            transition: border-color 0.15s, background 0.15s, box-shadow 0.15s;
        }

        input:focus, textarea:focus {
            background: #ffffff;
            border-color: #2f7a4d;
            box-shadow: 0 0 0 3px rgba(47, 122, 77, 0.12);
        }

        textarea { height: 110px; resize: vertical; line-height: 1.6; }

        .field-description {
            display: block;
            color: #7a847c;
            font-size: 11px;
            margin-top: 6px;
            line-height: 1.5;
        }

        .form-footer {
            display: flex;
            align-items: center;
            gap: 10px;
            border-top: 1px solid #eef1ee;
            padding-top: 18px;
            margin-top: 6px;
        }

        .btn-submit {
            background: #26713f;
            color: #ffffff;
            border: 1px solid #26713f;
            padding: 10px 18px;
            border-radius: 7px;
            font-family: inherit;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.15s, border-color 0.15s;
        }

        .btn-submit:hover { background: #1e5a32; border-color: #1e5a32; }

        .btn-cancel {
            color: #5a665e;
            text-decoration: none;
            font-size: 13px;
            padding: 10px 14px;
            border: 1px solid #cfd6d1;
            border-radius: 7px;
            background: #ffffff;
            transition: background 0.15s;
        }

        .btn-cancel:hover { background: #f2f4f2; }

        @media (max-width: 760px) {
            .form-shell { grid-template-columns: 1fr; }
            .form-side::after { display: none; }
            .form-main { padding: 24px 22px; }
        }

        @media (max-width: 560px) {
            body { padding: 20px 12px; }
            .form-side { padding: 22px 18px; }
            .form-main { padding: 22px 18px; }
            .form-footer { flex-direction: column-reverse; align-items: stretch; }
            .btn-submit, .btn-cancel { width: 100%; text-align: center; }
        }
    </style>
</head>
<body>

<div class="container">
    <a href="{{ route('reports.show', $report) }}" class="back-link">&larr; Kembali ke Detail Laporan</a>

    <div class="form-shell">

        <aside class="form-side">
            <div>
                <span class="side-tag">Ubah Laporan</span>
                <h2>Perbarui data laporan #{{ $report->id }}.</h2>

                <div class="side-meta">
                    <div>
                        <strong>Sekolah</strong>
                        {{ $report->school->name }}
                    </div>
                    <div>
                        <strong>Distribusi</strong>
                        {{ $report->mbgDistribution->distribution_date->format('d/m/Y') }}<br>
                        {{ $report->mbgDistribution->menu_description }}
                    </div>
                </div>
            </div>

            <div class="side-foot">
                &copy; {{ date('Y') }} Pemantauan MBG
            </div>
        </aside>

        <main class="form-main">
            <h1>Ubah Laporan</h1>
            <p class="lead">Perbarui data sesuai kondisi terbaru. Cek lagi sebelum simpan.</p>

            <form action="{{ route('reports.update', $report) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="affected_count">Jumlah yang Terdampak</label>
                    <input type="number" id="affected_count" name="affected_count" min="1" value="{{ old('affected_count', $report->affected_count) }}" required>
                </div>

                <div class="form-group">
                    <label for="symptoms_description">Gejala / Keluhan</label>
                    <textarea id="symptoms_description" name="symptoms_description" required>{{ old('symptoms_description', $report->symptoms_description) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="evidence">Ganti Bukti (Opsional)</label>
                    <input type="file" id="evidence" name="evidence" accept=".jpg,.jpeg,.png,.pdf">
                    <small class="field-description">Satu file JPG, PNG, atau PDF. Maksimal 2 MB.</small>
                </div>

                <div class="form-footer">
                    <a href="{{ route('reports.show', $report) }}" class="btn-cancel">Batal</a>
                    <button type="submit" class="btn-submit">Simpan Perubahan</button>
                </div>
            </form>
        </main>

    </div>
</div>

</body>
</html>