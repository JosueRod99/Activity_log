<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
            table {
                border: none;
                width: auto;
                border-collapse: collapse;
                margin:0 auto;  
            }

            th {
            	text-align: center;
            }
            td { 
                padding: 5px 10px;
                text-align: center;
                

            }


			.tg-celdas{	text-align: left;
						background: white;
						
						}
			.tg-reporte{	text-align: right;
						background: white;
						font-size: 28;
						
						}
			.tg-fantasma
			{
				background: white;
			}		
			.div-container
			{
				position:absolute;
			    bottom:5px;
			    right:30px;
			}

			
			
			.top { 
      vertical-align: top;
      }
    </style>
</head>
<body>
<?php
	
	if($_POST['date_o'] ==$_POST['date_f'])
			$fname =  "Actividades_del_".$_POST['date_o'].".xls"; 
			else 
			$fname =  "Actividades_del_". $_POST['date_o']."_al_".$_POST['date_f'].".xls";

	header('Content-type:application/xls');
	header("Content-Disposition: attachment; filename=$fname");

	require_once('Conexion.php');
	$conn=new Conexion();
	$link = $conn->conectarse();

	$uid = $_POST['user'];
	$bid = $_POST['benefit'];
	$date_o = $_POST['date_o'] ;
	$date_o = "$date_o 00:00:00";
	$date_f = $_POST['date_f'];
	$date_f = "$date_f 23:59:59";
	$gui = $_POST['global'];
	$tid = $_POST['type'];


	if($uid=="ALL")
	{
		if($uid=="ALL" && $bid=="ALL")
		{
			if($uid=="ALL" && $bid=="ALL" && $gui=="ALL")
			{
				if($uid=="ALL" && $bid=="ALL" && $gui=="ALL" && $tid == "ALL" )
				{
					$sql = "SELECT (WEEK(DATE)+1) AS WEEK, DATE_FORMAT(DATE(activity_log.DATE),'%m/%d') as FECHA, TIME_FORMAT(TIME(activity_log.DATE),'%H:%i') as HORAINI, TIME_FORMAT(TIME(activity_log.DATE_FINAL),'%H:%i') as HORAFIN, global_act.NAME as GNAME, activity_log.ACTIVITY,type_act.NAME AS TNAME, benefit.NAME AS BNAME, activity_log.A_DONE, winfo.NAME, winfo.SURNAME, TIME_FORMAT(TIMEDIFF(activity_log.DATE_FINAL,activity_log.DATE),'%H:%i') AS TIMEP from activity_log, global_act, type_act, benefit, winfo WHERE activity_log.UID = winfo.UID && activity_log.BENEFIT = benefit.BID && activity_log.GID = global_act.GID && activity_log.TID = type_act.TID && activity_log.DATE > '$date_o' and activity_log.Date < '$date_f' ORDER BY `activity_log`.DATE ASC";
				}
				else
				{
					$sql = "SELECT (WEEK(DATE)+1) AS WEEK, DATE_FORMAT(DATE(activity_log.DATE),'%d-%m') as FECHA, TIME_FORMAT(TIME(activity_log.DATE),'%H:%i') as HORAINI, TIME_FORMAT(TIME(activity_log.DATE_FINAL),'%H:%i') as HORAFIN, global_act.NAME as GNAME, activity_log.ACTIVITY,type_act.NAME AS TNAME, benefit.NAME AS BNAME, activity_log.A_DONE, winfo.NAME, winfo.SURNAME, TIME_FORMAT(TIMEDIFF(activity_log.DATE_FINAL,activity_log.DATE),'%H:%i') AS TIMEP from activity_log, global_act, type_act, benefit, winfo WHERE activity_log.UID = winfo.UID && activity_log.BENEFIT = benefit.BID && activity_log.GID = global_act.GID && activity_log.TID = type_act.TID && activity_log.TID = '$tid' && activity_log.DATE > '$date_o' and activity_log.Date < '$date_f' ORDER BY `activity_log`.DATE ASC";
				}
			}
			else
			{
				if($uid=="ALL" && $bid=="ALL" && $tid == "ALL" )
				{

					$sql = "SELECT (WEEK(DATE)+1) AS WEEK, DATE_FORMAT(DATE(activity_log.DATE),'%d-%m') as FECHA, TIME_FORMAT(TIME(activity_log.DATE),'%H:%i') as HORAINI, TIME_FORMAT(TIME(activity_log.DATE_FINAL),'%H:%i') as HORAFIN, global_act.NAME as GNAME, activity_log.ACTIVITY,type_act.NAME AS TNAME, benefit.NAME AS BNAME, activity_log.A_DONE, winfo.NAME, winfo.SURNAME, TIME_FORMAT(TIMEDIFF(activity_log.DATE_FINAL,activity_log.DATE),'%H:%i') AS TIMEP from activity_log, global_act, type_act, benefit, winfo WHERE activity_log.UID = winfo.UID && activity_log.BENEFIT = benefit.BID && activity_log.GID = global_act.GID && activity_log.TID = type_act.TID && activity_log.GID = '$gui' && activity_log.DATE > '$date_o' and activity_log.Date < '$date_f' ORDER BY `activity_log`.DATE ASC";
				}
				else
				{
					$sql = "SELECT (WEEK(DATE)+1) AS WEEK, DATE_FORMAT(DATE(activity_log.DATE),'%d-%m') as FECHA, TIME_FORMAT(TIME(activity_log.DATE),'%H:%i') as HORAINI, TIME_FORMAT(TIME(activity_log.DATE_FINAL),'%H:%i') as HORAFIN, global_act.NAME as GNAME, activity_log.ACTIVITY,type_act.NAME AS TNAME, benefit.NAME AS BNAME, activity_log.A_DONE, winfo.NAME, winfo.SURNAME, TIME_FORMAT(TIMEDIFF(activity_log.DATE_FINAL,activity_log.DATE),'%H:%i') AS TIMEP from activity_log, global_act, type_act, benefit, winfo WHERE activity_log.UID = winfo.UID && activity_log.BENEFIT = benefit.BID && activity_log.GID = global_act.GID && activity_log.TID = type_act.TID && activity_log.GID = '$gui' && activity_log.TID = '$tid'  && activity_log.DATE > '$date_o' and activity_log.Date < '$date_f' ORDER BY `activity_log`.DATE ASC";
				}
			}

		}
		else
		{	
			if($gui=="ALL")
			{
				if($gui=="ALL" && $tid == "ALL" )
				{
					$sql = "SELECT (WEEK(DATE)+1) AS WEEK, DATE_FORMAT(DATE(activity_log.DATE),'%d-%m') as FECHA, TIME_FORMAT(TIME(activity_log.DATE),'%H:%i') as HORAINI, TIME_FORMAT(TIME(activity_log.DATE_FINAL),'%H:%i') as HORAFIN, global_act.NAME as GNAME, activity_log.ACTIVITY,type_act.NAME AS TNAME, benefit.NAME AS BNAME, activity_log.A_DONE, winfo.NAME, winfo.SURNAME, TIME_FORMAT(TIMEDIFF(activity_log.DATE_FINAL,activity_log.DATE),'%H:%i') AS TIMEP from activity_log, global_act, type_act, benefit, winfo WHERE activity_log.UID = winfo.UID && activity_log.BENEFIT = benefit.BID && activity_log.GID = global_act.GID && activity_log.TID = type_act.TID  && activity_log.BENEFIT = '$bid' && activity_log.DATE > '$date_o' and activity_log.Date < '$date_f' ORDER BY `activity_log`.DATE ASC";
				}
				else
				{
					$sql = "SELECT (WEEK(DATE)+1) AS WEEK, DATE_FORMAT(DATE(activity_log.DATE),'%d-%m') as FECHA, TIME_FORMAT(TIME(activity_log.DATE),'%H:%i') as HORAINI, TIME_FORMAT(TIME(activity_log.DATE_FINAL),'%H:%i') as HORAFIN, global_act.NAME as GNAME, activity_log.ACTIVITY,type_act.NAME AS TNAME, benefit.NAME AS BNAME, activity_log.A_DONE, winfo.NAME, winfo.SURNAME, TIME_FORMAT(TIMEDIFF(activity_log.DATE_FINAL,activity_log.DATE),'%H:%i') AS TIMEP from activity_log, global_act, type_act, benefit, winfo WHERE activity_log.UID = winfo.UID && activity_log.BENEFIT = benefit.BID && activity_log.GID = global_act.GID && activity_log.TID = type_act.TID  && activity_log.BENEFIT = '$bid' && activity_log.TID = '$tid' && activity_log.DATE > '$date_o' and activity_log.Date < '$date_f' ORDER BY `activity_log`.DATE ASC";
				}
			}
			else
			{
				if( $tid == "ALL" )
				{
					$sql = "SELECT (WEEK(DATE)+1) AS WEEK, DATE_FORMAT(DATE(activity_log.DATE),'%d-%m') as FECHA, TIME_FORMAT(TIME(activity_log.DATE),'%H:%i') as HORAINI, TIME_FORMAT(TIME(activity_log.DATE_FINAL),'%H:%i') as HORAFIN, global_act.NAME as GNAME, activity_log.ACTIVITY,type_act.NAME AS TNAME, benefit.NAME AS BNAME, activity_log.A_DONE, winfo.NAME, winfo.SURNAME, TIME_FORMAT(TIMEDIFF(activity_log.DATE_FINAL,activity_log.DATE),'%H:%i') AS TIMEP from activity_log, global_act, type_act, benefit, winfo WHERE activity_log.UID = winfo.UID && activity_log.BENEFIT = benefit.BID && activity_log.GID = global_act.GID && activity_log.TID = type_act.TID  && activity_log.BENEFIT = '$bid' && activity_log.GID = '$gui' && activity_log.DATE > '$date_o' and activity_log.Date < '$date_f' ORDER BY `activity_log`.DATE ASC";
				}
				else 
				{
					$sql = "SELECT (WEEK(DATE)+1) AS WEEK, DATE_FORMAT(DATE(activity_log.DATE),'%d-%m') as FECHA, TIME_FORMAT(TIME(activity_log.DATE),'%H:%i') as HORAINI, TIME_FORMAT(TIME(activity_log.DATE_FINAL),'%H:%i') as HORAFIN, global_act.NAME as GNAME, activity_log.ACTIVITY,type_act.NAME AS TNAME, benefit.NAME AS BNAME, activity_log.A_DONE, winfo.NAME, winfo.SURNAME, TIME_FORMAT(TIMEDIFF(activity_log.DATE_FINAL,activity_log.DATE),'%H:%i') AS TIMEP from activity_log, global_act, type_act, benefit, winfo WHERE activity_log.UID = winfo.UID && activity_log.BENEFIT = benefit.BID && activity_log.GID = global_act.GID && activity_log.TID = type_act.TID  && activity_log.BENEFIT = '$bid' && activity_log.GID = '$gui' && activity_log.TID = '$tid' && activity_log.DATE > '$date_o' and activity_log.Date < '$date_f' ORDER BY `activity_log`.DATE ASC";
				}
			}
			
		}	
		
	}
	else
	{
		if($bid=="ALL")
		{
			if($bid=="ALL" && $gui=="ALL")
			{
				if($bid=="ALL" && $gui=="ALL" && $tid == "ALL" )
				{
					$sql = "SELECT (WEEK(DATE)+1) AS WEEK, DATE_FORMAT(DATE(activity_log.DATE),'%d-%m') as FECHA, TIME_FORMAT(TIME(activity_log.DATE),'%H:%i') as HORAINI, TIME_FORMAT(TIME(activity_log.DATE_FINAL),'%H:%i') as HORAFIN, global_act.NAME as GNAME, activity_log.ACTIVITY,type_act.NAME AS TNAME, benefit.NAME AS BNAME, activity_log.A_DONE, winfo.NAME, winfo.SURNAME, TIME_FORMAT(TIMEDIFF(activity_log.DATE_FINAL,activity_log.DATE),'%H:%i') AS TIMEP from activity_log, global_act, type_act, benefit, winfo WHERE activity_log.UID = winfo.UID && activity_log.BENEFIT = benefit.BID && activity_log.GID = global_act.GID && activity_log.TID = type_act.TID && activity_log.UID = '$uid' && activity_log.DATE > '$date_o' and activity_log.Date < '$date_f' ORDER BY `activity_log`.DATE ASC";
				}
				else 
				{
					$sql = "SELECT (WEEK(DATE)+1) AS WEEK, DATE_FORMAT(DATE(activity_log.DATE),'%d-%m') as FECHA, TIME_FORMAT(TIME(activity_log.DATE),'%H:%i') as HORAINI, TIME_FORMAT(TIME(activity_log.DATE_FINAL),'%H:%i') as HORAFIN, global_act.NAME as GNAME, activity_log.ACTIVITY,type_act.NAME AS TNAME, benefit.NAME AS BNAME, activity_log.A_DONE, winfo.NAME, winfo.SURNAME, TIME_FORMAT(TIMEDIFF(activity_log.DATE_FINAL,activity_log.DATE),'%H:%i') AS TIMEP from activity_log, global_act, type_act, benefit, winfo WHERE activity_log.UID = winfo.UID && activity_log.BENEFIT = benefit.BID && activity_log.GID = global_act.GID && activity_log.TID = type_act.TID && activity_log.UID = '$uid' && activity_log.TID = '$tid' && activity_log.DATE > '$date_o' and activity_log.Date < '$date_f' ORDER BY `activity_log`.DATE ASC";
				}
			}
			else
			{
				if($tid == "ALL")
				{
					$sql = "SELECT (WEEK(DATE)+1) AS WEEK, DATE_FORMAT(DATE(activity_log.DATE),'%d-%m') as FECHA, TIME_FORMAT(TIME(activity_log.DATE),'%H:%i') as HORAINI, TIME_FORMAT(TIME(activity_log.DATE_FINAL),'%H:%i') as HORAFIN, global_act.NAME as GNAME, activity_log.ACTIVITY,type_act.NAME AS TNAME, benefit.NAME AS BNAME, activity_log.A_DONE, winfo.NAME, winfo.SURNAME, TIME_FORMAT(TIMEDIFF(activity_log.DATE_FINAL,activity_log.DATE),'%H:%i') AS TIMEP from activity_log, global_act, type_act, benefit, winfo WHERE activity_log.UID = winfo.UID && activity_log.BENEFIT = benefit.BID && activity_log.GID = global_act.GID && activity_log.TID = type_act.TID && activity_log.UID = '$uid' && activity_log.GID = '$gui' && activity_log.DATE > '$date_o' and activity_log.Date < '$date_f' ORDER BY `activity_log`.DATE ASC";
				}
				else
				{
					$sql = "SELECT (WEEK(DATE)+1) AS WEEK, DATE_FORMAT(DATE(activity_log.DATE),'%d-%m') as FECHA, TIME_FORMAT(TIME(activity_log.DATE),'%H:%i') as HORAINI, TIME_FORMAT(TIME(activity_log.DATE_FINAL),'%H:%i') as HORAFIN, global_act.NAME as GNAME, activity_log.ACTIVITY,type_act.NAME AS TNAME, benefit.NAME AS BNAME, activity_log.A_DONE, winfo.NAME, winfo.SURNAME, TIME_FORMAT(TIMEDIFF(activity_log.DATE_FINAL,activity_log.DATE),'%H:%i') AS TIMEP from activity_log, global_act, type_act, benefit, winfo WHERE activity_log.UID = winfo.UID && activity_log.BENEFIT = benefit.BID && activity_log.GID = global_act.GID && activity_log.TID = type_act.TID && activity_log.UID = '$uid' && activity_log.GID = '$gui' && activity_log.TID = '$tid' && activity_log.DATE > '$date_o' and activity_log.Date < '$date_f' ORDER BY `activity_log`.DATE ASC";
				}
			}
		}
		else
		{	
			if($gui=="ALL")
			{
				if($gui=="ALL" && $tid == "ALL" )
				{
					$sql = "SELECT (WEEK(DATE)+1) AS WEEK, DATE_FORMAT(DATE(activity_log.DATE),'%d-%m') as FECHA, TIME_FORMAT(TIME(activity_log.DATE),'%H:%i') as HORAINI, TIME_FORMAT(TIME(activity_log.DATE_FINAL),'%H:%i') as HORAFIN, global_act.NAME as GNAME, activity_log.ACTIVITY,type_act.NAME AS TNAME, benefit.NAME AS BNAME, activity_log.A_DONE, winfo.NAME, winfo.SURNAME, TIME_FORMAT(TIMEDIFF(activity_log.DATE_FINAL,activity_log.DATE),'%H:%i') AS TIMEP from activity_log, global_act, type_act, benefit, winfo WHERE activity_log.UID = winfo.UID && activity_log.BENEFIT = benefit.BID && activity_log.GID = global_act.GID && activity_log.TID = type_act.TID && activity_log.UID = '$uid' && activity_log.BENEFIT = '$bid' && activity_log.DATE > '$date_o' and activity_log.Date < '$date_f' ORDER BY `activity_log`.DATE ASC";
				}
				else
				{
					$sql = "SELECT (WEEK(DATE)+1) AS WEEK, DATE_FORMAT(DATE(activity_log.DATE),'%d-%m') as FECHA, TIME_FORMAT(TIME(activity_log.DATE),'%H:%i') as HORAINI, TIME_FORMAT(TIME(activity_log.DATE_FINAL),'%H:%i') as HORAFIN, global_act.NAME as GNAME, activity_log.ACTIVITY,type_act.NAME AS TNAME, benefit.NAME AS BNAME, activity_log.A_DONE, winfo.NAME, winfo.SURNAME, TIME_FORMAT(TIMEDIFF(activity_log.DATE_FINAL,activity_log.DATE),'%H:%i') AS TIMEP from activity_log, global_act, type_act, benefit, winfo WHERE activity_log.UID = winfo.UID && activity_log.BENEFIT = benefit.BID && activity_log.GID = global_act.GID && activity_log.TID = type_act.TID && activity_log.UID = '$uid' && activity_log.BENEFIT = '$bid' && activity_log.TID = '$tid' && activity_log.DATE > '$date_o' and activity_log.Date < '$date_f' ORDER BY `activity_log`.DATE ASC";
				}
			}
			else
			{
				if( $tid == "ALL" )
				{
					$sql = "SELECT (WEEK(DATE)+1) AS WEEK, DATE_FORMAT(DATE(activity_log.DATE),'%d-%m') as FECHA, TIME_FORMAT(TIME(activity_log.DATE),'%H:%i') as HORAINI, TIME_FORMAT(TIME(activity_log.DATE_FINAL),'%H:%i') as HORAFIN, global_act.NAME as GNAME, activity_log.ACTIVITY,type_act.NAME AS TNAME, benefit.NAME AS BNAME, activity_log.A_DONE, winfo.NAME, winfo.SURNAME, TIME_FORMAT(TIMEDIFF(activity_log.DATE_FINAL,activity_log.DATE),'%H:%i') AS TIMEP from activity_log, global_act, type_act, benefit, winfo WHERE activity_log.UID = winfo.UID && activity_log.BENEFIT = benefit.BID && activity_log.GID = global_act.GID && activity_log.TID = type_act.TID && activity_log.UID = '$uid' && activity_log.BENEFIT = '$bid' && activity_log.GID = '$gui' && activity_log.DATE > '$date_o' and activity_log.Date < '$date_f' ORDER BY `activity_log`.DATE ASC";
				}
				else 
				{
					$sql = "SELECT (WEEK(DATE)+1) AS WEEK, DATE_FORMAT(DATE(activity_log.DATE),'%d-%m') as FECHA, TIME_FORMAT(TIME(activity_log.DATE),'%H:%i') as HORAINI, TIME_FORMAT(TIME(activity_log.DATE_FINAL),'%H:%i') as HORAFIN, global_act.NAME as GNAME, activity_log.ACTIVITY,type_act.NAME AS TNAME, benefit.NAME AS BNAME, activity_log.A_DONE, winfo.NAME, winfo.SURNAME, TIME_FORMAT(TIMEDIFF(activity_log.DATE_FINAL,activity_log.DATE),'%H:%i') AS TIMEP from activity_log, global_act, type_act, benefit, winfo WHERE activity_log.UID = winfo.UID && activity_log.BENEFIT = benefit.BID && activity_log.GID = global_act.GID && activity_log.TID = type_act.TID && activity_log.UID = '$uid' && activity_log.BENEFIT = '$bid' && activity_log.GID = '$gui' && activity_log.TID = '$tid' && activity_log.DATE > '$date_o' and activity_log.Date < '$date_f' ORDER BY `activity_log`.DATE ASC";
				}
			}
			
		}
	}

	$result=mysqli_query($link, $sql);
	
		

