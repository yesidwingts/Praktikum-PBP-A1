<?php
    // Nama : Yesi Dwi Ningtias
    // NIM  : 24060122120027
    
    require_once("06a_fungsi.php");
    //pemanggilan fungsi hitung_diskon
    $harga = 10000;
    $diskon = 20;
    $harga_diskon = hitung_diskon($harga,$diskon);
    echo 'Harga sebelum diskon = '.$harga.'<br />';
    echo 'Harga setelah diskon = '.$harga_diskon.'<br />';
    //pemanggilan fungsi faktorial
    print(faktorial(4));
?>