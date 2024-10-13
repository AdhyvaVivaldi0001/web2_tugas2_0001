<?php
require_once 'Mahasiswa.php'; // Memasukkan file Mahasiswa.php

// Membuat objek dari class Mahasiswa
$mahasiswa1_0001 = new Mahasiswa("23.230.0001", "Adhyva Vivaldi Al Luqman", "Sistem Informasi");
$mahasiswa2_0001 = new Mahasiswa("23.240.0069", "Arya", "Teknik Informatika");

// Menampilkan informasi mahasiswa
$mahasiswa1_0001->tampilkanInfo_0001();
echo "<br>";
$mahasiswa2_0001->tampilkanInfo_0001();
echo "<br>";

// Mengubah jurusan mahasiswa
$mahasiswa1_0001->ubahJurusan_0001("Manajemen Informatika");
?>
