<?php
    // Nama : Yesi Dwi Ningtias
    // NIM  : 24060122120027

    function hitung_rata($array) {
        $total = array_sum($array);
        $jumlah = count($array);
        return $total / $jumlah;
    }

    function print_mhs($array_mhs) {
        echo "<table border= '1'>";
        echo "<tr><td>Nama</td><td>Nilai 1</td><td>Nilai 2</td><td>Nilai 3</td><td>Rata2</td></tr>";

        foreach ($array_mhs as $nama => $nilai) {
            $rata2 = hitung_rata($nilai);

            echo "<tr>";
            echo "<td>{$nama}</td>";
            echo "<td>{$nilai[0]}</td>";
            echo "<td>{$nilai[1]}</td>";
            echo "<td>{$nilai[2]}</td>";
            echo "<td>{$rata2}</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    // Array data mahasiswa
    $array_mhs = [
        'Abdul' => [89, 90, 54],
        'Budi' => [78, 60, 64],
        'Nina' => [67, 56, 84],
    ];

    // Menampilkan data mahasiswa dalam bentuk tabel
    print_mhs($array_mhs);
?>
