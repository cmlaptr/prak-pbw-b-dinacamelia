<?php
// kalkulator.php[cite: 1]
$hasil = null;
$pesan = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $a = (float) ($_POST['a'] ?? 0);
    $b = (float) ($_POST['b'] ?? 0);
    $operator = $_POST['operator'] ?? '+';

    switch ($operator) {
        case '+': $hasil = $a + $b; break;
        case '-': $hasil = $a - $b; break;
        case '*': $hasil = $a * $b; break;
        case '/':
            if ($b == 0) {
                $pesan = 'Pembagian dengan nol tidak diperbolehkan.';
            } else {
                $hasil = $a / $b;
            }
            break;
        case '%': // Modifikasi Logic: Operator Modulo (Sisa Bagi)
            if ($b == 0) {
                $pesan = 'Modulo dengan nol tidak diperbolehkan.';
            } else {
                $hasil = $a % $b;
            }
            break;
        default: $pesan = 'Operator tidak valid.';
    }
}
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Kalkulator Sederhana</title>
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
            max-width: 360px;
            text-align: center;
        }
        .card h1 {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 20px;
        }
        .input-group {
            margin-bottom: 15px;
        }
        input, select {
            width: 100%;
            padding: 12px;
            margin: 6px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 1rem;
            outline: none;
            transition: border-color 0.3s;
        }
        input:focus, select:focus {
            border-color: #8402b8;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #8402b8;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
            margin-top: 10px;
        }
        button:hover {
            background-color: #ff97d7;
        }
        .result-box {
            margin-top: 20px;
            padding: 12px;
            border-radius: 6px;
            background-color: #f8f9fa;
            border-left: 4px solid #8402b8;
            text-align: left;
        }
        .error-box {
            margin-top: 20px;
            padding: 12px;
            border-radius: 6px;
            background-color: #f8d7da;
            color: #721c24;
            border-left: 4px solid #dc3545;
            text-align: left;
        }
    </style>
</head>
<body>

    <div class="card">
        <h1>Kalkulator</h1>
        <form method="post">
            <div class="input-group">
                <input type="number" step="any" name="a" required placeholder="Angka Pertama">
                <select name="operator">
                    <option value="+">+</option>
                    <option value="-">-</option>
                    <option value="*">*</option>
                    <option value="/">/</option>
                    <option value="%">% (Sisa Bagi)</option>
                </select>
                <input type="number" step="any" name="b" required placeholder="Angka Kedua">
            </div>
            <button type="submit">Hitung</button>
        </form>

        <?php if ($pesan): ?>
            <div class="error-box">
                <p><?= htmlspecialchars($pesan) ?></p>
            </div>
        <?php elseif ($hasil !== null): ?>
            <div class="result-box">
                <p><strong>Hasil:</strong> <?= htmlspecialchars((string)$hasil) ?></p>
            </div>
        <?php endif; ?>
    </div>

</body>
</html>