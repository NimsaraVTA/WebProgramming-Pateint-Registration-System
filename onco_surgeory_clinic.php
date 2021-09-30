<?php 
session_start();

$o='Onco';
$b='Breast';
$os='Onco Surgeory';

?><?php
require_once("connection.php");
?><?php

if(!isset($_SESSION['first_name'])){
    
    header('Location: login.php');
}

?><!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Onco Surgeory Clinic</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		
		body{

			margin: 0px;
			box-sizing: border-box;
			background-color: #DEC1FF;
			
		}
		.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 25px 20px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #7D70BA;
  color: white;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}
		#currentDateTime{
			display: flex;
			position: absolute;
			text-align: center;
			font-size: 40px;
			color: white;
			background-color: transparent;
			border: none;
		}

		@keyframes animatedBackground {
  from {
    background-position: 0 0;
  }
  to {
    background-position: 100% 0;
  }
}
		.header1{
			background-image: url("imgs/os.jpg");
			opacity: .9;
			background-position: 0px 0px;
  background-repeat: repeat-x;
  animation: animatedBackground 5s linear infinite alternate;
		}
		.panel{

			display: flex;
			flex-wrap: wrap;
		}

		.side2{

			flex: 100%;
			margin-top: 20px;
			background-color: transparent;
		}
		.img-side2{
			display: contents;
		}
		.img-side2 > button{
			
			height: 180px;
			width: 180px;
			margin-left: 105px;
			display: inline;
			border-radius: 50%;
			margin-top: 40px;
			border: 2px solid #7D70BA;
			box-shadow: 5px 10px 8px 10px #888888;
			color: #7D70BA;
			font-weight: bold;
			font-size: 20px;

		}
		
		.img-side2 > button:hover{

			transform: scale(1.5);
			transition: 1s;
		}
		.navbar {
  display: flex;
  background-color: #333;
  border: 1px solid white;
}

/* Style the navigation bar links */
.navbar a {
  color: white;
  padding: 14px 20px;
  text-decoration: none;
  text-align: center;
}

/* Change color on hover */
.navbar a:hover {
  background-color: #ddd;
  color: black;
}

		@media screen and (max-width: 840px){

			.side1,.side2,.navbar{

				flex-direction: column;
			}
		}
	</style>

    
     <script>
function alert1() {
  alert("You can't access Onco clinic page!");
}

function alert2() {
  alert("You can't access Onco Surgeory clinic page!");
}   

function alert3() {
  alert("You can't access Breast clinic  page!");
} 
    
</script>
    
</head>
<body>

<div class="topnav" id="myTopnav">
  <a href="onco_surgeory_clinic.php" class="active">Home</a>
    
    <?php
    
    if($o===$_SESSION['user_clinic']){ 
        
        echo '<a href="main.php" onclick="window.location.href=\'main.php\'">Onco Clinic</a>';
        
     }else{
        
         echo '<a onclick="alert1()">Onco Clinic</a>';
    }
    
    if($o===$_SESSION['user_clinic']){ 
        
        echo '<a href="breast_clinic.php" onclick="window.location.href=\'breast_clinic.php\'">Breast Clinic</a>';
        
     }else{
        
         echo '<a onclick="alert3()">Breast Clinic</a>';
    }
    
    ?>
    
  <a href="doctor_contacts.php">Doctors' Contacts</a>
  <a href="ward_contact.php">Wards' Contacts</a>
  <a href="#about">About</a>
  <a href="logout.php">Log out</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
<div style=" padding: 60px; " class="header1">
	
	 <h1 style="color:#620869;">Hi, <?php echo $_SESSION['first_name']; ?>!</h1>
	<h1 style="color:white; font-family: Verdana; font-size: 40px; text-align: center; color: black;">Home Page - Onco Surgeory Clinic <br> Teaching Hospital <br> Kurunegala</h1>

</div>

<!--<div>
	<input type="text" id="currentDateTime">
	<script>
	  var today = new Date();
	var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
	var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds(); 
	var dateTime = date+' '+time;
	  document.getElementById("currentDateTime").value = dateTime;
	</script>
	
</div>-->

<div class="panel">
	
	<div class="side2">
		
				<a href="OS_update_b.php" style="text-decoration:none"><div  class="img-side2">
				<button>Update Patients</button>
				</div></a>
				<a href="OS_list.php" style="text-decoration:none"><div  class="img-side2">
				<button>Show Patients</button>
				</div></a>
		        <a href="add_admin_OS.php" style="text-decoration:none"><div  class="img-side2">
				<button>Add Admins</button>
				</div></a>
				<a href="AOS_update_b.php" style="text-decoration:none"><div  class="img-side2">
				<button>Update Admins</button>
				</div></a>
				<a href="admin_list_OS.php" style="text-decoration:none"><div  class="img-side2">
				<button>Show Admins</button>
				</div></a>
		
	
	</div>

</div>

</body>
</html>
 <?php

mysqli_close($connection);

?>