<?php

 //koneksi ke database akademik

 $server = "localhost";

  $user = "";

 $pass = "";

 $dbname = "";



 $koneksi = mysqli_connect($server,$user,$pass,$dbname);

 if(mysqli_connect_errno()){

  echo "Koneksi database gagal".mysqli_connect_error();

 }

?>