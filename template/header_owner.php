<?php
session_start();
//ini mengatasi jika user langsung masuk menggunakan link, tanpa login
if(empty($_SESSION['id_user'])or empty($_SESSION['username']))
{
  echo "<script>
      alert ('Maaf untuk mengakses halaman ini, silahkan login terlebih dahulu!');
      document.location='index.php';
      </script>";
}
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Home Of Beauty | Beauty Angel Pamekasan</title>
  </head>
  <body>
    <!---Awal Menu--->
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container">
          <img class="mb-6" src="file/logo.png" alt="" width="50" height="50">
            <a class="navbar-brand text-white" href="?">Beauty Angel Pamekasan</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="?">Home <span class="sr-only">(current)</span></a>
                  </li>
                   <li class="nav-item">
                    <a class="nav-link" href="?halaman=owner">Data Owner</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="?halaman=pelanggan">Data Pelanggan</a>
                  </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Search</button>
                </form>
              </div> 
            </div>
     
    </nav>
    <!--akhir-->
    <!--awal container-->


    <div class="container">