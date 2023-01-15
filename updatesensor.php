<?php 

include 'koneksi.php';


$ultrasonic = $_GET["ultrasonic"];
$humidity = $_GET["humidity"];
$tempc = $_GET["tempc"];
$tempf = $_GET["tempf"];
$hic = $_GET["hic"];
$hif = $_GET["hif"];

mysqli_query($koneksi, "UPDATE sensor SET ultrasonic='$ultrasonic', humidity='$humidity', tempc='$tempc', tempf='$tempf', hic='$hic', hif='$hif' WHERE id=1");
?>