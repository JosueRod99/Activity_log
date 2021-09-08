<?php 
	$UID = $_GET['sx'];
	$user = $_POST['UID'];
	$name = $_POST['name'];
	$lastname = $_POST['surname'];

	require_once('Conexion.php');
	$conn=new Conexion();
	$conection = $conn->conectarse();

		$sql = "SELECT * from winfo where UID = $user";
		
		$result = mysqli_query($conection,$sql);
		$check = mysqli_num_rows($result); 
		mysqli_free_result($result);
     	if($check>0)
     	{	
     		
			$sql = "UPDATE `registry` SET `Username`='$name' WHERE UID=$user";
			$result = mysqli_query($conection,$sql);
			$sql = "UPDATE `winfo` SET `NAME`='$name', SURNAME='$lastname'  WHERE UID=$user";
			$result = mysqli_query($conection,$sql);
			echo "<script>
	                        alert('Registro editado correctamente.');
	                        window.location= 'edit_add_worker.php?sx=$UID'
	            </script>";
	        }
     	
     	else
		{
			echo "<script>
                        alert('No existe el registro indicado.');
                        window.location= 'edit_add_worker.php?sx=$UID'
            </script>";		
        }
	

?>