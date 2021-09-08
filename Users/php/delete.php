
<?php
include "mcript.php";
$UID = $_POST['UID'];         
$AID = $_POST['AID'];
$AID_2 = $_POST['AID_2'];


if($AID==$AID_2){
require_once('Conexion.php');
$conn=new Conexion();
$conection = $conn->conectarse();

     $res = "SELECT * from activity_log WHERE AID = $AID and UID = $UID";
     $ress = mysqli_query($conection,$res);  
     $check = mysqli_num_rows($ress); 
     if($check>0){     
              $request = "DELETE from `activity_log` WHERE AID = $AID and UID = $UID";

    $result = mysqli_query($conection,$request);
    mysqli_close($conection);
    $dato_encriptado = $encriptar($UID);
        if($result != NULL)
        {	
        	
        	echo "<script>
                        alert('El registro se eliminó correctamente');
                        window.location= 'edit_act.php?sx=$UID'
            </script>";
        }
        else 
        {
        	
        	echo "<script>
                        alert('Se ha producido un error, intente nuevamente.');
                         window.location= 'edit_act.php?sx=$UID'
            </script>";
        }

        }
    else
    {
        echo "<script>
                    alert('No existe el registro con ese numero de actividad.');
                 window.location= 'edit_act.php?sx=$UID'
    </script>";
}
}
else
{
     echo "<script>
                alert('Los numeros de referencia no coinciden.');
                 window.location= 'edit_act.php?sx=$UID'
    </script>";   
}
?>