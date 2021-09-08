
<?php
require_once('Conexion.php');
$conn=new Conexion();
$conection = $conn->conectarse();
include "mcript.php";




$user = $_POST['username'];
$pass = $_POST['pass'];



$request = "SELECT * FROM registry WHERE Username='$user' and Password='$pass'";
$result = mysqli_query($conection,$request);

$check = mysqli_num_rows($result);

if ($check>0){
	
	$resu = mysqli_query($conection,"SELECT `UID` FROM `registry` WHERE Username = '$user'");
	$row = mysqli_fetch_array($resu);
	$UID = $row['UID'];
	//$dato_encriptado = $encriptar($UID);
	if($user == "Master")
		{mysqli_free_result($result);
		mysqli_close($conection);
		header("location:home_master.php?sx=".urlencode($UID)) ;
		}
	else
	{
	mysqli_free_result($result);
	mysqli_close($conection);	
	header("location:home_users.php?sx=".urlencode($UID)) ;
		}
}
else {	
	mysqli_free_result($result);
	mysqli_close($conection);
echo "<script>
                alert('Datos incorrectos, favor de verificar.');
                window.location= '../../index.php';
    </script>";}




?>
