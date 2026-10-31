<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Laporan #{{ $report->id }}</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f5f7f5; color: #252d28; padding: 24px; }
        .container { max-width: 600px; margin: 0 auto; }
        .back-link { display: inline-block; color: #52675a; text-decoration: none; font-size: 14px; margin-bottom: 20px; }
        .card { background: #ffffff; border: 1px solid #e7ebe7; border-radius: 8px; padding: 24px; }
        h2 { font-size: 18px; margin-bottom: 16px; border-bottom: 1px solid #eee; padding-bottom: 10px; }
        .form-group { margin-bottom: 16px; }
        label { display: block; font-size: 14px; font-weight: 600; margin-bottom: 6px; }
        input, textarea { width: 100%; padding: 10px; border: 1px solid #dce3dd; border-radius: 6px; font-family: inherit; font-size: 14px; }
        textarea { height: 110px; resize: vertical; }
        .info-box { background: #f8fafc; border: 1px solid #e2e8f0; padding: 12px; border-radius: 6px; font-size: 13px; margin-bottom: 16px; line-height: 1.5; color: #475569; }
        .btn-submit { background: #287746; color: white; border: none; padding: 10px 18px; border-radius: 6px; font-weight: 600; cursor: pointer; }
        .btn-submit:hover { background: #205f38; }
        .btn-cancel { color: #666; text-decoration: none; font-size: 14px; margin-left: 12px; }
    </style>
</head>
<body>

<div class="container">
    <a href="{{ route('reports.show', $report) }}" class="back-link">&larr; Kembali ke Detail Laporan</a>

    <div class="card">
        <h2>Ubah Laporan #{{ $report->id }}</h2>

        <div class="info-box">
            <strong>Sekolah:</strong> {{ $report->school->name }}<br>
            <strong>Distribusi:</strong> {{ $report->mbgDistribution->distribution_date->format('d/m/Y') }} - {{ $report->mbgDistribution->menu_description }}
        </div>

        <form action="{{ route('reports.update', $report) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="affected_count">Jumlah Korban Terdampak</label>
                <input type="number" id="affected_count" name="affected_count" min="1" value="{{ old('affected_count', $report->affected_count) }}" required>
            </div>

            <div class="form-group">
                <label for="symptoms_description">Gejala / Keluhan</label>
                <textarea id="symptoms_description" name="symptoms_description" required>{{ old('symptoms_description', $report->symptoms_description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="evidence">Ganti Bukti Pendukung (Opsional)</label>
                <input type="file" id="evidence" name="evidence" accept=".jpg,.jpeg,.png,.pdf">
                <small style="color: #666; font-size: 12px;">Format JPG, PNG, atau PDF (maksimal 2 MB).</small>
            </div>

            <button type="submit" class="btn-submit">Simpan Perubahan</button>
            <a href="{{ route('reports.show', $report) }}" class="btn-cancel">Batal</a>
        </form>
    </div>
</div>

</body>
</html>