
					
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
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="./style.css">

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
						.tg-celdas3{	text-align:right;
						
						padding-left: 25px;
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


   <title>Homepage</title>
</head>

<body onload="startTime()">
	
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
					mysqli_free_result($result);
					mysqli_close($conection);
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
	
<div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Edit</a></li>
        <li class="tab"><a href="#login">Delete</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          
          
          <form action="edit.php" method="post">
          	<div class="top-row">
	            <div class="field-wrap">
	            <label>
	              UserID:</span>
	            </label>
	          	</div>
	          	<div class="field-wrap">
	            <input type="text" name="UID"  id="UID" readonly="readonly" 
					value="<?php echo $user ; ?>">
	          	</div>
      		</div>
          <div class="top-row">
            <div class="field-wrap">
              <label>
                Activity Number<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name="AID" />
            </div>
        
            <div class="field-wrap">
              <label>
                Date</span>
              </label>
              <input type="text"required autocomplete="off" name="date_o_day"/>
            </div>
          </div>

          <div class="top-row">
          	<div class="field-wrap">
              <label>
                Initial Time</span>
              </label>
              <input type="text"required autocomplete="off" name="date_o"/>
            </div>
            <div class="field-wrap">
              <label>
               Final Time</span>
              </label>
              <input type="text" required autocomplete="off" name="date_f" />
            </div>
           </div>

          <div class="field-wrap">
              <label>
               Coments</span>
              </label>
              <input type="text" required autocomplete="off" name="ACTIVITY" />
            </div>

          <p class="forgot"><a href="act_rep.php?sx=<?php echo $user;?>">¿Activity number?</a></p>
          <button type="submit" class="button button-block"/>Edit</button>
          
          </form>


        </div>
        
        <div id="login">   
          
          
          <form action="delete.php" method="post">
          	<div class="top-row">
	            <div class="field-wrap">
	            <label>
	              UserID:</span>
	            </label>
	          	</div>
	          	<div class="field-wrap">
	            <input type="text" name="UID"  id="UID" readonly="readonly" 
					value="<?php echo $user ; ?>">
	          	</div>
      		</div>
          <div class="top-row">
            <div class="field-wrap">
            <label>
              Activity Number<span class="req">*</span>
            </label>
            <input type="text" required autocomplete="off" name="AID"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Confirm activity<span class="req">*</span>
            </label>
            <input type="text"required autocomplete="off" name="AID_2"/>
          </div>
          </div>
          <p class="forgot"><a href="act_rep.php?sx=<?php echo $user;?>">¿Activity number?</a></p>
          
          <button class="button button-block"/>Delete</button>
          
          </form>

 

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
<!-- partial -->
 
	<div class="div-container">Developed by Josué Rodríguez.</div>

 <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./script.js"></script>
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

