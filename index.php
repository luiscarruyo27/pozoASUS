<?php
include 'config.php';
	if (isset($_POST['guardar']))
	{
	$medicion=$_POST['medicion'];
	$fecha=$_POST['fecha'];


		$sql=mysqli_query($con,"insert into ingreso(medicion,fecha)
		values('$medicion','$fecha')");

	}



	if (isset($_POST['mostrar']))
	{

$sql = "select * from ingreso";
	$query = $con->query($sql);
	$data = array();
	while($r = $query->fetch_object()){
		$data[]=$r;




	}
}


		 ?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.min.css">
    <title>Pozo Petrolero ASUS</title>
</head>
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    	<script src="js/chart.min.js"></script>
<body>

<form method="post" class="box">
    <h1>Medicion de Manometros en el pozo ASUS</h1>

    <div class="form-group col-md-8">
        <input class="form-control" type="text" name="medicion" placeholder="Presion(PSI)">
    </div>

    <div class="form-group col-md-8">
        <label>Fecha de Medición</label>
        <input class="form-control" type="date" name="fecha">
    </div>

    <div class="">
        <button class="btn btn-primary"
            type="submit" name="guardar">Añadir
        </button>
    </div>

</form>

<form method="post" class="box">
    <div id="resp">
        <button class="btn btn-primary"
            type="submit" name="mostrar">Mostrar
        </button>
    </div>
</form>



<canvas id="chart1" style="width:100%;" height="100"></canvas>

<script>
var ctx = document.getElementById("chart1");
var data = {
        labels: [
        <?php foreach($data as $d):?>
        "<?php echo $d->fecha?>",
        <?php endforeach; ?>
        ],
        datasets: [{
            label: '$ Presion(PSI)',
            data: [
        <?php foreach($data as $d):?>
        <?php echo $d->medicion;?>,
        <?php endforeach; ?>
            ],
            backgroundColor: "#fd7e14",
            borderColor: "#9b59b6",
            borderWidth: 1
        }]
    };
var options = {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    };
var chart1 = new Chart(ctx, {
    type: 'bar', /* valores: line, bar*/
    data: data,
    options: options
});

</script>

</body>

</html>