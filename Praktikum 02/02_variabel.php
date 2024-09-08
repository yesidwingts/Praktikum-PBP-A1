<?php
    // Nama : Yesi Dwi Ningtias
    // NIM  : 24060122120027
    
    // VARIABEL*************************************************
    //assign nilai ke variabel
    $a = 15;
    echo 'Variabel a berisi : '.$a.'<br />';
    $a = 'Pemrograman Web dan Internet';
    echo 'Variabel a berisi : '.$a.'<br />';

    // VARIABEL LOKAL********************************************
    echo '<br />VARIABEL LOKAL<br />';
    // Define a function
    function diskon( ){
        $harga = 1000;
        $harga = 0.2 * $harga;
    }
    $harga = 2000;
    diskon();
    echo 'harga = '.$harga.'<br />';

    // VARIABEL GLOBAL*******************************************   
    echo '<br />VARIABEL GLOBAL<br />';
    function diskon1( ){
        // Define harga as a global variable
        global $harga;
        // Multiple harga by 0.8
        $harga = 0.8 * $harga;
    }
    // Set harga
    $harga = 2000;
    // Call the function
    diskon1( );
    // Display the age
    echo 'harga = '.$harga.'<br />';

    // VARIABEL STATIK*******************************************
    echo '<br />VARIABEL STATIK<br />';
    // Define the function
    function diskon2( ){
        // Define harga as a static variable
        static $harga = 1000;
        $harga = 0.8 * $harga;
        
        echo 'harga = '.$harga.'<br />';
    }
    // Set harga to 2000
    $harga = 30;
    // Call the function twice
    diskon2();
    diskon2();
    // Display the harga
    echo 'harga = '.$harga.'<br />';

    // VARIABEL SUPER GLOBAL*******************************************
    echo '<br />VARIABEL SUPER GLOBAL<br />';
    echo htmlentities($_SERVER["PHP_SELF"]);
?>
