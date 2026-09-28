<?php
// biodata.php[cite: 1]
function statusKelulusan (float $ipk): string
{
    if ($ipk >= 3.50) return 'Sangat Memuaskan';
    if ($ipk >= 3.00) return 'Memuaskan';
    if ($ipk >= 2.00) return 'Perlu Peningkatan'; // Modifikasi: Logika Kategori Tambahan
    return 'Tidak Lulus';
}

$mahasiswa = [
    'nim' => '4524210028',
    'nama' => 'Dina Camelia',
    'fakultas' => 'Teknik', // Modifikasi Field: Tambah Fakultas
    'prodi' => 'Teknik Informatika',
    'semester' => 5,
    'ipk' => 3.98
];
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Biodata Mahasiswa</title>
    <style>
        /* Modifikasi Styling: Card di Tengah Layar */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #eb9cff, #cfd1f3);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .card {
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        .card h1 {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
            border-bottom: 2px solid #cc00ff;
            padding-bottom: 10px;
        }
        .info-list {
            list-style: none;
            margin-bottom: 20px;
        }
        .info-item {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }
        .info-label {
            font-weight: bold;
            color: #555;
        }
        .info-value {
            color: #222;
        }
        .predikat-box {
            background-color: #e8f4ea;
            border-left: 4px solid #28a745;
            padding: 12px;
            border-radius: 6px;
            text-align: center;
            font-size: 0.95rem;
        }
        .predikat-value {
            font-weight: bold;
            color: #28a745;
        }
    </style>
</head>
<body>

    <div class="card">
        <h1>Biodata Mahasiswa</h1>
        
        <ul class="info-list">
            <?php foreach ($mahasiswa as $kunci => $nilai): ?>
                <li class="info-item">
                    <span class="info-label"><?= ucfirst($kunci) ?>:</span>
                    <span class="info-value"><?= htmlspecialchars((string)$nilai) ?></span>
                </li>
            <?php endforeach; ?>
        </ul>

        <div class="predikat-box">
            <span>Predikat: </span>
            <span class="predikat-value"><?= statusKelulusan($mahasiswa['ipk']) ?></span>
        </div>
    </div>

</body>
</html>