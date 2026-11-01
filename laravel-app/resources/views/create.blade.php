<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lapor Keluhan Makanan MBG</title>

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
            padding: 32px 20px;
            font-size: 14px;
            display: flex;
            justify-content: center;
            align-items: flex-start;
        }

        .container {
            width: 100%;
            max-width: 960px;
            margin: 0 auto;
        }

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

        .back-button:hover svg { stroke: #26713f; }

        .form-shell {
            display: grid;
            grid-template-columns: 320px 1fr;
            background: #ffffff;
            border: 1px solid #e3e8e4;
            border-radius: 14px;
            overflow: hidden;
        }

        .form-side {
            background: linear-gradient(160deg, #26713f 0%, #1c4f2c 100%);
            color: #ffffff;
            padding: 36px 28px;
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
            width: 180px;
            height: 180px;
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 50%;
            pointer-events: none;
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
            margin-bottom: 24px;
        }

        .form-side h2 {
            font-size: 20px;
            font-weight: 700;
            line-height: 1.35;
            margin-bottom: 12px;
        }

        .form-side p {
            font-size: 13px;
            line-height: 1.7;
            color: rgba(255, 255, 255, 0.85);
            margin-bottom: 24px;
        }

        .btn-side {
            display: inline-block;
            background: #ffffff;
            color: #1c4f2c;
            font-size: 13px;
            font-weight: 600;
            padding: 10px 16px;
            border-radius: 6px;
            text-decoration: none;
            text-align: center;
            border: 1px solid #ffffff;
            transition: background 0.15s, color 0.15s;
            width: fit-content;
            position: relative;
            z-index: 1;
        }

        .btn-side:hover { background: #eaf5ec; color: #1c4f2c; }

        .side-list {
            list-style: none;
            margin-top: 28px;
            display: flex;
            flex-direction: column;
            gap: 12px;
            border-top: 1px solid rgba(255, 255, 255, 0.15);
            padding-top: 24px;
            position: relative;
            z-index: 1;
        }

        .side-list li {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.9);
            display: flex;
            gap: 10px;
            line-height: 1.5;
        }

        .side-list li::before {
            content: "";
            flex-shrink: 0;
            width: 6px;
            height: 6px;
            margin-top: 6px;
            border-radius: 50%;
            background: #b5e1c5;
        }

        .side-foot {
            margin-top: 30px;
            font-size: 11px;
            color: rgba(255, 255, 255, 0.6);
            position: relative;
            z-index: 1;
        }

        .form-main { padding: 36px 40px; }

        .form-main h1 {
            font-size: 22px;
            font-weight: 700;
            letter-spacing: -0.3px;
            margin-bottom: 6px;
        }

        .form-main .lead {
            color: #6b756d;
            font-size: 13px;
            line-height: 1.6;
            margin-bottom: 24px;
        }

        .alert-error {
            background: #fdf3f3;
            border: 1px solid #e8c4c4;
            color: #9c2b2b;
            padding: 12px 16px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 12px;
            line-height: 1.6;
        }

        .alert-error strong { display: block; margin-bottom: 4px; }
        .alert-error ul { margin: 0; padding-left: 16px; }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .form-group { margin-bottom: 18px; }

        label {
            display: block;
            font-size: 12.5px;
            font-weight: 600;
            margin-bottom: 8px;
            color: #2c362f;
        }

        .required { color: #c94a4a; margin-left: 2px; }

        .field-description {
            display: block;
            font-size: 11px;
            color: #7a847c;
            margin-top: 6px;
            line-height: 1.5;
        }

        select, input, textarea {
            display: block;
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #d6dcd8;
            border-radius: 6px;
            background: #fbfcfb;
            color: #2c362f;
            font-family: inherit;
            font-size: 13px;
            outline: none;
            transition: border-color 0.15s, background 0.15s, box-shadow 0.15s;
        }

        select { cursor: pointer; }

        select:disabled {
            background: #f2f4f2;
            color: #8d968f;
            cursor: not-allowed;
        }

        input::placeholder, textarea::placeholder { color: #9aa39c; }

        select:focus, input:focus, textarea:focus {
            background: #ffffff;
            border-color: #2f7a4d;
            box-shadow: 0 0 0 3px rgba(47, 122, 77, 0.12);
        }

        textarea { min-height: 110px; resize: vertical; line-height: 1.6; }

        .loading {
            display: none;
            color: #4a6b55;
            font-size: 11px;
            margin-top: 6px;
        }

        .form-footer {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 12px;
            border-top: 1px solid #eef1ee;
            padding-top: 20px;
            margin-top: 10px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 6px;
            font-family: inherit;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            text-align: center;
            cursor: pointer;
            transition: background 0.15s, border-color 0.15s;
        }

        .btn-cancel {
            color: #5a665e;
            background: #ffffff;
            border: 1px solid #cfd6d1;
        }

        .btn-cancel:hover { background: #f2f4f2; }

        .btn-submit {
            color: #ffffff;
            background: #26713f;
            border: 1px solid #26713f;
        }

        .btn-submit:hover { background: #1e5a32; border-color: #1e5a32; }

        @media (max-width: 860px) {
            .form-shell { grid-template-columns: 1fr; }
            .form-side { padding: 28px 24px; }
            .form-side::after { display: none; }
            .form-main { padding: 28px 24px; }
        }

        @media (max-width: 560px) {
            body { padding: 20px 14px; }
            .form-row { grid-template-columns: 1fr; gap: 0; }
            .form-footer { flex-direction: column-reverse; align-items: stretch; }
            .btn { width: 100%; }
            .btn-side { width: 100%; }
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

    <div class="form-shell">

        <aside class="form-side">
            <div>
                <span class="side-tag">Laporan Baru</span>
                <h2>Laporkan keluhan makanan MBG.</h2>
                <p>Isi data kejadian dengan lengkap supaya laporan bisa cepat ditindaklanjuti.</p>
                <a href="#form-laporan" class="btn-side">Mulai Isi Form &darr;</a>
                <ul class="side-list">
                    <li>Pilih sekolah dan jadwal distribusi.</li>
                    <li>Isi jumlah terdampak dan gejalanya.</li>
                    <li>Lampirkan bukti bila ada.</li>
                </ul>
            </div>
            <div class="side-foot">
                &copy; {{ date('Y') }} Pemantauan MBG
            </div>
        </aside>

        <main class="form-main" id="form-laporan">
            <h1>Lapor Keluhan Makanan</h1>
            <p class="lead">Isi data sesuai kejadian. Cek lagi sebelum kirim.</p>

            <form action="{{ route('reports.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                @if ($errors->any())
                    <div class="alert-error">
                        <strong>Ada isian yang belum benar:</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-group">
                    <label for="school_id">Sekolah<span class="required">*</span></label>
                    <select id="school_id" name="school_id" required>
                        <option value="" disabled selected hidden>Pilih sekolah</option>
                        @foreach($schools as $school)
                            <option value="{{ $school->id }}">{{ $school->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="mbg_distribution_id">Jadwal Distribusi<span class="required">*</span></label>
                    <select id="mbg_distribution_id" name="mbg_distribution_id" required disabled>
                        <option value="" disabled selected hidden>Pilih sekolah dulu</option>
                    </select>

                    <div id="loading" class="loading" role="status" aria-live="polite">
                        Memuat data distribusi...
                    </div>

                    <small class="field-description">Pilih jadwal distribusi yang terkait dengan keluhan.</small>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="incident_date">Tanggal Kejadian<span class="required">*</span></label>
                        <input type="date" id="incident_date" name="incident_date" required>
                    </div>

                    <div class="form-group">
                        <label for="affected_count">Jumlah Terdampak<span class="required">*</span></label>
                        <input type="number" id="affected_count" name="affected_count" min="1" value="1" required placeholder="Contoh: 5">
                    </div>
                </div>

                <div class="form-group">
                    <label for="symptoms_description">Gejala / Keluhan<span class="required">*</span></label>
                    <textarea id="symptoms_description" name="symptoms_description" placeholder="Contoh: mual, sakit perut, atau makanan terlihat tidak layak." required></textarea>
                    <small class="field-description">Tulis keluhan dengan jelas dan singkat.</small>
                </div>

                <div class="form-group">
                    <label for="evidence">Bukti (Opsional)</label>
                    <input type="file" id="evidence" name="evidence" accept=".jpg,.jpeg,.png,.pdf">
                    <small class="field-description">Satu file JPG, PNG, atau PDF. Maksimal 2 MB.</small>
                </div>

                <div class="form-footer">
                    <a href="{{ route('dashboard') }}" class="btn btn-cancel">Batal</a>
                    <button type="submit" class="btn btn-submit">Kirim Laporan</button>
                </div>
            </form>
        </main>

    </div>
</div>

<script>
    const schoolSelect = document.getElementById('school_id');
    const distSelect = document.getElementById('mbg_distribution_id');
    const loading = document.getElementById('loading');

    function formatTanggal(dateString) {
        const d = new Date(dateString);
        const day = String(d.getDate()).padStart(2, '0');
        const month = String(d.getMonth() + 1).padStart(2, '0');
        const year = d.getFullYear();
        return `${day}/${month}/${year}`;
    }

    schoolSelect.addEventListener('change', async function () {
        const schoolId = this.value;

        distSelect.innerHTML = '';

        if (!schoolId) {
            distSelect.innerHTML = '<option value="" disabled selected hidden>Pilih sekolah dulu</option>';
            distSelect.disabled = true;
            loading.style.display = 'none';
            return;
        }

        distSelect.disabled = true;
        distSelect.innerHTML = '<option value="" disabled selected hidden>Memuat...</option>';
        loading.style.display = 'block';

        try {
            const response = await fetch(
                '/schools/' + encodeURIComponent(schoolId) + '/mbg-distributions'
            );

            if (!response.ok) {
                throw new Error('Gagal memuat data.');
            }

            const result = await response.json();

            if (result.data.length === 0) {
                distSelect.innerHTML = '<option value="" disabled selected hidden>Tidak ada distribusi</option>';
                distSelect.disabled = true;
                return;
            }

            distSelect.innerHTML = '<option value="" disabled selected hidden>Pilih distribusi</option>';

            result.data.forEach(function (item) {
                const option = document.createElement('option');
                option.value = item.id;
                
                const tglRapi = formatTanggal(item.distribution_date);
                option.textContent = `${tglRapi} (${item.meal_time}) - ${item.menu_description}`;
                
                distSelect.appendChild(option);
            });

            distSelect.disabled = false;

        } catch (error) {
            distSelect.innerHTML = '<option value="" disabled selected hidden>Gagal memuat data</option>';
            console.error(error);
        } finally {
            loading.style.display = 'none';
        }
    });
</script>

</body>
</html>