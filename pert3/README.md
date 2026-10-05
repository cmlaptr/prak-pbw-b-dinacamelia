# Laporan Praktikum Pemrograman Web

Nama: Dina Camelia Putri <br>
NPM: 4524210028

Laporan ini berisi dokumentasi pelaksanaan **Praktikum Pemrograman Web**, yang mencakup tangkapan layar (*screenshot*) query contoh dan query modifikasi beserta output pengeksekusiannya per pertemuan, penjelasan query krusial, serta analisis *error*.

---

## 1. Deskripsi Program / Praktikum

Praktikum ini berfokus pada eksekusi dan manipulasi query database/skrip Pemrograman Web. Dokumentasi dibagi berdasarkan pertemuan praktikum yang terdiri dari 4 bagian utama:
1. **Tabel Contoh & Latihan**: Dokumentasi eksekusi query acuan/dasar dari materi praktikum.
2. **Tabel Modifikasi**: Dokumentasi eksekusi query yang telah dimodifikasi atau dikembangkan sesuai dengan tantangan/tugas mandiri.
3. **5 Bagian Penting**: 5 bagian penting pada query yang telah dijalankan.
4. **Error**: Error yang terdapat pada query dan cara mengatasinya.

---

## 2. Dokumentasi Query & Output per Pertemuan

### Pertemuan 3

#### A. Tabel Contoh
| No | Query | Output |
| :---: | :--- | :--- |
| 1 | <img src="gambar/create-db.png" alt="Screenshot Query Contoh 1" width="350"> | <img src="gambar/output-create-db.png" alt="Screenshot Output Contoh 1" width="350"> |
| 2 | <img src="gambar/create-tabel-1.png" alt="Screenshot Query Contoh 2" width="350"> | <img src="gambar/output-create-tabel-1.png" alt="Screenshot Output Contoh 2" width="350"> |
| 3 | <img src="gambar/connect-tabel-1.png" alt="Screenshot Query Contoh 3" width="350"> | <img src="gambar/output-connect-tabel-1.png" alt="Screenshot Output Contoh 3" width="350"> |
| 4 | <img src="gambar/insert-1.png" alt="Screenshot Query Contoh 4" width="350"> | <img src="gambar/output-insert-1.png" alt="Screenshot Output Contoh 4" width="350"> |

#### B. Tabel Latihan
| No | Query | Output |
| :---: | :--- | :--- |
| 1 | <img src="gambar/create-akademik1.png" alt="Screenshot Query Contoh 1" width="350"> | <img src="gambar/output-create-akademik1.png" alt="Screenshot Output Latihan 1" width="350"> |
| 2 | <img src="gambar/create-tabel-krs.png" alt="Screenshot Query Contoh 2" width="350"> | <img src="gambar/output-create-tabel-krs.png" alt="Screenshot Output Latihan 2" width="350"> |

#### C. Tabel Modifikasi
| No | Query | Output |
| :---: | :--- | :--- |
| 1 | <img src="pert3/gambar/latmodifikasi.png" alt="Screenshot Query Modifikasi 1" width="350"> | <img src="pert3/gambar/p1-output-latmodifikasi.png" alt="Screenshot Output Modifikasi 1" width="350"> |

---

## 3. Penjelasan 5 Bagian Query/Kode Paling Penting

1. **`CREATE TABLE` dengan Constraints & Relasi (`PRIMARY KEY`, `FOREIGN KEY`, `CHECK`) [Pertemuan 3: DATABASE MYSQL DASAR]**
Perintah DDL (*Data Definition Language*) untuk membuat struktur tabel baru beserta aturan integritas data (*data integrity*), seperti penentuan *Primary Key* unik, *Foreign Key* untuk menghubungkan relasi antar tabel (misalnya tabel `mahasiswa` dengan `prodi`), serta klausa `CHECK` untuk memvalidasi rentang nilai data (seperti pembatasan IPK antara 0.00 hingga 4.00).


2. **`INSERT INTO ... VALUES (...)` [Pertemuan 4: SQL QUERY DASAR]**
Perintah DML (*Data Manipulation Language*) yang berfungsi untuk memasukkan satu atau beberapa baris (*record*) data baru secara sekaligus ke dalam kolom-kolom tabel yang ada di dalam database.


3. **`SELECT ... WHERE ...` [Pertemuan 4: SQL QUERY DASAR]**
Query utama yang digunakan untuk mengambil, menampilkan, dan menyaring (*filtering*) data tertentu dari tabel berdasarkan kriteria spesifik (misalnya menyaring mahasiswa berdasarkan `id_prodi` atau IPK) tanpa mengubah data asli di database.


4. **`UPDATE ... SET ... WHERE ...` [Pertemuan 4: SQL QUERY DASAR]**
Perintah DML untuk memperbarui atau mengubah nilai pada satu/beberapa kolom data. Penggunaan klausa `WHERE` sangat krusial agar perubahan nilai hanya berdampak pada baris spesifik yang dituju (misalnya berdasarkan `nim` atau `id`) dan tidak mengubah seluruh isi tabel secara tidak sengaja.


5. **`GROUP BY` dan Fungsi Agregasi (`COUNT`, `AVG`, `ROUND`) [Pertemuan 4: SQL QUERY DASAR]**
Klausa yang digunakan untuk mengelompokkan baris-baris data yang memiliki nilai sama pada kolom tertentu (seperti `prodi` atau `angkatan`), lalu menghitung statistik ringkasannya seperti total jumlah *record* (`COUNT`), rata-rata (`AVG`), dan pembulatan desimal (`ROUND`).

---

## 4. Error, Penyebab, dan Langkah Perbaikan

- **Error:**  
  `Data truncated for column 'ipk' at row 1`
- **Penyebab:**  
  disebabkan oleh ketidaksesuaian tipe data atau presisi pada kolom `ipk` di database `akademik` (misalnya menggunakan tipe `INT` atau `DECIMAL(3,1)`) sehingga angka desimal dipotong otomatis oleh MySQL.
- **Langkah Perbaikan:**  
  diatasi dengan memperbarui struktur tabel melalui perintah SQL `ALTER TABLE mahasiswa MODIFY COLUMN ipk DECIMAL(3,2);` agar kolom `ipk` memiliki presisi yang sesuai untuk menampung format dua digit angka di belakang koma secara sempurna.