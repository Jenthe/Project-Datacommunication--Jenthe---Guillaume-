<?php

if (isset($_POST["settemp"])) {
  $settemp = round($_POST["settemp"]);

  echo $settemp;

  switch ($settemp) {
    case 5:
    case 6:
    case 7:
    case 8:
    case 9:
    case 10:
    case 11:
    case 12:
        exec('irsend SEND_ONCE project KEY_0');
        break;
    case 13:
    case 14:
    case 15:
    case 16:
    case 17:
    case 18:
        exec('irsend SEND_ONCE project KEY_1');
        break;  
    case 19:
        exec('irsend SEND_ONCE project KEY_2');
        break;
    case 20:
        exec('irsend SEND_ONCE project KEY_3');
        break;    
    case 21:
        exec('irsend SEND_ONCE project KEY_4');
        break;
    case 22:
        exec('irsend SEND_ONCE project KEY_5');
        break;
    case 23:
        exec('irsend SEND_ONCE project KEY_6');
        break;        
    case 24:
        exec('irsend SEND_ONCE project KEY_7');
        break;
    case 25:
        exec('irsend SEND_ONCE project KEY_8');
        break;
    case 26:
        exec('irsend SEND_ONCE project KEY_9');
        break;                           
    default:
        exec('irsend SEND_ONCE project KEY_9');
      break;
  }

}

if (isset($_POST["form_presets"])) {

  echo "Values written.";
  $temp1 = $_POST["temp1"];
  $temp2 = $_POST["temp2"];
  $temp3 = $_POST["temp3"];
  $temp4 = $_POST["temp4"];
  $temp5 = $_POST["temp5"];
  $temp6 = $_POST["temp6"];
  $temp7 = $_POST["temp7"];
  $temp8 = $_POST["temp8"];
  $temp9 = $_POST["temp9"];
  $temp10 = $_POST["temp10"];

  $arraytemp = array($temp1, $temp2, $temp3, $temp4, $temp5, $temp6, $temp7, $temp8, $temp9, $temp10);
  $arraytemprounded = array();

  foreach ($arraytemp as $temp) {
    
      switch (round($temp)) {
    case 5:
    case 6:
    case 7:
    case 8:
    case 9:
    case 10:
    case 11:
    case 12:
      array_push($arraytemprounded, "5");
      break;
    case 13:
    case 14:
    case 15:
    case 16:
    case 17:
    case 18:
        array_push($arraytemprounded, "18");
        break;  
    case 19:
        array_push($arraytemprounded, "19");
        break;
    case 20:
        array_push($arraytemprounded, "20");
        break;    
    case 21:
        array_push($arraytemprounded, "21");
        break;
    case 22:
        array_push($arraytemprounded, "22");
        break;
    case 23:
        array_push($arraytemprounded, "23");
        break;        
    case 24:
        array_push($arraytemprounded, "24");
        break;
    case 25:
        array_push($arraytemprounded, "25");
        break;
    case 26:
        array_push($arraytemprounded, "26");
        break;                           
    default:
        array_push($arraytemprounded, "27");
      break;
    }  

  }

  file_put_contents('temp/00', $arraytemprounded[0]);
  file_put_contents('temp/01', $arraytemprounded[0]);
  file_put_contents('temp/02', $arraytemprounded[0]);
  file_put_contents('temp/03', $arraytemprounded[0]);
  file_put_contents('temp/04', $arraytemprounded[0]);
  file_put_contents('temp/05', $arraytemprounded[0]);
  file_put_contents('temp/06', $arraytemprounded[0]);

  file_put_contents('temp/07', $arraytemprounded[1]);
  file_put_contents('temp/08', $arraytemprounded[1]);

  file_put_contents('temp/09', $arraytemprounded[2]);
  file_put_contents('temp/10', $arraytemprounded[2]);

  file_put_contents('temp/11', $arraytemprounded[3]);
  file_put_contents('temp/12', $arraytemprounded[3]);

  file_put_contents('temp/13', $arraytemprounded[4]);
  file_put_contents('temp/14', $arraytemprounded[4]);

  file_put_contents('temp/15', $arraytemprounded[5]);
  file_put_contents('temp/16', $arraytemprounded[5]); 

  file_put_contents('temp/17', $arraytemprounded[6]);
  file_put_contents('temp/18', $arraytemprounded[6]);

  file_put_contents('temp/19', $arraytemprounded[7]);
  file_put_contents('temp/20', $arraytemprounded[7]);

  file_put_contents('temp/21', $arraytemprounded[8]);
  file_put_contents('temp/22', $arraytemprounded[8]);

  file_put_contents('temp/23', $arraytemprounded[9]);

  //$file = 'tempvalues.txt';
	// Open the file to get existing content
	//$current = file_get_contents($file);
	// Append a new temp to  the file
	//$line1 = "00;07;09;11;13;15;17;19;21;23;\r\n";
	//$current = $arraytemprounded[9];
	// Write the contents back to the files
	//file_put_contents($file, $line1.$current);

}

header('Location: app.php');
  ?>