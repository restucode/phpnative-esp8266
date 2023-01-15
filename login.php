
<!DOCTYPE html>
<html>

<head>
    <title>Kelompok 10 - Implementasi PHP Native, AJAX, dan ESP8266</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body >  
  <div class="container mt-4">
    <h2 class="pb-2">Login Page</h2>
    <!-- cek pesan notifikasi -->
	<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "gagal"){
			echo "<div class='alert alert-danger' role='alert'>Data yang anda masukkan tidak sesuai dengan di database!</div>";
		}else if($_GET['pesan'] == "logout"){
      echo "<div class='alert alert-success' role='alert'>Anda berhasil logout</div>";
		}else if($_GET['pesan'] == "belum_login"){
			echo "<div class='alert alert-danger' role='alert'>Anda harus login untuk mengakses halaman admin</div>";
		}
	}
	?>
    <form method="post" action="cek_login.php">
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" class="form-control" id="username" aria-describedby="username" autocomplete="off">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password" autocomplete="off">
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</body>

</html>