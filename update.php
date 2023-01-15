<?php

session_start();
if($_SESSION['status']!="login"){
    header("location:login.php?pesan=belum_login");
}


include "koneksi.php";

switch ($_GET['action'])
{

    case 'updateLampu1':

        $lampu1 = $_POST['lampu1'];

        $query = mysqli_query($koneksi, "UPDATE indikator SET lampu1 =$lampu1 WHERE id=1");
        if ($query)
        {
            echo "Simpan Data Berhasil";
        }
        else
        {
            echo "Simpan Data Gagal :" . mysqli_error($koneksi);
        }
    break;

    case 'updateLampu2':

        $lampu2 = $_POST['lampu2'];

        $query = mysqli_query($koneksi, "UPDATE indikator SET lampu2 =$lampu2 WHERE id=1");
        if ($query)
        {
            echo "Simpan Data Berhasil";
        }
        else
        {
            echo "Simpan Data Gagal :" . mysqli_error($koneksi);
        }
    break;

    case 'updateLampu3':

        $lampu3 = $_POST['lampu3'];

        $query = mysqli_query($koneksi, "UPDATE indikator SET lampu3 =$lampu3 WHERE id=1");
        if ($query)
        {
            echo "Simpan Data Berhasil";
        }
        else
        {
            echo "Simpan Data Gagal :" . mysqli_error($koneksi);
        }
    break;

    case 'updatePagar':

        $pagar = $_POST['pagar'];

        $query = mysqli_query($koneksi, "UPDATE indikator SET pagar =$pagar WHERE id=1");
        if ($query)
        {
            echo "Simpan Data Berhasil";
        }
        else
        {
            echo "Simpan Data Gagal :" . mysqli_error($koneksi);
        }
    break;

    case 'updatePintu':

        $pintu = $_POST['pintu'];

        $query = mysqli_query($koneksi, "UPDATE indikator SET pintu =$pintu WHERE id=1");
        if ($query)
        {
            echo "Simpan Data Berhasil";
        }
        else
        {
            echo "Simpan Data Gagal :" . mysqli_error($koneksi);
        }
    break;


}
?>