<?php 

$file = file_get_contents ('/sys/bus/w1/devices/28-000006377ed6/w1_slave', true);

//$file = file_get_contents('./test.txt', true);

$length = strlen($file);

$value = substr($file, $lenght - 6, 5) / 1000;

 ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<style>
* {
    margin-left: 20px;
}

.btn-success {
	margin-left: 80px;
}
</style>
</head>
<body>

<p>Current temperature is: </p> 
<h3>
<?php 

if ($file == false){
echo 'Could not read file.';

} else {

echo round($value, 1)." degrees";

}

$temps = array();

for ($i=0; $i < 24; $i++) {

	$izero = $i;

	if ($i < 10) { 
		$izero = "0".$i;
	}

	$handle = fopen('temp/'.$izero, "r");
	array_push($temps, fgets($handle));
}


/*$handle = fopen("tempvalues.txt", "r");
$line = fgets($handle);
$line = fgets($handle);*/


 ?>
</h3>
 </br>

<form action="write_data.php" method="post">
<label for="settemp">Set temperature: </label>
<input type="text" name="settemp" id="settemp"></input>
<input type="submit" class="btn btn-primary" name="form_temp"  value="Set"></input>

</form>

</br>

<h4>Presets:</h4>
</br>

<form action="write_data.php" method="post">

<label for="temp1">0:00</label>
<input type="text" name="temp1" id="temp1" value="<?php echo $temps[0]; ?>"></input>
</br>
</br>

<label for="temp2">7:00</label>
<input type="text" name="temp2" id="temp2" value="<?php echo $temps[7]; ?>"></input>
</br>
</br>

<label for="temp3">9:00</label>
<input type="text" name="temp3" id="temp3" value="<?php echo $temps[9]; ?>"></input>
</br>
</br>

<label for="temp4">11:00</label>
<input type="text" name="temp4" id="temp4" value="<?php echo $temps[11]; ?>"></input>
</br>
</br>

<label for="temp5">13:00</label>
<input type="text" name="temp5" id="temp5" value="<?php echo $temps[13]; ?>"></input>
</br>
</br>

<label for="temp6">15:00</label>
<input type="text" name="temp6" id="temp6" value="<?php echo $temps[15]; ?>"></input>
</br>
</br>

<label for="temp7">17:00</label>
<input type="text" name="temp7" id="temp7" value="<?php echo $temps[17]; ?>"></input>
</br>
</br>

<label for="temp8">19:00</label>
<input type="text" name="temp8" id="temp8" value="<?php echo $temps[19]; ?>"></input>
</br>
</br>

<label for="temp9">21:00</label>
<input type="text" name="temp9" id="temp9" value="<?php echo $temps[21]; ?>"></input>
</br>
</br>

<label for="temp10">23:00</label>
<input type="text" name="temp10" id="temp10" value="<?php echo $temps[23]; ?>"></input>
</br>
</br>
 
<input type="submit" class="btn btn-success" value="Submit" name="form_presets">

</form>


</body>
</html>