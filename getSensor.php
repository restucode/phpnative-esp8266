<?php 

include 'koneksi.php';

$result= mysqli_query($koneksi, 'SELECT * FROM sensor');

$data  = mysqli_fetch_assoc($result);

$nilai = $data["ultrasonic"];

echo $nilai;

?>