?>
<table>
	<tr></tr><tr></tr>
	<tr style="height: 40px;"></tr>
	<th  class="tg-fantasma"></th>
	<th colspan="2" class="tg-reporte">
			<td>Imagen.jpg</td>
	</th>
	<th colspan="19" class="tg-reporte">
			<b>Reporte de Actividades del <?php 
			if($_POST['date_o'] ==$_POST['date_f'])
				echo $_POST['date_o']; 
			else 
				echo $_POST['date_o']." al ".$_POST['date_f']; ?> <b>
	</th>
</table>
<table >
	<tr style="height: 54.54px;background-color:#4073c4;color:white;">
		<th class="tg-fantasma"></th>
		<th class="top">Num</th>
		<th class="top">Semana</th>
		<th class="top">Fecha</th>
		<th class="top">Hora inicial<p></th>
		<th class="top">Hora final</th>
		<th class="top" colspan="6">Actividad Global <br>(CATALOGO DE ACTIVIDADES GENERALES)</th>
		<th class="top" colspan="6">Actividad Especifica / Comentarios<br>(REFERENCIA ESPECIFICA)</th>
		<th class="top">Tipo de Actividad</th>
		<th class="top">Cliente</th>
		<th class="top">Actividad final concluida <br>SI/NO</th>
		<th class="top">Responsable</th>
		<th class="top">Tiempo promedio <br>invertido (hrs)</th>
	</tr>
	<?php
		$i = 1;
		while ($row=mysqli_fetch_assoc($result)) {
			?>
				<tr style="height: 32.12px;">
					<td class="tg-fantasma"></td>
					<td ><?php echo $i;$i++?></td>
					<td ><?php echo $row['WEEK'];?></td>
					<td ><?php echo $row['FECHA']; ?></td>
					<td ><?php echo $row['HORAINI']; ?></td>
					<td ><?php echo $row['HORAFIN']; ?></td>
					<td class="tg-celdas" colspan="6"><?php echo $row['GNAME']; ?></td>
					<td class="tg-celdas" colspan="6"><?php echo $row['ACTIVITY']; ?></td>
					<td class="tg-celdas"><?php echo $row['TNAME']; ?></td>
					<td class="tg-celdas"><?php echo $row['BNAME']; ?></td>
					<td ><?php echo $row['A_DONE']; ?></td>
					<td class="tg-celdas"><?php echo $row['NAME']," ", $row['SURNAME'];?></td>
					<td ><?php echo $row['TIMEP']; ?></td>
				</tr>	

			<?php
		}
		mysqli_free_result($result);
		mysqli_close($link);

	?>
</table>
</body>
</html>
