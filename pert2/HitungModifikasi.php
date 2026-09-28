<?php
// hitung.php
interface BisaDihitung
{
    public function hargaAkhir(): float;
}

class Produk implements BisaDihitung
{
    // Modifikasi 1: Tambah properti kategori melalui Constructor Promotion
    public function __construct(
        protected string $nama,
        protected float $harga,
        protected string $kategori = 'Umum' 
    ){}

    public function hargaAkhir(): float
    {
        return $this->harga;
    }

    public function getNama(): string
    {
        return $this->nama;
    }
    
    public function getKategori(): string
    {
        return $this->kategori;
    }
}

class ProdukDiskon extends Produk
{
    public function __construct(string $nama, float $harga, private float $diskon, string $kategori = 'Umum')
    {
        parent::__construct($nama, $harga, $kategori);
    }

    public function hargaAkhir(): float
    {
        return $this->harga * (1 - $this->diskon / 100);
    }
}

// Modifikasi 2: Tambah data produk baru
$daftar = [
    new Produk('Keyboard', 250000, 'Aksesoris'),
    new ProdukDiskon('Mouse', 150000, 10, 'Aksesoris'),
    new ProdukDiskon('Monitor', 2000000, 15, 'Hardware')
];
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Daftar Harga Produk</title>
    <style>
        /* Modifikasi Styling: Card di Tengah */
        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background: linear-gradient(135deg, #ff9ec6, #bacaff);
            display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0;
        }
        .card {
            background: white; padding: 25px; border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1); width: 100%; max-width: 450px;
        }
        h2 { text-align: center; color: #333; margin-top: 0; }
        .item { 
            display: flex; justify-content: space-between; 
            padding: 12px 0; border-bottom: 1px dashed #ccc;
        }
        .item:last-child { border-bottom: none; }
        .kategori { font-size: 0.8rem; color: #888; display: block; }
        .harga { font-weight: bold; color: #ff1d7b; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Daftar Produk</h2>
        <?php foreach ($daftar as $produk): ?>
            <div class="item">
                <div>
                    <strong><?= htmlspecialchars($produk->getNama()) ?></strong>
                    <span class="kategori"><?= htmlspecialchars($produk->getKategori()) ?></span>
                </div>
                <div class="harga">
                    Rp <?= number_format($produk->hargaAkhir(), 0, ',', '.') ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>