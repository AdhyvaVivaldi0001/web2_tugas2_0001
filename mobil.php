<!DOCTYPE html>
<html>
<head>
    <title>Informasi Mobil</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h1 class="my-4">Pilih Jenis Mobil</h1>
        <form method="post" action="">
            <div class="form-group">
                <label for="jenis">Jenis Mobil:</label>
                <select class="form-control" name="jenis" id="jenis">
                    <option value="MobilSport">Mobil Sport</option>
                    <option value="CityCar">City Car</option>
                </select>
            </div>
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" name="nama" id="nama" required>
            </div>
            <div class="form-group">
                <label for="merk">Merk:</label>
                <input type="text" class="form-control" name="merk" id="merk" required>
            </div>
            <div id="additionalFields"></div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <?php
        // Kelas dasar Mobil
        class Mobil {
            protected $nama;
            protected $merk;

            public function __construct($nama, $merk) {
                $this->nama = $nama;
                $this->merk = $merk;
            }

            public function cetakInfo() {
                echo "<p>Nama: " . $this->nama . "</p>";
                echo "<p>Merk: " . $this->merk . "</p>";
            }
        }

        // Kelas turunan MobilSport
        class MobilSport extends Mobil {
            private $kecepatan;
            private $turbo;

            public function __construct($nama, $merk, $kecepatan, $turbo) {
                parent::__construct($nama, $merk);
                $this->kecepatan = $kecepatan;
                $this->turbo = $turbo;
            }

            public function cetakInfo() {
                parent::cetakInfo();
                echo "<p>Kecepatan: " . $this->kecepatan . " km/jam</p>";
                echo "<p>Turbo: " . ($this->turbo ? "Ya" : "Tidak") . "</p>";
            }
        }

        // Kelas turunan CityCar
        class CityCar extends Mobil {
            private $model;
            private $irit;

            public function __construct($nama, $merk, $model, $irit) {
                parent::__construct($nama, $merk);
                $this->model = $model;
                $this->irit = $irit;
            }

            public function cetakInfo() {
                parent::cetakInfo();
                echo "<p>Model: " . $this->model . "</p>";
                echo "<p>Irit: " . ($this->irit ? "Ya" : "Tidak") . "</p>";
            }
        }

        // Proses form submission
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $jenis = $_POST["jenis"];
            $nama = $_POST["nama"];
            $merk = $_POST["merk"];

            if ($jenis == "MobilSport") {
                $kecepatan = $_POST["kecepatan"];
                $turbo = isset($_POST["turbo"]) ? true : false;
                $mobil = new MobilSport($nama, $merk, $kecepatan, $turbo);
            } elseif ($jenis == "CityCar") {
                $model = $_POST["model"];
                $irit = isset($_POST["irit"]) ? true : false;
                $mobil = new CityCar($nama, $merk, $model, $irit);
            }

            echo "<h2 class='mt-4'>Informasi Mobil:</h2>";
            $mobil->cetakInfo();
        }
        ?>

    </div>

    <script>
        document.getElementById('jenis').addEventListener('change', function() {
            var jenis = this.value;
            var additionalFields = document.getElementById('additionalFields');
            additionalFields.innerHTML = '';

            if (jenis == 'MobilSport') {
                additionalFields.innerHTML += '<div class="form-group">';
                additionalFields.innerHTML += '<label for="kecepatan">Kecepatan (km/jam):</label>';
                additionalFields.innerHTML += '<input type="number" class="form-control" name="kecepatan" id="kecepatan" required>';
                additionalFields.innerHTML += '</div>';
                additionalFields.innerHTML += '<div class="form-check">';
                additionalFields.innerHTML += '<input type="checkbox" class="form-check-input" name="turbo" id="turbo">';
                additionalFields.innerHTML += '<label class="form-check-label" for="turbo">Turbo</label>';
                additionalFields.innerHTML += '</div>';
            } else if (jenis == 'CityCar') {
                additionalFields.innerHTML += '<div class="form-group">';
                additionalFields.innerHTML += '<label for="model">Model:</label>';
                additionalFields.innerHTML += '<input type="text" class="form-control" name="model" id="model" required>';
                additionalFields.innerHTML += '</div>';
                additionalFields.innerHTML += '<div class="form-check">';
                additionalFields.innerHTML += '<input type="checkbox" class="form-check-input" name="irit" id="irit">';
                additionalFields.innerHTML += '<label class="form-check-label" for="irit">Irit</label>';
                additionalFields.innerHTML += '</div>';
            }
        });

        // Trigger change event on page load to display the correct additional fields
        document.getElementById('jenis').dispatchEvent(new Event('change'));
    </script>
</body>
</html>
