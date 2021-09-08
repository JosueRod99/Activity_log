<?php 	
	require_once('Conexion.php');
	$conn=new Conexion();
	$conection = $conn->conectarse();
?>

<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="../styles.css">
   <link rel="icon" type="image/png" href="../images/icons/faviconi.ico"/>
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="../script.js"></script>

   <!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/radiobuttons.css">
<!--===============================================================================================-->
	<style>
				/*[type=radio] { 
				  position: absolute;
				  opacity: 0;
				  width: 0;
				  height: 0;
				}

				/* IMAGE STYLES */
				/*[type=radio] + img {
				  cursor: pointer;
				}

				/* CHECKED STYLES */
				/*[type=radio]:checked + img {
				  outline: 2px solid #f00;
				}*/

            table {
                border: none;
                width: 30%;
                border-collapse: collapse;
                margin-left: auto;
                margin-right: auto;

            }

            th {
            	text-align: center;
            }
            td { 
                padding: 5px 10px;
                text-align: center;
                border: 1px solid #999;
            }

            tr:nth-child(1) {
                background: #dedede;
            }

            .my-custom-scrollbar {
				position: relative;
				height: 210px;
				overflow: auto;
								 }
			.table-wrapper-scroll-y 
			{
				display: block;
			}
			.tg-celdas{	text-align: left;
						background: white;
						padding-left: 10px;
						}
						.tg-celdas2{	text-align: left;
						background: white;
						padding-left: 50px;
						}
			.div-container
			{
				position:absolute;
			    bottom:5px;
			    right:30px;
			}
        </style>

<script>
	funciton Add()
	{	
		alert("otra vez");
		var checkbox = document.getElementById('add');
		if (checkbox.checked == true)
			{alert("otra vez");}
	}
	
	/*function Edit(k)
		{	alert("Editar");
			var edit = document.getElementById('edit_'+k);
			var name = document.getElementById('name_'+k);
			var lastname = document.getElementById('lastname_'+k);
			if(edit.checked)
			{
				name.disabled = false;
				lastname.disabled = false;
			}
			else
			{
				name.disabled = true;
				lastname.disabled = true;
			}
		}*/
</script>

   <title>Add/Edit</title>
</head>

<body>
	
	<div id='cssmenu'>
	<ul>
		<li style="float:right;"><a href='logout.php'>Log out</a></li>
		<li style="float:right;"><a href='#'> |</a></li>
		<li style="float:right;"><a href='#'> Varroc Lighting Systems</a></li>
		
	    <li style="float:left;"><a href='#'>
			<?php
					$user = $_GET['sx'];
					
					$result = mysqli_query($conection,"SELECT * FROM `winfo` WHERE UID = '$user'");
					$row = mysqli_fetch_array($result);
					
					echo $row['NAME']," ",$row['SURNAME'];
					mysqli_free_result($result);
					//mysqli_close($conection);
				?> - WebMaster
	   		</a></li>
	   	<li style="float: left;"><a href="home_master.php?sx=<?php echo $user;?>">Home</a></li>	
	   	<li class="activate" style="float:left;">
	   		<a href='#'>Activity</a>
	   		<ul>
	   			<li><a href="home_report.php?sx=<?php echo $user;?>">Generate Report</a></li>
	   				
	   			<li><a href="#">Update Information</a>
	   				<ul>
	   					<li><a href="edit_add_worker.php?sx=<?php echo $user;?>">Workers</a></li>
	   					<li><a href="edit_add_customer.php?sx=<?php echo $user;?>">Customers</a></li>
	   					<li><a href="edit_add_global.php?sx=<?php echo $user;?>">Global Activity</a></li>
	   					<li><a href="edit_add_type.php?sx=<?php echo $user;?>">Type of</a></li>
	   				</ul>
	   			</li>
	   		</ul>
	   	</li>
	   
	</ul>

	</div>

	<p><p><p>
		
			<table width="25%">
				<tr>
					<th colspan="4" >
						Workers
					</th>
				</tr>
				<tr style="background-color: #F1F1F1;">
					<th width="10%">
						ID
					</th>
					<th colspan="2" >
						Name
					</th>
					<th  >
						
					</th>
				</tr>

				<?php
  							$i=1;
  							$sql = "SELECT * FROM `winfo`";
  							$result = mysqli_query($conection,$sql);
								while($row=mysqli_fetch_assoc($result)){
									if ($row['UID'] == 168031 or $row['UID'] == 145591)
									{}
								else{
  						?>
  					<form action="edit_master_worker.php?sx=<?php echo $user;?>" method="post">
				<tr>
					<td> 
						<input type="text" name="UID" value="<?php echo $row['UID']; ?>" readonly="readonly"> 
					</td>
					<td class="tg-celdas">
  						<input type="text" name="name" value="<?php echo $row['NAME']; ?>" id="name_<?php echo $i;?>" > <p>
					</td>
					<td class="tg-celdas">
  						<input type="text" name="surname" value="<?php echo $row['SURNAME']; ?>" id="lastname_<?php echo $i;?>"> <p>
					</td>
					<td ><button><img src="../images/sumbit.jpg" width="20px" height="20px"></button></td>
				</tr>
			</form>
				<?php
  						$i++;
  								}
  				}?>
  			
  			
  			
			</table>
		
		&nbsp&nbsp&nbsp&nbsp




		<div class="div-container">Developed by Josué Rodriguez.</div>

		<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/daterangepicker/moment.min.js"></script>
	<script src="../vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="../js/main.js"></script>
	


</body>
<html>
