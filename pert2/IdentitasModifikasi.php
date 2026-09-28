<?php
// identitas.php
interface Identitas
{
    public function ringkasan(): string;
}

class Mahasiswa implements Identitas
{
    private string $nim;
    private string $nama;
    private string $jurusan; // Modifikasi 1: Tambah properti jurusan
    protected float $ipk;

    public function __construct(string $nim, string $nama, string $jurusan, float $ipk)
    {
        $this->nim = $nim;
        $this->nama = $nama;
        $this->jurusan = $jurusan;
        $this->setIpk($ipk);
    }

    public function setIpk(float $ipk): void
    {
        if ($ipk < 0 || $ipk > 4) {
            throw new InvalidArgumentException('IPK harus 0 sampai 4.');
        }
        $this->ipk = $ipk;
    }

    public function getIpk(): float
    {
        return $this->ipk;
    }

    public function ringkasan(): string
    {
        // Modifikasi 2: Menyesuaikan format output ringkasan
        return "NIM: {$this->nim} <br> Nama: {$this->nama} <br> Jurusan: {$this->jurusan} <br> IPK: {$this->ipk}";
    }
}

// Inisialisasi Objek dengan data baru
$mhs = new Mahasiswa('4524210028', 'Dina Camelia', 'Teknik Informatika', 3.98);
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Profil Mahasiswa</title>
    <style>
        /* Modifikasi Styling: Card di Tengah */
        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background: linear-gradient(135deg, #ff9ec6, #bacaff);
            display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0;
        }
        .card {
            background: white; padding: 25px; border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1); width: 100%; max-width: 350px;
        }
        h2 { color: #333; margin-top: 0; border-bottom: 2px solid #af4c72; padding-bottom: 10px; }
        .data { line-height: 1.8; color: #555; font-size: 1.1rem; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Identitas Mahasiswa</h2>
        <div class="data">
            <?= $mhs->ringkasan(); ?>
        </div>
    </div>
</body>
</html>