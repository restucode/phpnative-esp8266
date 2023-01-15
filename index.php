<?php 

session_start();
if($_SESSION['status']!="login"){
    header("location:login.php?pesan=belum_login");
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Kelompok 10 - Implementasi PHP Native, AJAX, dan ESP8266</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <!-- <script  src="jquery-3.6.3.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            //load data mahasiswa saat aplikasi dijalankan 
            loadData();

            // Load form add
            $("#contentData").on("click", ".lampu1", function(e) {
                if(e.target.checked == true) {
                    $.ajax({
                        url: 'update.php?action=updateLampu1',
                        type: 'post',
                        data: {
                            lampu1 : true
                        },
                        success: function(data) {
                    
                            loadData();
                        }
                    });
                } else if(e.target.checked == false) {
                    $.ajax({
                        url: 'update.php?action=updateLampu1',
                        type: 'post',
                        data: {
                            lampu1 : false
                        },
                        success: function(data) {
                        
                            loadData();
                        }
                    });
                }
            });

            $("#contentData").on("click", ".lampu2", function(e) {
                if(e.target.checked == true) {
                    $.ajax({
                        url: 'update.php?action=updateLampu2',
                        type: 'post',
                        data: {
                            lampu2 : true
                        },
                        success: function(data) {
                    
                            loadData();
                        }
                    });
                } else if(e.target.checked == false) {
                    $.ajax({
                        url: 'update.php?action=updateLampu2',
                        type: 'post',
                        data: {
                            lampu2 : false
                        },
                        success: function(data) {
                        
                            loadData();
                        }
                    });
                }
            });

            $("#contentData").on("click", ".lampu3", function(e) {
                if(e.target.checked == true) {
                    $.ajax({
                        url: 'update.php?action=updateLampu3',
                        type: 'post',
                        data: {
                            lampu3 : true
                        },
                        success: function(data) {
                    
                            loadData();
                        }
                    });
                } else if(e.target.checked == false) {
                    $.ajax({
                        url: 'update.php?action=updateLampu3',
                        type: 'post',
                        data: {
                            lampu3 : false
                        },
                        success: function(data) {
                        
                            loadData();
                        }
                    });
                }
            });

            $("#contentData").on("click", ".pagar", function(e) {
                if(e.target.checked == true) {
                    $.ajax({
                        url: 'update.php?action=updatePagar',
                        type: 'post',
                        data: {
                            pagar : true
                        },
                        success: function(data) {
                    
                            loadData();
                        }
                    });
                } else if(e.target.checked == false) {
                    $.ajax({
                        url: 'update.php?action=updatePagar',
                        type: 'post',
                        data: {
                            pagar : false
                        },
                        success: function(data) {
                        
                            loadData();
                        }
                    });
                }
            });

            $("#contentData").on("click", ".pintu", function(e) {
                if(e.target.checked == true) {
                    $.ajax({
                        url: 'update.php?action=updatePintu',
                        type: 'post',
                        data: {
                            pintu : true
                        },
                        success: function(data) {
                    
                            loadData();
                        }
                    });
                } else if(e.target.checked == false) {
                    $.ajax({
                        url: 'update.php?action=updatePintu',
                        type: 'post',
                        data: {
                            pintu : false
                        },
                        success: function(data) {
                        
                            loadData();
                        }
                    });
                }
            });

        })

        function loadData() {
            $.ajax({
                url: 'data-arduino.php',
                type: 'get',
                success: function(data) {
                    $('#contentData').html(data);
                }
            });
        }
    </script>
</head>

<body>  
    <div class="container text-center p-2 m-auto">
        <h2 class="my-5"> Tugas Pengembangan Aplikasi IoT</h2>
        <div id="contentData"></div>
        <footer class="mt-5">Copyright @Kelompok 10</footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</body>

</html>