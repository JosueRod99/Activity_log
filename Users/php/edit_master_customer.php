<?php 
	$UID = $_GET['sx'];
	$user = $_POST['UID'];
	$name = $_POST['name'];

	require_once('Conexion.php');
	$conn=new Conexion();
	$conection = $conn->conectarse();

		$sql = "SELECT * from benefit where BID = $user";
		
		$result = mysqli_query($conection,$sql);
		$check = mysqli_num_rows($result); 
		mysqli_free_result($result);
     	if($check>0)
     	{
			$sql = "UPDATE `benefit` SET `NAME`='$name'  WHERE BID=$user";
			$result = mysqli_query($conection,$sql);
			echo "<script>
	                        alert('Registro editado correctamente.');
	                        window.location= 'edit_add_customer.php?sx=$UID'
	            </script>";
	        }
     	
     	else
		{
			echo "<script>
                        alert('No existe el registro indicado.');
                        window.location= 'edit_add_customer.php?sx=$UID'
            </script>";		
        }
	

?>