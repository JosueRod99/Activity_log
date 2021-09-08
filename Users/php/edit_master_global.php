<?php 
	$UID = $_GET['sx'];
	$user = $_POST['UID'];
	$name = $_POST['name'];
	$TID = $_POST['tid'];

	require_once('Conexion.php');
	$conn=new Conexion();
	$conection = $conn->conectarse();

	if($user == "ADD")
	{	if($name != "" && $TID != "")
		{
			$flag = False;
			$sql = "SELECT * FROM `type_act`";
	  		$result = mysqli_query($conection,$sql);
									while($row=mysqli_fetch_assoc($result))
									{
										if($row['TID'] == $TID)
										{
											$flag = True;
										}
									}
			if($flag)
			{
				$sql = "INSERT into global_act (NAME, TID) VALUES ('$name',$TID)";
			$result = mysqli_query($conection,$sql);
			echo "<script>
		                        alert('Registro agregado correctamente.');
		                        window.location= 'edit_add_global.php?sx=$UID'
		            </script>";
			}
			else
			{
				echo "<script>
		                        alert('Ha ocurrido un error, verifique los datos e intente nuevamente.');
		                        window.location= 'edit_add_global.php?sx=$UID'
		            </script>";
			}
		}
     	else
			{
				echo "<script>
		                         alert('Ha ocurrido un error, verifique los datos e intente nuevamente.');
		                        window.location= 'edit_add_global.php?sx=$UID'
		            </script>";
			}
     	
	}
	else{
		$sql = "SELECT * from global_act where GID = $user";
		
		$result = mysqli_query($conection,$sql);
		$check = mysqli_num_rows($result); 
		mysqli_free_result($result);
     	if($check>0)
     	{	
			$sql = "UPDATE `global_act` SET `NAME`='$name', TID = $TID WHERE GID=$user";
			$result = mysqli_query($conection,$sql);
			echo "<script>
	                        alert('Registro editado correctamente.');
	                        window.location= 'edit_add_global.php?sx=$UID'
	            </script>";
	        }
     	
     	else
		{
			echo "<script>
                        alert('No existe el registro indicado.');
                        window.location= 'edit_add_global.php?sx=$UID'
            </script>";		
        }
	}

?>