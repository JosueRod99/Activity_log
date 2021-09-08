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
            table {
                border: none;
                width: 100%;
                border-collapse: collapse;
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
			.div-container
			{
				position:absolute;
			    bottom:5px;
			    right:30px;
			}
        </style>

  <script>

  		function justToday()
  	{	var checkbox = document.getElementById('checkToday');
  		var date_o = document.getElementById('date_o'); 
  		var date_f = document.getElementById('date_f');
  		if (checkbox.checked == true){
  			
  			var today = new Date();
			var d = today.getDate();
			var m = today.getMonth()+1;
			var y = today.getFullYear();
			
			d = checkTime(d);
			m = checkTime(m);
  			
  			date_o.value = y+"-"+m+"-"+d; 
  			date_f.value = y+"-"+m+"-"+d;}

  		if (checkbox.checked == false){date_f.value = "";date_o.value = "";}
  	}
  	
  	function Today()
  	{	var checkbox = document.getElementById('checkTodayy');
  		var date_f = document.getElementById('date_f'); 
  		if (checkbox.checked == true){
  			
  			var today = new Date();
			var d = today.getDate();
			var m = today.getMonth() + 1;
			var y = today.getFullYear();
			
			d = checkTime(d);
			m = checkTime(m);
  			
  			
  			date_f.value = y+"-"+m+"-"+d;}
  		if (checkbox.checked == false){date_f.value = "";}
  		
  	}

  	function disableChecksw1(k)
	  	{	k = parseInt(k);
	  		var i;
	  		var w1 = document.getElementById("w"+k);
	  		if (w1.checked == true)	
				for (i = 1; i < 12; i++) 
					if(i!=k)
	  					document.getElementById("w"+i).disabled = true;

	  		if (w1.checked == false)
				for (i = 1; i < 12; i++)
						if(i!=k) 
	  				document.getElementById("w"+i).disabled = false;
	  	}

  	function disableChecksg1(c)
	  	{	var i;
	  		var split;
	  		
	  		for(i = 0; i < c.length; i++)
	  			if(c.substring(i,i+1) == "+" )
	  			{
	  				split = i;
	  			}
	  		var k = parseInt(c.substring(0,split));
	  		var o = parseInt(c.substring(split+1,c.length));
	  		var w1 = document.getElementById("g"+k);

	  		if (w1.checked == true)	
				for (i = 1; i < 101; i++) 
					if(i!=k)
	  					{
	  						w2 = document.getElementById("g"+i);
	  						if(w2)
	  							w2.disabled = true;
	  					}

	  		if (w1.checked == false)
				for (i = 1; i < 101; i++)
						if(i!=k)
						{
							w2 = document.getElementById("g"+i);
	  						if(w2)
	  							w2.disabled = false;
						} 
			if(k==100)
	  			o = 6;
			if( w1.checked == true) 
	  			{document.getElementById("t"+o).checked = true;
	  			document.getElementById("t"+o).disabled = false;}
				
			if(w1.checked == false) 
					{document.getElementById("t"+o).checked = false;
					 document.getElementById("t"+o).disabled = true;
					}
	  				
	  	}

	 function disableChecksb1(k)
	  	{	k = parseInt(k);
	  		var i;
	  		var w1 = document.getElementById("b"+k);
	  		if (w1.checked == true)	
				for (i = 1; i < 15; i++) 
					if(i!=k)
	  					document.getElementById("b"+i).disabled = true;

	  		if (w1.checked == false)
				for (i = 1; i < 15; i++)
						if(i!=k) 
	  				document.getElementById("b"+i).disabled = false;
	  	}
  
  	

	function Reset()
		{	var i;
			var w1 = document.getElementById('Reset');
 			
	  		if (w1.checked == true)	
				{	
					for(i = 1 ; i < 101 ; i ++)
						{	
							if(i < 15)
								{	document.getElementById("b"+i).checked = false;
										document.getElementById("b"+i).disabled = false;
									if(i < 10)
									{document.getElementById("w"+i).checked = false;
									document.getElementById("w"+i).disabled = false;
										
									}	
									if ( i < 7)
									{
										document.getElementById("t"+i).checked = false;
										document.getElementById("t"+i).disabled = true;
									}
									if(i < 2)
									{
										document.getElementById("date_o").value = "";
										document.getElementById("date_f").value = "";
										document.getElementById("checkTodayy").checked = false;
										document.getElementById("checkToday").checked = false;
									}
								}
							var g1 = document.getElementById("g"+i);
							if (g1)
							{
							g1.checked = false;
							g1.disabled = false;}
							

							
						}
				w1.checked = false;
				}

				
		}

	function startTime() 
		{
			var today = new Date();
			var h = today.getHours();
			var m = today.getMinutes();
			var s = today.getSeconds();
			m = checkTime(m);
			 
			/*document.getElementById('txt').innerHTML =
			h + ":" + m ;*/
			document.getElementById('txt').innerHTML =
			today;
			var t = setTimeout(startTime, 500);
		}

	function checkTime(i) 
		{
		  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
		  return i;
		}

	</script>

   <title>Generate Report</title>
</head>

<body onload="startTime()" >
	
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
	   			<li><a href="home_report.php?sx=<?php echo $user;?>">Generate Report</a>
	   				
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
	<form class="login100-form validate-form" action="Reporte2.php" method="post">

		<table>
		  <tr>
		    <th width="15%">
		    	Workers
		    </th>
		    <th width="9%">
		    	Customer
		    </th>
			<th width="23%">
		    	Act Global
		    </th>
		    <th width="15%">
		    	Type
		    </th>
		    <th colspan="2">
		    	Date <p> must be in *YYYY-MM-DD* format:
		    </th>
		  </tr>
		  <tr>
		    <td class="tg-celdas">
		    	<div class="table-wrapper-scroll-y my-custom-scrollbar">

  					<table class="table table-bordered table-striped mb-0">
  						<?php
  							$i=1;
  							$sql = "SELECT * FROM `winfo`";
  							$result = mysqli_query($conection,$sql);
								while($row=mysqli_fetch_assoc($result)){
									if ($row['UID'] == 168031 or $row['UID'] == 145591)
									{}
								else{
  						?>
  						<tr><input name=user type="checkbox" onclick="disableChecksw1(<?php echo $i;?>)" value ="<?php echo $row['UID'];?>" id="w<?php echo $i;?>"><?php echo $row['NAME']," ",$row['SURNAME']; ?> <p></tr>
  									<?php
  									$i++;
  									}
  								}
  						?>
  						<tr><input name=user type="checkbox" onclick="disableChecksw1(<?php echo $i;?>)" value ="ALL" id="w<?php echo $i;?>">ALL<p></tr>
					</table>
				</div>
			</td>
			<td class="tg-celdas">
		    	<div class="table-wrapper-scroll-y my-custom-scrollbar">

  					<table class="table table-bordered table-striped mb-0">
  						<?php
  							$i=1;
  							$sql = "SELECT * FROM `benefit`";
  							$result = mysqli_query($conection,$sql);
								while($row=mysqli_fetch_assoc($result))
									{

  						?>
  						<tr><input name=benefit type="checkbox" onclick="disableChecksb1(<?php echo $i;?>)" value ="<?php echo $row['BID'];?>" id="b<?php echo $i;?>"><?php echo $row['NAME']; ?> <p></tr>
  									<?php
  									$i++;
  									}
  								
  						?>
  						<tr><input name=benefit type="checkbox" onclick="disableChecksb1(<?php echo $i;?>)" value ="ALL" id="b<?php echo $i;?>">ALL<p></tr>

  						
					</table>
				</div>
			</td>
			<td class="tg-celdas">
		    	<div class="table-wrapper-scroll-y my-custom-scrollbar">

  					<table class="table table-bordered table-striped mb-0">  

  						<tr><input name=global type="checkbox" onclick="disableChecksg1(100+'+'+'0')" value ="ALL" id="g100"  >
									ALL <p></tr>

  						<?php
  							$i=1;
  							$sql = "SELECT * FROM `global_act` order by NAME asc";
  							$result = mysqli_query($conection,$sql);
								while($row=mysqli_fetch_assoc($result))
									{
									if ($row['GID'] == 39)
									{}
								else{

  						?>
  						<tr><input name=global type="checkbox" onclick="disableChecksg1('<?php echo $i;?>'+'+'+'<?php echo $row['TID'];?>')" value ="<?php echo $row['GID'];?>" id="g<?php echo $i;?>"><?php echo $row['NAME']; ?> <p></tr>
  									<?php
  									$i++;
  									}}
  								
  						?>

					</table>
				</div>
			</td>
			<td class="tg-celdas">
		    	<div>

  					<table class="table table-bordered table-striped mb-0">

  						<?php
  							$i=1;
  							$sql = "SELECT * FROM `type_act`";
  							$result = mysqli_query($conection,$sql);
								while($row=mysqli_fetch_assoc($result))
									{

  						?>
  						<tr><input name=type type="radio" value ="<?php echo $row['TID'];?>" id="t<?php echo $i;?>" disabled="disabled"><?php echo $row['NAME']; ?> <p></tr>
  									<?php
  									$i++;
  									}
  								
  						?>
  						
						<tr><input name=type type="radio" value ="ALL" id="t<?php echo $i;?>" disabled="disabled">ALL<p></tr>

					</table>
				</div>
			</td>
		    <td>
		    	
		    	<input type="checkbox" onclick="justToday()" id="checkToday"/> Just Today...<p>
		    	<div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "Enter a Date *YYYY-MM-DD*">
						<input class="input100" type="text" name="date_o" id="date_o" required>
						<span class="focus-input100" data-placeholder="From:"></span>
		    </td>
		    <td>
		    	<input type="checkbox" onclick="Today()" id="checkTodayy"/> Until Today<p> 
		    	<div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "Enter a Date *YYYY-MM-DD*">
						<input class="input100" type="text" name="date_f" id="date_f" required>
						<span class="focus-input100" data-placeholder="To:"></span>
		    </td>
		  </tr>
		</table>

		<div class="wrap-login100 p-t-15 " style=" margin:0 auto;">
			<div class="container-login100-form-btn">
				<button class="login100-form-btn">
					Generate Report
				</button>
			</div>
		</div>		
	</form>
	&nbsp&nbsp
	<input type="checkbox" onclick="Reset()" id="Reset">Reset values.
	
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
<?php mysqli_close($conection);?>