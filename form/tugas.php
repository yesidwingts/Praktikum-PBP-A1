    <!--Nama : Yesi Dwi Ningtias
        NIM  : 24060122120027 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tugas Form Input Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        .error {
            color: red;
            font-size: 0.875em;
        }
    </style>
    <script>
        function validateForm() {
            const nis = document.getElementById('nis').value;
            const kelas = document.getElementById('kelas').value;
            const ekstrakurikuler = document.querySelectorAll('input[name="ekstrakurikuler[]"]:checked');
        }

        function toggleEkstrakurikuler() {
            const kelas = document.getElementById('kelas').value;
            const ekstrakurikulerDiv = document.getElementById('ekstrakurikulerSection');
            
            if (kelas === 'XII') {
                ekstrakurikulerDiv.style.display = 'none';
            } else {
                ekstrakurikulerDiv.style.display = 'block';
            }
        }

        // Call toggleEkstrakurikuler on page load to handle pre-filled values
        document.addEventListener('DOMContentLoaded', function() {
            toggleEkstrakurikuler();
        });
    </script>
</head>
<body>
<?php
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$error_nis = $error_nama = $error_kelas = $error_jenis_kelamin = $error_ekstrakurikuler = "";
$nis = $nama = $kelas = $jenis_kelamin = '';
$ekstrakurikuler = [];

if (isset($_POST['submit'])) {
    $nama = test_input($_POST['nama']);
    if (empty($nama)) {
        $error_nama = "Nama harus diisi";
    } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $nama)) {
        $error_nama = "Nama hanya dapat berisi huruf dan spasi";
    }

    $nis = test_input($_POST['nis']);
    if (empty($nis)) {
        $error_nis = "NIS harus diisi";
    } elseif (!preg_match("/^[0-9]{10}$/", $nis)) {
        $error_nis = "NIS harus terdiri dari 10 angka";
    }

    $jenis_kelamin = isset($_POST['jenis_kelamin']) ? test_input($_POST['jenis_kelamin']) : '';
    if (empty($jenis_kelamin)) {
        $error_jenis_kelamin = "Jenis kelamin harus diisi";
    }

    $kelas = $_POST['kelas'];
    if ($kelas == '-' || empty($kelas)) {
        $error_kelas = "Kelas harus dipilih";
    }

    if ($kelas != 'XII') {
        if (isset($_POST["ekstrakurikuler"]) && count($_POST["ekstrakurikuler"]) >= 1 && count($_POST["ekstrakurikuler"]) <= 3) {
            $ekstrakurikuler = $_POST["ekstrakurikuler"];
        } else {
            $error_ekstrakurikuler = "Pilih minimal 1 dan maksimal 3 ekstrakurikuler";
        }
    }
}
?>
    <div class="container mt-5 border rounded p-0">
        <div class="bg-light rounded-top p-2 text-dark border">Form Input Siswa</div>
        <form method="post" onsubmit="return validateForm()">
            <div class="form-group m-2">
                <label for="nis" class="label">NIS:</label><br />
                <input type="text" class="form-control" id="nis" name="nis" maxlength="10" value="<?php if (isset($nis)) { echo $nis; } ?>">
                <div class="error"><?php echo $error_nis; ?></div>
            </div>
            <div class="form-group m-2">
                <label for="nama">Nama:</label><br />
                <input type="text" class="form-control" id="nama" name="nama" maxlength="50" value="<?php if (isset($nama)) { echo $nama; } ?>">
                <div class="error"><?php echo $error_nama; ?></div>
            </div>
            <label class="check m-2">Jenis kelamin:</label><br />
            <div class="form-check m-2">
                <input type="radio" class="form-check-input" name="jenis_kelamin" value="pria" <?php if ($jenis_kelamin == 'pria') echo 'checked'; ?>>Pria
            </div>
            <div class="form-check m-2">
                <input type="radio" class="form-check-input" name="jenis_kelamin" value="wanita" <?php if ($jenis_kelamin == 'wanita') echo 'checked'; ?>>Wanita
            </div>
            <div class="error"><?php echo $error_jenis_kelamin; ?></div>
            <div class="form-group m-2">
                <label for="kelas">Kelas:</label><br />
                <select name="kelas" id="kelas" class="form-control" onchange="toggleEkstrakurikuler()">
                    <option value="-" selected disable>-- Pilih Kelas --</option>
                    <option value="X" <?php if ($kelas == 'X') echo 'selected'; ?>>X</option>
                    <option value="XI" <?php if ($kelas == 'XI') echo 'selected'; ?>>XI</option>
                    <option value="XII" <?php if ($kelas == 'XII') echo 'selected'; ?>>XII</option>
                </select>
                <div class="error"><?php echo $error_kelas; ?></div>
            </div>
            <div id="ekstrakurikulerSection" class="m-2" style="<?php echo ($kelas == 'XII') ? 'display: none;' : ''; ?>">
                <label class="check m-2">Ekstrakurikuler:</label><br />
                <div class="form-check m-2">
                    <input type="checkbox" class="form-check-input" name="ekstrakurikuler[]" value="pramuka" <?php if (in_array('pramuka', $ekstrakurikuler)) echo 'checked'; ?>>Pramuka
                </div>
                <div class="form-check m-2">
                    <input type="checkbox" class="form-check-input" name="ekstrakurikuler[]" value="seni_tari" <?php if (in_array('seni_tari', $ekstrakurikuler)) echo 'checked'; ?>>Seni Tari
                </div>
                <div class="form-check m-2">
                    <input type="checkbox" class="form-check-input" name="ekstrakurikuler[]" value="sinematografi" <?php if (in_array('sinematografi', $ekstrakurikuler)) echo 'checked'; ?>>Sinematografi
                </div>
                <div class="form-check m-2">
                    <input type="checkbox" class="form-check-input" name="ekstrakurikuler[]" value="musik" <?php if (in_array('musik', $ekstrakurikuler)) echo 'checked'; ?>>Musik
                </div>
                <div class="error"><?php echo $error_ekstrakurikuler; ?></div>
            </div>
            <div class="m-2">
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </div>
        </form> 
        <div class="container">
        <?php
            if (isset($_POST["submit"])) {
                echo "<h3 style='margin-top:0px;'>Your Input:</h3>";
                echo 'NIS = '.$_POST['nis'].'</br>';
                echo 'Nama = '.$_POST['nama'].'</br>';
                if (isset($_POST['jenis_kelamin'])) {
                    echo 'Jenis Kelamin = ' . $_POST['jenis_kelamin'] . '</br>';
                } else {
                    echo '<span class="teks-merah">Jenis kelamin belum diatur!</br></span>';
                }
                echo 'Kelas = '.$_POST['kelas'].'</br>';

                if (isset($_POST['ekstrakurikuler'])) {
                    echo 'Ekstrakurikuler = '.implode(", ", $_POST['ekstrakurikuler']).'</br>';
                } else {
                    echo 'Ekstrakurikuler = Tidak ada yang dipilih</br>';
                }
            }
        ?>
    </div>
    </div>
</body>
</html>
