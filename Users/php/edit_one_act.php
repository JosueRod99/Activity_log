<?php
	$buton = $_POST['edit'];
	$nact =  $_POST['act']; 
	require_once('Conexion.php');
	$conn=new Conexion();
	$conection = $conn->conectarse();

	$result = mysqli_query($conection,"SELECT * FROM winfo,activity_log WHERE activity_log.AID = $nact and  activity_log.UID = winfo.UID");
	$row = mysqli_fetch_array($result);
	$UID = $row['UID'];
	$user = $row['UID'];
	$name = $row['NAME'];
	$lastname = $row['SURNAME'];
	mysqli_free_result($result);

	if($buton == 2)
	{
		$sql = "SELECT * from activity_log where AID = $nact";
		
		$result = mysqli_query($conection,$sql);
		$check = mysqli_num_rows($result); 
		mysqli_free_result($result);
     	if($check>0){ 
			$sql = "DELETE from activity_log where AID = $nact";
			$result = mysqli_query($conection,$sql);
			echo "<script>
	                        alert('Registro borrado exitosamente.');
	                        window.location= 'act_rep.php?sx=$UID'
	            </script>";
	        }
		else
		{
			echo "<script>
                        alert('No existe el registro indicado.');
                        window.location= 'act_rep.php?sx=$UID'
            </script>";		
        }

		
	}

	$sql = "SELECT * from activity_log where AID = $nact";
	$result=mysqli_query($conection, $sql);
	$row=mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	
	$DATE_O = $row['DATE'];
	$DATE_F = $row['DATE_FINAL'];
	$ACTIVITY = $row['ACTIVITY'];
	$DONE = $row['A_DONE'];
		if($DONE == "SI")
		{
			$A_DONE = "d1";
		}
		else
		{
			$A_DONE = "d2";
		}
	$BENEFIT = $row['BENEFIT'];
	$GID = $row['GID'];
	$TID = $row['TID'];

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
			.tg-celdas4{	text-align: left;
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
    </style>

  	<script>

  	function Edit() 
  	{	
	  		var b = "b<?php echo $BENEFIT;?>";
	  		var b_n = "<?php echo $BENEFIT;?>";
	  		var a = "<?php echo $A_DONE;?>";
	  		var g = "g<?php echo $GID;?>";
	  		var g_n = "<?php echo $GID;?>";

	  		document.getElementById(b).checked = true;

	  		document.getElementById(a).checked = true;

	  		document.getElementById(g).checked=true;


	  		disableChecksb1(parseInt(b_n));

	  		
	  		disableChecksg1(parseInt(g_n));

	}

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

		function disableChecksw1(k)
	  	{	var i;
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

  	function disableChecksg1(k)
	  	{	var i;
	  		var w1 = document.getElementById("g"+k);
	  		if (w1.checked == true)	
				for (i = 1; i < 101; i++) 
					if(i!=k)
	  					{
	  						w2 = document.getElementById("g"+i);
	  						if(w2)
	  							w2.disabled = true;
	  					}//document.getElementById("g"+i).disabled = true;

	  		if (w1.checked == false)
				for (i = 1; i < 101; i++)
						if(i!=k)
						{
							w2 = document.getElementById("g"+i);
	  						if(w2)
	  							w2.disabled = false;
						} 
	  				//document.getElementById("g"+i).disabled = false;
	  		
	  		var o = 0;

	  		if(k > 0 && k < 21)
	  			 o = 1;
	  		
	  		if(k > 20 && k < 41)
	  			 o = 2;
	  		
	  		if(k > 40 && k < 61)
	  			 o = 3;

	  		if(k > 60 && k < 81)
	  			 o = 4;
	  		
	  		if(k > 80 && k < 101)
	  			 o = 5;


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
	  	{	var i;
	  		var w1 = document.getElementById("b"+k);
	  		if (w1.checked == true)	
				for (i = 1; i < 14; i++) 
					if(i!=k)
	  					document.getElementById("b"+i).disabled = true;

	  		if (w1.checked == false)
				for (i = 1; i < 14; i++)
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
  
  	function Blocked()
  	{
  		var input = document.getElementById('UID');
		input.value = '<?php echo $_GET['user'] ; ?>';	
  	}
  	

	function reset()
		{
			document.getElementById('form').reset();
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


   <title>Edit</title>
</head>

<body onload="Edit()">
	
	<div id='cssmenu'>
	<ul>
		<li style="float:right;"><a href='logout.php'>Log out</a></li>
		<li style="float:right;"><a href='#'> |</a></li>
		<li style="float:right;"><a href='#'> Varroc Lighting Systems</a></li>
		
	    <li style="float:left;"><a href='#'>
			<?php
					echo $name," ",$lastname;
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
	



	<form class="login100-form validate-form" action="input2.php?b=<?php echo $nact;?>" method="post" id="form1">
		 
		 
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
		    	<div class="table-wrapper-scroll-y my-custom-scrollbar" >

  					<table class="table table-bordered table-striped mb-0">
  						<tr><input name=benefit type="checkbox" onclick="disableChecksb1(1)" value ="1"  id="b1" required>
									VLS <p></tr>
						<tr><input name=benefit type="checkbox" onclick="disableChecksb1(2)" value ="2"  id="b2">
									VW <p></tr>
						<tr><input name=benefit type="checkbox" onclick="disableChecksb1(3)" value ="3"  id="b3">
									NISSAN <p></tr>
						<tr><input name=benefit type="checkbox" onclick="disableChecksb1(4)" value ="4"  id="b4">
									FCA <p></tr>
						<tr><input name=benefit type="checkbox" onclick="disableChecksb1(5)" value ="5"  id="b5">
									FORD <p></tr>
						<tr><input name=benefit type="checkbox" onclick="disableChecksb1(6)" value ="6"  id="b6">
									TESLA <p></tr>
						<tr><input name=benefit type="checkbox" onclick="disableChecksb1(7)" value ="7" id="b7">
									BRP <p></tr>
						<tr><input name=benefit type="checkbox" onclick="disableChecksb1(8)" value ="8" id="b8">
									VLSM <p></tr>
						<tr><input name=benefit type="checkbox" onclick="disableChecksb1(9)" value ="9" id="b9">
									HONDA <p></tr>
						<tr><input name=benefit type="checkbox" onclick="disableChecksb1(10)" value ="10" id="b10">
									GRUPO ANTOLIN <p></tr>
						<tr><input name=benefit type="checkbox" onclick="disableChecksb1(11)" value ="11" id="b11">
									OEM <p></tr>
						<tr><input name=benefit type="checkbox" onclick="disableChecksb1(12)" value ="12" id="b12">
									GMC <p></tr>
						<tr><input name=benefit type="checkbox" onclick="disableChecksb1(13)" value ="13" id="b13">
									MOLEX <p></tr>				
					</table>
				</div>
			</td>
			<td class="tg-celdas2">
		    	<div class="table-wrapper-scroll-y my-custom-scrollbar">

  					<table class="table table-bordered table-striped mb-0">
  						
							<!-- 	OPERACION 1-14-->
  						<tr><input name=global type="checkbox" onclick="disableChecksg1(1)" value ="1"  id="g1" required>
									Actualización de INCOTERMS proveedores 2TS <p></tr>
						<tr><input name=global type="checkbox" onclick="disableChecksg1(2)" value ="2" id="g2" >
									Análisis y procesamiento de pedimentos pagados y aperturas <p></tr>
						<tr><input name=global type="checkbox" onclick="disableChecksg1(3)" value ="3" id="g3" >
									Apertura de pedimentos <p></tr>
						<tr><input name=global type="checkbox" onclick="disableChecksg1(4)" value ="4" id="g4" >
									Apertura de pedimentos CTM <p></tr>
						<tr><input name=global type="checkbox" onclick="disableChecksg1(5)" value ="5" id="g5" >
									Auditorias y aprobación de pedimentos <p></tr>
						<tr><input name=global type="checkbox" onclick="disableChecksg1(6)" value ="6" id="g6" >
									Auditoria y facturación de CTM  <p></tr>
						<tr><input name=global type="checkbox" onclick="disableChecksg1(7)" value ="7" id="g7" >
									Conferencia <p></tr>
						<tr><input name=global type="checkbox" onclick="disableChecksg1(8)" value ="8" id="g8" >
									Documentación de exportación  <p></tr>
						<tr><input name=global type="checkbox" onclick="disableChecksg1(9)" value ="9" id="g9" >
									Operación <p></tr>
						<tr><input name=global type="checkbox" onclick="disableChecksg1(10)" value ="10" id="g10" >
									Operación aérea <p></tr>
						<tr><input name=global type="checkbox" onclick="disableChecksg1(11)" value ="11" id="g11" >
									Pago de pedimentos<p></tr>
						<tr><input name=global type="checkbox" onclick="disableChecksg1(12)" value ="12" id="g12" >
									Pedimentos Virtuales <p></tr>
						<tr><input name=global type="checkbox" onclick="disableChecksg1(13)" value ="13" id="g13" >
									Soporte 2TS <p></tr>
						<tr><input name=global type="checkbox" onclick="disableChecksg1(14)" value ="14" id="g14" >
									Validación de pedimentos <p></tr>
									<!--AQUI ACABA OPERACION-->

									<!--COMPLIANCE 15-25 -->
									<!-- k = 21>40, values corresponden a base de datos--> 
						<tr><input name=global type="checkbox" onclick="disableChecksg1(21)" value ="15" id="g21" >
									Actualización <p></tr>
						<tr><input name=global type="checkbox" onclick="disableChecksg1(22)" value ="16" id="g22" >
									Anexo 31 <p></tr>
						<tr><input name=global type="checkbox" onclick="disableChecksg1(23)" value ="17" id="g23" >
									Anexo 24 <p></tr>
						<tr><input name=global type="checkbox" onclick="disableChecksg1(24)" value ="18" id="g24" >
									Auditoria, cuadre y cierre de pedimentos en 2TS de OEM<p></tr>
						<tr><input name=global type="checkbox" onclick="disableChecksg1(25)" value ="19" id="g25" >
									Capacitación <p></tr>
						<tr><input name=global type="checkbox" onclick="disableChecksg1(26)" value ="20" id="g26" >
									Compliance <p></tr>
						<tr><input name=global type="checkbox" onclick="disableChecksg1(27)" value ="21" id="g27" >
									Extracción de catalogos de SAP <p></tr>				
						<tr><input name=global type="checkbox" onclick="disableChecksg1(28)" value ="22" id="g28"  >
									Glosario de pedimentos <p></tr>
						<tr><input name=global type="checkbox" onclick="disableChecksg1(29)" value ="23" id="g29"  >
									RK digital de pedimentos <p></tr>
						<tr><input name=global type="checkbox" onclick="disableChecksg1(30)" value ="24" id="g30"  >
									RK físico de pedimentos <p></tr>
						<tr><input name=global type="checkbox" onclick="disableChecksg1(31)" value ="25" id="g31"  >
									Validación de 2TS vs DATA STAGE <p></tr>
									<!-- AQUI ACABA COMPLIANCE-->

									<!--CUSTOM BUDGET   26-32
									 41-60-->
						<tr><input name=global type="checkbox" onclick="disableChecksg1(41)" value ="26" id="g41" >
									Actualización de Budget <p></tr>
						<tr><input name=global type="checkbox" onclick="disableChecksg1(42)" value ="27" id="g42" >
									Auditoria del gasto del AA y validación de comprobados en SAT <p></tr>
						<tr><input name=global type="checkbox" onclick="disableChecksg1(43)" value ="28" id="g43" >
									Cierre de Finanzas <p></tr>
						<tr><input name=global type="checkbox" onclick="disableChecksg1(44)" value ="29" id="g44" >
									Generación de Wire Transfer<p></tr>
						<tr><input name=global type="checkbox" onclick="disableChecksg1(45)" value ="30" id="g45" >
									Ingreso de facturas COFIDI <p></tr>
						<tr><input name=global type="checkbox" onclick="disableChecksg1(46)" value ="31" id="g46" >
									Saldo en cuenta bancaria <p></tr>
						<tr><input name=global type="checkbox" onclick="disableChecksg1(47)" value ="32" id="g47" >
									Saldo total utilizado <p></tr>				
							<!--Aqui termina Custom budget-->
							<!-- CUSTOM SOPORTE 33 -37
								61-80 -->
						<tr><input name=global type="checkbox" onclick="disableChecksg1(61)" value ="33" id="g61" >
									2TS<p></tr>
						<tr><input name=global type="checkbox" onclick="disableChecksg1(62)" value ="34" id="g62" >
									Actualización de folios COFIDI <p></tr>
						<tr><input name=global type="checkbox" onclick="disableChecksg1(63)" value ="35" id="g63" >
									Atención/Soporte <p></tr>
						<tr><input name=global type="checkbox" onclick="disableChecksg1(64)" value ="36" id="g64" >
									Auditoria SAP vs Pedimentos Aduanas <p></tr>
						<tr><input name=global type="checkbox" onclick="disableChecksg1(65)" value ="37" id="g65" >
									Carga de catálogos a 2TS <p></tr>
								<!--Aqui termina Custom Soporte-->

							<!--ADMINISTRACION  38-39  
								81 - 99-->
						<tr><input name=global type="checkbox" onclick="disableChecksg1(81)" value ="38" id="g81" >
									Auditoria y tramite de lista de Asistencia TRANSPLACE/PALCO<p></tr>
						<!--<tr><input name=global type="checkbox" onclick="disableChecksg1(82)" value ="39" id="g82" >
									Comida <p></tr>-->
					</tr>		<!-- Aqui termina administracion-->	
					</table>
				</div>
			</td>
			<td class="tg-celdas2">
		    	<div >

  					<table class="table table-bordered table-striped mb-0">
  						
  						<tr><input name=type type="radio" value ="1" id="t1"  disabled="disabled">
									Operación <p></tr>
						<tr><input name=type type="radio" value ="2" id="t2" disabled="disabled">
									Compliance <p></tr>
						<tr><input name=type type="radio" value ="3" id="t3"  disabled="disabled">
									Custom Budget <p></tr>
						<tr><input name=type type="radio" value ="4" id="t4"  disabled="disabled">
									Custom Soporte <p></tr>
						<tr><input name=type type="radio" value ="5" id="t5"  disabled="disabled">
									Administración <p></tr>				
						
					</table>
				</div>
			</td>
		    <td >
		    	<div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "Activity must be less than 500 characters.">
						<input class="input100" type="text" name="ACTIVITY" autocomplete="off" required value="<?php echo $ACTIVITY;?>">
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
					<input class="input100" type="text" name="date_o_day" id="date_o_day" autocomplete="off" required 
					value="<?php echo substr($DATE_O, 0,10); ?>">
					<span class="focus-input100" data-placeholder="<?php echo "yyyy-mm-dd";?>"></span>
				</div>
  						</td>
  						<tr>
  							<td class="tg-celdas3"><br>
  								<div class="wrap-input100 validate-input " data-validate = "Enter a time *HH:MM*">
									<input class="input100" type="text" name="date_o" id="date_o" autocomplete="off" required
									value="<?php echo substr($DATE_O, strlen($DATE_O)-8,-3); ?>">
									<span class="focus-input100" data-placeholder="<?php echo"Initial\nhh:mm";?>"></span>
								</div>	
  							</td>
  							<td class="tg-celdas3"><br>
  								<div class="wrap-input100 validate-input" data-validate = "Enter a time *HH:MM*">
									<input class="input100" type="text" name="date_f" id="date_f" autocomplete="off" required
									value="<?php echo substr($DATE_F, strlen($DATE_F)-8,-3); ?>">
									<span class="focus-input100" data-placeholder="<?php echo"Final\nhh:mm";?>"></span>
								</div>	
  							</td>
  						</tr>
					</table>
			</td>
			
		</table>
		
			<div class="wrap-login100 p-t-15 " style=" margin:0 auto;">
	
					<button class="login100-form-btn">
						Edit!
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

