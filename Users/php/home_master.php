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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel='stylesheet' href='https://rsms.me/inter/inter-ui.css?v=3.2'>
  <link rel="stylesheet" href="./style2.css">
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


	</script>

   <title>Homepage</title>
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
					$name = $row['NAME'];
					$lastname = $row['SURNAME'];
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

	<br><br><br>
	<table>
		<th>
			<div class="wrapper">
			  <div class="sidebar">
			    <div class="sidebar__header">
			      <div class="profile sidebar__profile"><img class="profile__avatar" src="../images/profile_pictures/<?php echo $user?>.jpg"/>
			        <div class="profile__name"><?php echo $name, " ", $lastname;?> </div>
			      </div>
			      <div class="theme-btn" id="themeButton"><i class="theme-btn__icon" data-feather="moon"></i><span class="theme-btn__label">Night mode</span></div>
			    </div>
			    <div class="sidebar__body">
			      <div class="menu sidebar__menu">

			      	  <a class="menu__item" href="#">
				          <div class="menu__icon"><i data-feather="home"></i></div>
				          <div class="menu__title">Home</div>
			      	  </a>

			      	  <a class="menu__item" href="home_report.php?sx=<?php echo $user;?>" >
				          <div class="menu__icon"><i data-feather="file-text"></i></div>
				          <div class="menu__title">Generate Report</div>
			      	  </a>

			          <a class="menu__item" href="edit_add_worker.php?sx=<?php echo $user;?>">
				          <div class="menu__icon"><i data-feather="users"></i></div>
				          <div class="menu__title">Team</div>
			      	  </a>
			      	  <a class="menu__item" href="edit_add_customer.php?sx=<?php echo $user;?>">
				          <div class="menu__icon"><i data-feather="briefcase"></i></div>
				          <div class="menu__title">Customers</div>
			      	  </a>

			          <a class="menu__item" href="edit_add_global.php?sx=<?php echo $user;?>">
			          <div class="menu__icon"><i data-feather="globe"></i></div>
			          <div class="menu__title">Global Activity</div></a></div>

			          <a class="menu__item"  href="edit_add_type.php?sx=<?php echo $user;?>">
			          <div class="menu__icon"><i data-feather="type"></i></div>
			          <div class="menu__title">Type of</div></a></div>

			         
			    </div>
			  </div>
			</div>
		</th>
		<th width="70%">
			 <div class="image" align="center">
				<img  style="border-radius: 20px;" src="../images/page.jpg" width="70%" height="50%" ><br>
				<p>If you think compliance is expensive, try non-compliance...</p>
			</div>
		</th>
	</table>
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
	<script src='https://unpkg.com/feather-icons'></script><script  src="./script2.js"></script>


</body>
<html>
