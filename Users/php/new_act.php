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
				position:absolute;
			    bottom:5px;
			    right:30px;
			}
		
            .my-custom-scrollbar {
				position: relative;
				height: 215px;
				overflow: auto;
								 }
			.table-wrapper-scroll-y 
			{
				display: block;
			}

    </style>

  	<script>


  	
  	function Today()
  	{	
  		var checkbox = document.getElementById('checkTodayy');
  		var date_f = document.getElementById('date_o_day'); 
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
  
  
  	function newForm()
  	{
  		
  			alert("Arre pues muchacho trabajador");
  			
  			var body = document.getElementById('newform');
  			var tabla   = document.createElement("table");
  			var tblBody = document.createElement("tbody");
  			
    		var hilera = document.createElement("tr");
	 		hilera.setAttribute("style", "background-color: white;");
	 		for (var i = 0; i < 5; i++) 
	 		{
		     
		      var celda = document.createElement("td");
		      
		      
		      if(i==0)
		      	{	celda.setAttribute("width","10%" );
		      	 var textoCelda = document.createTextNode("<?php echo $_GET['user'] ; ?>");
		      }
		      if(i==1)
		      {
		      	celda.setAttribute("width","10%" );

		      	 //textoCelda = document.createTextNode("Benefit");
		      	 var textoCelda = document.createElement("input");
		      	 
					textoCelda.type = "text";
					textoCelda.className = "wrap-input100 validate-input m-t-85 m-b-35";
					textoCelda.setAttribute("data-placeholder", "Activity must be less than 200 characters.");
		      }
		      if(i==2){
		      	celda.setAttribute("width","60.1%" );
		      	 var textoCelda = document.createTextNode("Activity");
		      }
		      if(i==3)
		      {celda.setAttribute("width","10%" );
		      	 var textoCelda = document.createTextNode("Done?");
		      }
		      if(i==4)
		      {celda.setAttribute("width","10%" );
		      	 var textoCelda = document.createTextNode("Time");
		      }

		      celda.appendChild(textoCelda);
		      hilera.appendChild(celda);
    		}
    		
		 	

		 	tblBody.appendChild(hilera);
  
 
			  // posiciona el <tbody> debajo del elemento <table>
			tabla.appendChild(tblBody);
			  // appends <table> into <body>
			body.appendChild(tabla);
			  // modifica el atributo "border" de la tabla y lo fija a "2";
			//tabla.setAttribute("width", "100%");
  	}
  
  	
  	

	function startTime() 
		{
			var today = new Date();
			var h = today.getHours();
			var m = today.getMinutes();
			var s = today.getSeconds();
			m = checkTime(m);
			 
			document.getElementById('txt').innerHTML =
			h + ":" + m ;
			var t = setTimeout(startTime, 500);
		}

	function checkTime(i) 
		{
		  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
		  return i;
		}


	</script>


   <title>New Activity</title>
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
					
				?>
	   		</a></li>
	   	<li style="float: left;"><a href="home_users.php?sx=<?php echo $user;?>">Home</a></li>	
	   	<li class="activate" style="float:left;">
	   		<a href='#'>Activity</a>
	   		<ul>
	   			<li><a href="new_act.php?sx=<?php echo $user;?>">New Activity</a>
	   				
	   			<li><a href="act_rep.php?sx=<?php echo $user;?>">Activity Report</a>
	   				<?php if ($user == 145591) {?>
	   			<li><a href="edit_act.php?sx=<?php echo $user;?>">Edit an Activity</a>
	   				<?php }?>
	   		</ul>
	   	</li>
	   
	</ul>

	</div>
	<form class="login100-form validate-form" action="input2.php?b=0" method="post" id="form1">
		 
		 
		<table>
		  <tr>
		    <th width="7%">
		    	UserID
		    </th>
		    <th width="9%">
		    	Customer
		    </th>
		    <th width="23%">
		    	Global Activity 
		    </th>
		    <th width="13%">
		    	Type of   
		    </th>
		    <th width="27%">
		    	Activity <p> must be less than 500 characters. 
		    </th>
		    <th width="7%">
		    	Done? <p>(Yes - No)
		    </th>
		    <th width="20%">
		    	Time Invested
		    </th>
		  </tr>
		  <tr>
		    <td>
		    	<div class="wrap-input100 validate-input m-t-85 m-b-35">
					<input class="input100" type="text" name="UID"  id="UID" readonly="readonly" 
					value="<?php echo $user ; ?>">
					<span class="focus-input100"></span>
				</div>
		    </td>	
			<td class="tg-celdas2">
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
  						

  						
					</table>
				</div>
			</td>
			<td class="tg-celdas2">
		    	<div class="table-wrapper-scroll-y my-custom-scrollbar">

  					<table class="table table-bordered table-striped mb-0">  

  						

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
			<td class="tg-celdas2">
		    	<div>

  					<table class="table table-bordered table-striped mb-0">

  						<?php
  							$i=1;
  							$sql = "SELECT * FROM `type_act`";
  							$result = mysqli_query($conection,$sql);
								while($row=mysqli_fetch_assoc($result))
									{

  						?>
  						<tr><input name=type type="radio" value ="<?php echo $row['TID'];?>" id="t<?php echo $i;?>" ><?php echo $row['NAME']; ?> <p></tr>
  									<?php
  									$i++;
  									}
  								
  						?>
  						
						

					</table>
				</div>
			</td>
		    <td >
		    	<div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "Activity must be less than 500 characters.">
						<input class="input100" type="text" name="ACTIVITY" autocomplete="off" required>
						<span class="focus-input100" data-placeholder="Activity"></span>
		    </td>
		   
		    <td class="tg-celdas">
		    	<div >

  					<table class="table table-bordered table-striped mb-0">
  						
  						<tr><input name=A_DONE type="radio" value ="SI" id="d1"  required>
									Yes <p></tr><br>
						<tr><input name=A_DONE type="radio" value ="NO" id="d2">
									No <p></tr>		
						
					</table>
				</div>
			</td>
			
		    <td>

				<input type="checkbox" onclick="Today()" id="checkTodayy"/> Today...<p> 
				
					<table>
  						
  						<td class="tg-celdas3" colspan="2" ><br>
  							<div class="wrap-input100 validate-input " data-validate = "Enter a Date *YYYY-MM-DD*">
					<input class="input100" type="text" name="date_o_day" id="date_o_day" autocomplete="off" required>
					<span class="focus-input100" data-placeholder="<?php echo "yyyy-mm-dd";?>"></span>
				</div>
  						</td>
  						<tr>
  							<td class="tg-celdas3"><br>
  								<div class="wrap-input100 validate-input " data-validate = "Enter a time *HH:MM*">
									<input class="input100" type="text" name="date_o" id="date_o" autocomplete="off" required>
									<span class="focus-input100" data-placeholder="<?php echo"Initial\nhh:mm";?>"></span>
								</div>	
  							</td>
  							<td class="tg-celdas3"><br>
  								<div class="wrap-input100 validate-input" data-validate = "Enter a time *HH:MM*">
									<input class="input100" type="text" name="date_f" id="date_f" autocomplete="off" required>
									<span class="focus-input100" data-placeholder="<?php echo"Final\nhh:mm";?>"></span>
								</div>	
  							</td>
  						</tr>
					</table>
			</td>
			
		</table>
		<!--
		<div id="newform"></div>
			<div class="wrap-login100 p-t-50 " style=" display: inline-block;  ">
				
				<button class="login100-form-btn"  onclick="newForm()" id="checkForm">
							Add Row
						</button>
				
			</div>
		-->
	
			<div class="wrap-login100 p-t-15 " style=" margin:0 auto;">
	
					<button class="login100-form-btn">
						Send!
					</button>
						
			</div>
		
	

	</form>

	<div class="div-container">Developed by Josué Rodríguez.</div>


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