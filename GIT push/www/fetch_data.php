<?php 

//$file = file_get_contents ('./sys/bus/w1/devices/10-000802d03a7d', true);

$file = file_get_contents('./test.txt', true);

$length = strlen($file);

$value = substr($file, $lenght - 6, 5) / 1000;

if ($file == false){
echo 'Could not read file.';

} else {

$value = round($value, 1);

}

$fh = fopen('./test.txt', 'w') or die("can't open file");
fwrite($fh, $value;
fclose($fh);

?>
