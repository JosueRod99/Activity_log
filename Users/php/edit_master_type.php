<?php 
	$UID = $_GET['sx'];
	$user = $_POST['UID'];
	$name = $_POST['name'];

	require_once('Conexion.php');
	$conn=new Conexion();
	$conection = $conn->conectarse();

	if($user == "ADD")
	{	
		if($name != "" )
		{$sql = "INSERT into type_act (NAME) VALUES ('$name')";
		$result = mysqli_query($conection,$sql);
		echo "<script>
	                        alert('Registro agregado correctamente.');
	                        window.location= 'edit_add_type.php?sx=$UID'
	            </script>";
	    }
		else 
		{
			echo "<script>
	                        alert('Registro en blanco.');
	                        window.location= 'edit_add_type.php?sx=$UID'
	            </script>";
		}
	}
	else{
		$sql = "SELECT * from type_act where TID = $user";
		
		$result = mysqli_query($conection,$sql);
		$check = mysqli_num_rows($result); 
		mysqli_free_result($result);
     	if($check>0)
     	{	
			$sql = "UPDATE `type_act` SET `NAME`='$name' WHERE TID=$user";
			$result = mysqli_query($conection,$sql);
			echo "<script>
	                        alert('Registro editado correctamente.');
	                        window.location= 'edit_add_type.php?sx=$UID'
	            </script>";
	        }
     	
     	else
		{
			echo "<script>
                        alert('No existe el registro indicado.');
                        window.location= 'edit_add_type.php?sx=$UID'
            </script>";		
        }
	}

?>