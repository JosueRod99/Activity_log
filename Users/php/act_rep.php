
					
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
		/* HIDE RADIO */
				[type=radio] { 
				  position: absolute;
				  opacity: 0;
				  width: 0;
				  height: 0;
				}

				/* IMAGE STYLES */
				[type=radio] + img {
				  cursor: pointer;
				}

				/* CHECKED STYLES */
				[type=radio]:checked + img {
				  outline: 2px solid #f00;
				}

            table {
                border: none;
                width: 100%;
                border-collapse: collapse;
                margin:0 auto;  
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

			.tg-celdas{	text-align: left;
						background: white;
						padding-left: 25px;
						}
			.tg-celdas4{	text-align: center;
						background: white;
						padding-left: 1px;
						}
				.tg-celdas2{	text-align: left;
						background: white;
						padding-left: 10px;
						}	
						.tg-celdas3{	text-align: center;
						background: white;
						padding-left: 5px;
						border:none;

						}		
			.div-container
			{
				position:relative;
			    bottom:1px;
			    left:1000px;
			    right:0px;
			}
		

    </style>

  	




   <title>Activity Log</title>
</head>

<body>
	
	<div id='cssmenu'>
	<ul>
		<li style="float:right;"><a href='logout.php'>Log out</a></li>
		<li style="float:right;"><a href='#'> |</a></li>
		<li style="float:right;"><a href='#'> Varroc Lighting Systems</a></li>
		
	    <li style="float:left;"><a href='#'>
			<?php
					
					/*include "mcript.php";
					$u = $_GET['sx']; 
					$user = $desencriptar($u);*/
					
					$user = $_GET['sx']; 
					require_once('Conexion.php');
					$conn=new Conexion();
					$conection = $conn->conectarse();
					$result = mysqli_query($conection,"SELECT * FROM `winfo` WHERE UID = '$user'");
					$row = mysqli_fetch_array($result);
					
					echo $row['NAME']," ",$row['SURNAME'];
					$name = $row['NAME'];
					$lastname = $row['SURNAME'];
					mysqli_free_result($result);
					//mysqli_close($conection);
				?>
	   		</a></li>
	   	<li style="float: left;"><a href="home_users.php?sx=<?php echo $user;?>">Home</a></li>	
	   	<li class="activate" style="float:left;">
	   		<a href='#'>Activity</a>
	   		<ul>
	   			<li><a href="new_act.php?sx=<?php echo $user;?>">New Activity</a>
	   			<li><a href="act_rep.php?sx=<?php echo $user;?>">Activity Report</a>
	   			<li><a href="edit_act.php?sx=<?php echo $user;?>">Edit an Activity</a>
	   		</ul>
	   	</li>
	   
	</ul>

	</div>
	
	<?php 
	
	
	$sql = "SELECT activity_log.AID,(WEEK(DATE)+1) AS WEEK, DATE_FORMAT(DATE(activity_log.DATE),'%Y-%m-%d') as FECHA, TIME_FORMAT(TIME(activity_log.DATE),'%H:%i') as HORAINI, TIME_FORMAT(TIME(activity_log.DATE_FINAL),'%H:%i') as HORAFIN, global_act.NAME as GNAME, activity_log.ACTIVITY,type_act.NAME AS TNAME, benefit.NAME AS BNAME, activity_log.A_DONE, winfo.NAME, winfo.SURNAME, TIME_FORMAT(TIMEDIFF(activity_log.DATE_FINAL,activity_log.DATE),'%H:%i') AS TIMEP from activity_log, global_act, type_act, benefit, winfo WHERE activity_log.UID = winfo.UID && activity_log.BENEFIT = benefit.BID && activity_log.GID = global_act.GID && activity_log.TID = type_act.TID && activity_log.UID = '$user' ORDER BY `activity_log`.DATE desc";

	$result=mysqli_query($conection, $sql);
	?>

<table >
	<tr style="height: 30px;background-color:#5A82A2;color:white;">
		<th colspan="14"><b>Activity log from <?php echo $name," ",$lastname;?></b></th>
	</tr>
		<tr style="height: 30px;background-color:#83B6DF;color:white;">
			<th class="top" width="6%"></th>
			<th class="top" width="3%">Act</th>
			<th class="top">Week</th>
			<th class="top" width="9%">Date</th>
			<th class="top">From<p></th>
			<th class="top">To</th>
			<th class="top">Global Act</th>
			<th class="top">Coments</th>
			<th class="top">Type</th>
			<th class="top">Customer&nbsp</th>
			<th class="top">Done?</th>
			<th class="top">User Name</th>
			<th class="top">Time</th>
			<th class="top"></th>
		</tr>
	</tr>
	<?php
		$i = 1;
		while ($row=mysqli_fetch_assoc($result)) {
			?>
			<form action="edit_one_act.php" method="post">
				<tr style="height: 32.12px;">
					<td class="tg-celdas4">
						<label>
							<input type="radio" id="edit_<?php echo $i;?>" name="edit" value="1">
							<img src="../images/edit.jpg" width="20px" height="20px">
						</label>
						&nbsp
						<label>
							<input type="radio" id="delete_<?php echo $i;?>" name="edit" value="2">
							<img src="../images/delete.jpg" width="20px" height="20px">
						</label>
						
					</td>
					<td><input type="text" readonly="readonly" style="width: 155%; color:red;" name="act" value="<?php echo $row['AID'];?>"></td>
					<td ><?php echo $row['WEEK'];?></td>
					<td ><?php echo $row['FECHA']; ?></td>
					<td ><?php echo $row['HORAINI']; ?></td>
					<td ><?php echo $row['HORAFIN']; ?></td>
					<td class="tg-celdas" ><?php echo $row['GNAME']; ?></td>
					<td class="tg-celdas" ><?php echo $row['ACTIVITY']; ?></td>
					<td class="tg-celdas"><?php echo $row['TNAME']; ?></td>
					<td class="tg-celdas"><?php echo $row['BNAME']; ?></td>
					<td ><?php echo $row['A_DONE']; ?></td>
					<td class="tg-celdas"><?php echo $row['NAME']," ", $row['SURNAME'];?></td>
					<td ><?php echo $row['TIMEP']; ?></td>
					<td ><button><img src="../images/sumbit.jpg" width="20px" height="20px"></button></td>
				</tr>	
			</form>
			<?php $i++;
		}
		mysqli_free_result($result);
		mysqli_close($conection);

	?>
</table>


	<div class="div-container">Developed by Josué Rodríguez.</div>

</body>
<html>

