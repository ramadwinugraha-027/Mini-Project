<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Pemantauan MBG</title>
    <style>
        body { font-family: system-ui, sans-serif; background: #f8fafc; margin: 0; padding: 2rem; }
        .container { max-width: 800px; margin: 0 auto; background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
        .header { display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #e2e8f0; padding-bottom: 1rem; }
        .badge {
            background-color: #e0e7ff;
            color: #3730a3;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
        }
        .logout-btn {
            background-color: #ef4444;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 500;
        }
        .logout-btn:hover { background-color: #dc2626; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div>
                <h1 style="margin: 0; font-size: 1.5rem; color: #0f172a;">Dashboard Utama</h1>
                <p style="margin: 0.25rem 0 0 0; color: #64748b;">Selamat datang, <strong>{{ Auth::user()->name }}</strong></p>
            </div>
            <div>
                <span class="badge">Peran: {{ Auth::user()->role }}</span>
            </div>
        </div>

        <div style="margin-top: 1.5rem; color: #334155;">
            <p>Anda berhasil login ke sistem sebagai <strong>{{ Auth::user()->role }}</strong>.</p>
            <p>Fitur relasi data, pelaporan, dan peninjauan akan diaktifkan pada tahapan berikutnya.</p>
        </div>

        <div style="margin-top: 2rem; border-top: 1px solid #e2e8f0; padding-top: 1rem;">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn">Keluar (Logout)</button>
            </form>
        </div>
    </div>
</body>
</html>