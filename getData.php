<?php 

include 'koneksi.php';

$result= mysqli_query($koneksi, 'SELECT * FROM indikator');

$data  = mysqli_fetch_assoc($result);

header('Content-Type: application/json');
echo json_encode($data);

?>
