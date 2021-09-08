
<?php
include "mcript.php";
                  
$UID = $_POST['UID'];
$benefit = $_POST['benefit'];
$act = $_POST['ACTIVITY'];
$a_global = $_POST['global'];
$a_done = $_POST['A_DONE'];
$TID = $_POST['type'];

$date_o = $_POST['date_o'] ;
$date_o_day = $_POST['date_o_day'];
$date_o = "$date_o_day $date_o";
$date_f = $_POST['date_f'];
$date_f_day = $_POST['date_o_day'];
$date_f = "$date_f_day $date_f";

$datemenor = strtotime($date_o);
$datemayor = strtotime($date_f);

$check_edit = $_GET['b'];

if($datemenor>"0000-00-00 00:00:00" && $datemayor>"0000-00-00 00:00:00")
if($datemenor<$datemayor){
require_once('Conexion.php');
$conn=new Conexion();
$conection = $conn->conectarse();


    if($check_edit == 0)
    {
        $request="INSERT INTO `activity_log`(`UID`, `DATE`, `DATE_FINAL`, `ACTIVITY`, `A_DONE`, `BENEFIT`, `GID`, `TID`) VALUES ($UID, '$date_o', '$date_f', '$act', '$a_done', $benefit, $a_global, $TID)";
    }
    else
    {
        $request="UPDATE `activity_log` SET `UID`='$UID',`DATE`='$date_o',`DATE_FINAL`='$date_f',`ACTIVITY`='$act',`A_DONE`='$a_done',`BENEFIT`=$benefit,`GID`=$a_global,`TID`=$TID WHERE AID = $check_edit";
    }

$result = mysqli_query($conection,$request);
mysqli_close($conection);
$dato_encriptado = $encriptar($UID);
if($result != NULL)
{	
	if($check_edit == 0)
    {
	echo "<script>
                alert('Los datos se ingresaron correctamente');
                window.location= 'new_act.php?sx=$UID'
    </script>";
    }
    else
    {
        echo "<script>
                alert('Los datos se ingresaron correctamente');
                window.location= 'act_rep.php?sx=$UID'
    </script>";
    }

}
else 
{
	if($check_edit == 0)
    {
	echo "<script>
                alert('Se ha producido un error, intente nuevamente.');
                 window.location= 'new_act.php?sx=$UID'
    </script>";

     }
    else
    {
        echo "<script>
                alert('Se ha producido un error, intente nuevamente.');
                window.location= 'act_rep.php?sx=$UID'
    </script>";
    }

}

}
else
{   if($check_edit == 0)
    {
    echo "<script>
                alert('La hora final debe ser mayor que la hora inicial.');
                 window.location= 'new_act.php?sx=$UID'
    </script>";
     }
    else
    {
        echo "<script>
                alert('La hora final debe ser mayor que la hora inicial.');
                window.location= 'act_rep.php?sx=$UID'
    </script>";
    }

}
else
{   if($check_edit == 0)
    {
     echo "<script>
                alert('Favor de revisar la fecha ingresada.');
                 window.location= 'new_act.php?sx=$UID'
    </script>";
     }
    else
    {
        echo "<script>
                alert('Favor de revisar la fecha ingresada.');
                window.location= 'act_rep.php?sx=$UID'
    </script>";
    }

}
?>