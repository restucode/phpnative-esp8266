
<?php 


include 'koneksi.php';

$result = mysqli_query($koneksi, 'SELECT * FROM indikator');

$data = mysqli_fetch_assoc($result);

$sensor = mysqli_query($koneksi, 'SELECT * FROM sensor');

$dataSensor = mysqli_fetch_assoc($sensor);



?>
<div class="row d-flex align-items-center justify-content-center">
    <div class="col-md-4 box d-flex justify-content-center align-items-center flex-column">

        <h1>LR 1</h1>

        <label class="switch">
        <input type="checkbox" class="lampu1"
        <?php if ($data['lampu1'] == 1) : ?>
        <?php echo 'checked="true"' ?>
        <?php endif ?>
        <?php if ($data['lampu1'] == 0) : ?>
        <?php endif ?>
        >
        <span class="slider round"></span>
        </label>

        <svg class="icon-svg" fill="none" 
        <?php if ($data['lampu1'] == 1) : ?>
        <?php echo 'stroke="green"' ?>
        <?php endif ?>
        <?php if ($data['lampu1'] == 0) : ?>
        <?php echo 'stroke="red"' ?>
        <?php endif ?>
        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>
    </div>

    <div class="col-md-4 box d-flex justify-content-center align-items-center flex-column">

        <h1>LR 2</h1>

        <label class="switch">
        <input type="checkbox" class="lampu2"
        <?php if ($data['lampu2'] == 1) : ?>
        <?php echo 'checked="true"' ?>
        <?php endif ?>
        <?php if ($data['lampu2'] == 0) : ?>
        <?php endif ?>
        >
        <span class="slider round"></span>
        </label>

        <svg class="icon-svg" fill="none" 
        <?php if ($data['lampu2'] == 1) : ?>
        <?php echo 'stroke="green"' ?>
        <?php endif ?>
        <?php if ($data['lampu2'] == 0) : ?>
        <?php echo 'stroke="red"' ?>
        <?php endif ?>
        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>
    </div>

    <div class="col-md-4 box d-flex justify-content-center align-items-center flex-column">

        <h1>LR 3</h1>

        <label class="switch">
        <input type="checkbox" class="lampu3"
        <?php if ($data['lampu3'] == 1) : ?>
        <?php echo 'checked="true"' ?>
        <?php endif ?>
        <?php if ($data['lampu3'] == 0) : ?>
        <?php endif ?>
        >
        <span class="slider round"></span>

        </label>

        <svg class="icon-svg" fill="none"
        <?php if ($data['lampu3'] == 1) : ?>
        <?php echo 'stroke="green"' ?>
        <?php endif ?>
        <?php if ($data['lampu3'] == 0) : ?>
        <?php echo 'stroke="red"' ?>
        <?php endif ?>
        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>
    
    </div>

    <div class="col-md-4 box d-flex justify-content-center align-items-center flex-column">

        <h1>Lampu RT</h1>

        <label class="switch">
        <input type="checkbox" class="pagar"
        <?php if ($data['pagar'] == 1) : ?>
        <?php echo 'checked="true"' ?>
        <?php endif ?>
        <?php if ($data['pagar'] == 0) : ?>
        <?php endif ?>
        >
        <span class="slider round"></span>
        </label>

        <svg class="icon-svg" fill="none"
        <?php if ($data['pagar'] == 1) : ?>
        <?php echo 'stroke="green"' ?>
        <?php endif ?>
        <?php if ($data['pagar'] == 0) : ?>
        <?php echo 'stroke="red"' ?>
        <?php endif ?>
        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>
    </div>
    
       <div class="row mt-5">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <h2>Sensor Suhu</h2>
                    <div id="getSuhu" hidden></div>
                    
                </div>
                <div class="col-md-6">
                    <div class="alert alert-primary humidity" role="alert">Humidify ...</div>
                </div>
                <div class="col-md-6">
                    <div class="alert alert-primary tempc" role="alert">Temp C ...</div>
                </div>
                <div class="col-md-4">
                    <div class="alert alert-primary tempf" role="alert">Temp F ...</div>
                </div>
                <div class="col-md-4">
                    <div class="alert alert-primary hic" role="alert">Heat Index C ...</div>
                </div>
                 <div class="col-md-4">
                    <div class="alert alert-primary hif" role="alert">Heat Index F ...</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <h2>Ultrasonic</h2>
                </div>
                <div class="col-md-12">
                    <div id="getSensor" hidden></div>
                    <div class='alert alert-primary wcStatus' role='alert'>Status WC ...</div>
                </div>
            </div>
        </div>
    </div>

   
</div>


<a href="logout.php" class="btn btn-warning btn-lg mt-5">Logout</a>


<script>
    $(document).ready(function() {
        setInterval(function() {
            $("#getSensor").load("getSensor.php")
            
            var getStatus = $("#getSensor").html();
            console.log(getStatus)
            
            if(getStatus < 10) {
                $(".wcStatus").html("Status WC = Sedang Digunakan")
            } else {
                  $(".wcStatus").html("Status WC = Tidak Digunakan")
            }
            
            $("#getSuhu").load("getSuhu.php")
            
            var getSuhu = $("#getSuhu").html();
            var myArr= getSuhu.split(" ");
            
            $(".humidity").html("Humidity: "+ myArr[0] +" %")
            $(".tempc").html("Temp: "+ myArr[1] +" °C")
            $(".tempf").html("Temp: "+ myArr[2] +" °F")
            $(".hic").html("Heat Index: "+ myArr[3] +" °C")
            $(".hif").html("Heat Index: "+ myArr[4] +" °F")
            
            

        }, 1000)
    })
</script>