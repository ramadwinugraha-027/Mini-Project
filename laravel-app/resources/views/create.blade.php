<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Laporan Keluhan MBG</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f7f5;
            color: #252d28;
            min-height: 100vh;
            padding: 36px 20px;
        }

        .container {
            width: 100%;
            max-width: 680px;
            margin: 0 auto;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #52675a;
            text-decoration: none;
            font-size: 14px;
            margin-bottom: 24px;
            transition: color 0.2s;
        }

        .back-link:hover {
            color: #247447;
        }

        .page-heading {
            margin-bottom: 24px;
        }

        .page-heading h1 {
            font-size: 27px;
            font-weight: 700;
            letter-spacing: -0.6px;
            margin-bottom: 9px;
        }

        .page-heading p {
            color: #737d76;
            font-size: 14px;
            line-height: 1.7;
        }

        .form-card {
            background: #ffffff;
            border: 1px solid #e7ebe7;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 16px rgba(30, 55, 38, 0.035);
        }

        .section-heading {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 7px;
        }

        .section-description {
            color: #818a83;
            font-size: 13px;
            line-height: 1.6;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 9px;
            color: #303b33;
        }

        .required {
            color: #d65353;
            margin-left: 3px;
        }

        .field-description {
            display: block;
            font-size: 12px;
            color: #818a83;
            margin-top: 7px;
            line-height: 1.5;
        }

        select,
        input,
        textarea {
            display: block;
            width: 100%;
            padding: 12px 13px;
            border: 1px solid #dce3dd;
            border-radius: 7px;
            background: #ffffff;
            color: #303b33;
            font-family: inherit;
            font-size: 14px;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        select {
            cursor: pointer;
        }

        select:disabled {
            background: #f5f7f5;
            color: #929a94;
            cursor: not-allowed;
        }

        input::placeholder,
        textarea::placeholder {
            color: #a0a8a2;
        }

        select:focus,
        input:focus,
        textarea:focus {
            border-color: #328451;
            box-shadow: 0 0 0 3px rgba(50, 132, 81, 0.10);
        }

        textarea {
            min-height: 125px;
            resize: vertical;
            line-height: 1.7;
        }

        .loading {
            display: none;
            color: #52735b;
            font-size: 12px;
            margin-top: 8px;
        }

        .form-footer {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 12px;
            border-top: 1px solid #edf0ed;
            padding-top: 22px;
            margin-top: 8px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 19px;
            border-radius: 7px;
            font-family: inherit;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: background 0.2s, border-color 0.2s;
        }

        .btn-cancel {
            color: #58645b;
            background: #ffffff;
            border: 1px solid #dce3dd;
        }

        .btn-cancel:hover {
            background: #f5f7f5;
        }

        .btn-submit {
            color: #ffffff;
            background: #287746;
            border: 1px solid #287746;
        }

        .btn-submit:hover {
            background: #205f38;
            border-color: #205f38;
        }

        .btn-submit:focus-visible,
        .btn-cancel:focus-visible,
        .back-link:focus-visible {
            outline: 3px solid rgba(50, 132, 81, 0.3);
            outline-offset: 3px;
        }

        @media (max-width: 600px) {
            body {
                padding: 24px 14px;
            }

            .page-heading h1 {
                font-size: 23px;
            }

            .form-card {
                padding: 22px 18px;
                border-radius: 10px;
            }

            .form-footer {
                flex-direction: column-reverse;
                align-items: stretch;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<div class="container">

    <a href="{{ route('dashboard') }}" class="back-link">
        &larr; Kembali ke Dashboard
    </a>

    <header class="page-heading">
        <h1>Form Laporan Keluhan Makanan MBG</h1>
        <p>
            Gunakan formulir ini untuk melaporkan keluhan makanan
            agar dapat ditindaklanjuti dengan tepat.
        </p>
    </header>

    <main class="form-card">

        <h2 class="section-heading">Informasi Laporan</h2>
        <p class="section-description">
            Lengkapi informasi berikut sesuai dengan kejadian yang dilaporkan.
            Pastikan data yang dimasukkan sudah benar.
        </p>

        <form action="#" method="POST">
            @csrf

            <div class="form-group">
                <label for="school_id">
                    Sekolah<span class="required">*</span>
                </label>

                <select id="school_id" name="school_id" required>
                    <option value="">Pilih sekolah</option>

                    @foreach($schools as $school)
                        <option value="{{ $school->id }}">
                            {{ $school->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="mbg_distribution_id">
                    Distribusi Makanan<span class="required">*</span>
                </label>

                <select
                    id="mbg_distribution_id"
                    name="mbg_distribution_id"
                    required
                    disabled
                >
                    <option value="">Pilih sekolah terlebih dahulu</option>
                </select>

                <div id="loading" class="loading" role="status" aria-live="polite">
                    Sedang mengambil data distribusi...
                </div>

                <small class="field-description">
                    Pilih distribusi makanan sesuai dengan kejadian yang dilaporkan.
                </small>
            </div>

            <div class="form-group">
                <label for="incident_date">
                    Tanggal Kejadian<span class="required">*</span>
                </label>

                <input
                    type="date"
                    id="incident_date"
                    name="incident_date"
                    required
                >
            </div>

            <div class="form-group">
                <label for="affected_count">
                    Jumlah Korban Terdampak<span class="required">*</span>
                </label>

                <input
                    type="number"
                    id="affected_count"
                    name="affected_count"
                    min="1"
                    value="1"
                    required
                    placeholder="Masukkan jumlah korban"
                >

                <small class="field-description">
                    Masukkan jumlah orang yang mengalami keluhan.
                </small>
            </div>

            <div class="form-group">
                <label for="symptoms_description">
                    Gejala atau Keluhan<span class="required">*</span>
                </label>

                <textarea
                    id="symptoms_description"
                    name="symptoms_description"
                    placeholder="Jelaskan keluhan yang dialami, misalnya mual, sakit perut, atau kondisi makanan yang ditemukan."
                    required
                ></textarea>

                <small class="field-description">
                    Jelaskan keluhan secara jelas agar laporan mudah dipahami.
                </small>
            </div>

            <div class="form-footer">
                <a href="{{ route('dashboard') }}" class="btn btn-cancel">
                    Batal
                </a>

                <button type="submit" class="btn btn-submit">
                    Kirim Laporan
                </button>
            </div>
        </form>

    </main>
</div>

<script>
    const schoolSelect = document.getElementById('school_id');
    const distSelect = document.getElementById('mbg_distribution_id');
    const loading = document.getElementById('loading');

    schoolSelect.addEventListener('change', async function () {
        const schoolId = this.value;

        // Reset distribusi ketika sekolah berubah.
        distSelect.innerHTML = '';

        if (!schoolId) {
            distSelect.innerHTML =
                '<option value="">Pilih sekolah terlebih dahulu</option>';

            distSelect.disabled = true;
            loading.style.display = 'none';
            return;
        }

        distSelect.disabled = true;
        distSelect.innerHTML =
            '<option value="">Memuat data distribusi...</option>';

        loading.style.display = 'block';

        try {
            const response = await fetch(
                '/schools/' + encodeURIComponent(schoolId) + '/mbg-distributions'
            );

            if (!response.ok) {
                throw new Error('Gagal mengambil data distribusi.');
            }

            const result = await response.json();

            distSelect.innerHTML =
                '<option value="">Pilih distribusi makanan</option>';

            result.data.forEach(function (item) {
                const option = document.createElement('option');

                option.value = item.id;
                option.textContent =
                    item.distribution_date +
                    ' (' + item.meal_time + ') - ' +
                    item.menu_description;

                distSelect.appendChild(option);
            });

            if (result.data.length === 0) {
                distSelect.innerHTML =
                    '<option value="">Tidak ada distribusi untuk sekolah ini</option>';
            }

            distSelect.disabled = result.data.length === 0;

        } catch (error) {
            distSelect.innerHTML =
                '<option value="">Gagal mengambil data distribusi</option>';

            console.error(error);

        } finally {
            loading.style.display = 'none';
        }
    });
</script>

</body>
</html>
