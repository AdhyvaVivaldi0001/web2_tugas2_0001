<?php
class Mahasiswa {
    var $nim_0001;
    var $nama_0001;
    var $jurusan_0001;

    function __construct($nim_0001, $nama_0001, $jurusan_0001) {
        $this->nim_0001 = $nim_0001;
        $this->nama_0001 = $nama_0001;
        $this->jurusan_0001 = $jurusan_0001;
    }

    function tampilkanInfo_0001() {
        echo "NIM: $this->nim_0001, Nama: $this->nama_0001, Jurusan: $this->jurusan_0001";
    }

    function ubahJurusan_0001($jurusanBaru_0001) {
        $this->jurusan_0001 = $jurusanBaru_0001;
        echo "Jurusan berhasil diubah menjadi $this->jurusan_0001";
    }
}
?>
