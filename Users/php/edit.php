
<?php
include "mcript.php";
                  
$AID = $_POST['AID'];
$UID = $_POST['UID'];
//$benefit = $_POST['benefit'];
$act = $_POST['ACTIVITY'];
//$a_global = $_POST['global'];
//$a_done = $_POST['A_DONE'];
//$TID = $_POST['type'];

$date_o = $_POST['date_o'] ;
$date_o_day = $_POST['date_o_day'];
$date_o = "$date_o_day $date_o";
$date_f = $_POST['date_f'];
$date_f_day = $_POST['date_o_day'];
$date_f = "$date_f_day $date_f";

$datemenor = strtotime($date_o);
$datemayor = strtotime($date_f);

if($datemenor>"0000-00-00 00:00:00" && $datemayor>"0000-00-00 00:00:00")
if($datemenor<$datemayor){
require_once('Conexion.php');
$conn=new Conexion();
$conection = $conn->conectarse();

 $res = "SELECT * from activity_log WHERE AID = $AID and UID = $UID";
     $ress = mysqli_query($conection,$res);  
     $check = mysqli_num_rows($ress); 
     if($check>0){     

          $request = "UPDATE `activity_log` SET `DATE`='$date_o',`DATE_FINAL`='$date_f',`ACTIVITY`='$act' WHERE AID = $AID";

$result = mysqli_query($conection,$request);
$res = mysqli_query($conection,"SELECT * FROM `activity_log` WHERE AID = $AID");
        $row = mysqli_fetch_array($res);
            $UID =  $row['UID'];
mysqli_free_result($res);
//mysqli_free_result($result);
mysqli_close($conection);
$dato_encriptado = $encriptar($UID);
if($result != NULL)
{	
	   //todo en orden
	echo "<script>
                alert('Los datos se ingresaron correctamente');
                window.location= 'edit_act.php?sx=$UID'
    </script>";
}
else 
{   
	   //algo fallo con los datos
	echo "<script>
                alert('Se ha producido un error, intente nuevamente.');
                 window.location= 'edit_act.php?sx=$UID'
    </script>";
}

}
else 
{
    //no existe el registro o no tiene permiso
    echo "<script>
                alert('Se ha producido un error, intente nuevamente.');
                 window.location= 'edit_act.php?sx=$UID'
    </script>";
}
}
else
{   
    echo "<script>
                alert('La hora final debe ser mayor que la hora inicial.');
                 window.location= 'edit_act.php?sx=$UID'
    </script>";
}
else
{
     echo "<script>
                alert('Favor de revisar la nueva fecha ingresada.');
                 window.location= 'edit_act.php?sx=$UID'
    </script>";
}
?>