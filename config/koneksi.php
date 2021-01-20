<?php

//buat koneksi database


//persiapan identitas server
$server = "localhost"; //nama server
$user = "root";//username database
$pass = "";//password
$database = "dbbeauty-angel";//nama database

//koneksi database
$koneksi = mysqli_connect($server, $user, $pass, $database) or die (mysqli_error($koneksi));


?>