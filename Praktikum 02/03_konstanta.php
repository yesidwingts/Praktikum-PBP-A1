<?php
    // Nama : Yesi Dwi Ningtias
    // NIM  : 24060122120027
    
    define("PWI", "Permograman Web dan Internet ");
    echo 'Hari ini sedang praktikum '.PWI.'<br />';
    $constant_name = "PWI";
    echo 'Hari ini sedang praktikum '.constant($constant_name).'<br />';

    //konstanta bawaan PHP
    echo 'File yang sedang diproses "'. __FILE__ .' pada baris "'. 
    __LINE__ .'"<br />';
?>