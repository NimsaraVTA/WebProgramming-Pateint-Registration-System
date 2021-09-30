<?php
session_start();
?><?php
require_once("connection.php");
?><?php
if(isset($_GET['search'])){
    
    $search=mysqli_real_escape_string($connection,$_GET['search']);
    $query="SELECT * FROM doctor_contact WHERE d_name LIKE '%{$search}%'";

}else if(empty($_GET['search'])){

$query="SELECT * FROM doctor_contact where is_deleted=0 ORDER BY d_name";

    
}

$userlist='';


//getting the list of users

$users=mysqli_query($connection,$query);

if($users){
    
    while($user=mysqli_fetch_assoc($users)){
      $userlist.="<tr>";
        $userlist.="<td>{$user['d_name']}</td>";
        $userlist.="<td>{$user['d_no']}</td>";
        $userlist.="<td>{$user['d_details']}</td>";
        $userlist.="<td><a href=\"modify_d_contact.php?d_name={$user['d_name']}\">Edit</a></td>";
        $userlist.="<td><a href=\"delete_d_contact.php?d_name={$user['d_name']}\">Delete</a></td>";
      $userlist.='<tr>';    
        
    }
    
}else{
    
    echo 'Database query failed!';
}

?><!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Patients' List</title>
<style>

body {margin:0;font-family:Arial; background-color: #c3a789;}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 20px 16px;
  text-decoration: none;
  font-size: 17px;
}

.active {
  background-color: #772014;
  color: black;
}

.topnav .icon {
  display: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 17px;    
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.topnav a:hover, .dropdown:hover .dropbtn {
  background-color: #555;
  color: white;
}

.dropdown-content a:hover {
  background-color: #ddd;
  color: black;
}

.dropdown:hover .dropdown-content {
  display: block;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child), .dropdown .dropbtn {
    display: none;
  }
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
  .topnav.responsive .dropdown {float: none;}
  .topnav.responsive .dropdown-content {position: relative;}
  .topnav.responsive .dropdown .dropbtn {
    display: block;
    width: 100%;
    text-align: left;
  }
}

table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
  margin: 10px 0px 0px 0px;
}

th, td {
  text-align: left;
  padding: 18px;
  border-bottom: 1px solid white;

}
th{
	background-color: #00001a;
            color: white;
}
td{

}
    td:hover{
        background-color: #772014;
            color: white;
    }
tr:nth-child(even){background-color: #f2f2f2}


.backup_frame{
            
            
            margin-top : -10px;
            width: 180px;
            height: 50px;
            background-color: #772014;
            margin-left: 44%;
            
        }  
        
    @media screen and (max-width: 931px){
        
        .backup_frame,#backup{
            
            margin-left: 41%;
        }
        
        
    }
    
    @media screen and (max-width: 673px){
        
        .backup_frame,#backup{
            
            margin-left: 36%;
        }
        
        
    }
    
    @media screen and (max-width: 451px){
        
        .backup_frame,#backup{
            
            margin-left: 31%;
        }
        
        
    }
    
    @media screen and (max-width: 345px){
        
        .backup_frame,#backup{
            
            margin-left: 23%;
        }
        
        
    }
         #backup{
            
            position: absolute;
            text-align: center;
            margin: 5px 0px 0px 20px;
            height: 40px;
            width: 130px;
            font-size: 15px;
             background-color: #772014;
            font-weight: bold;
            border: none;
            border-color: transparent;
            outline: none;
             color: white;
            
        } 
        
        ::placeholder{
            
            color: white;
            font-weight: bold;
        }  
        
</style>
</head>
<body>


<div class="topnav" id="myTopnav">
  <?php
    
          
          $o='Onco';
          $b='Breast';
          $os='Onco Surgeory';
        
          if($_SESSION['user_clinic']===$o){
              
              echo '<a href="main.php" class="active">Home</a>';
              
          }else if($_SESSION['user_clinic']===$b){
              
              
              echo '<a class="active" href="breast_clinic.php">Home</a>';
        
             
              
          }else if($_SESSION['user_clinic']===$os){
              
              echo '<a class="active" href="onco_surgeory_clinic.php">Home</a>';
        
          }else{
              
              echo '<a href="" class="active">Home</a>';
          }
          
    ?>

  <a href="doctor_contacts.php">Add Doctor Contacts</a>
  <a href="#contact" onclick="window.print()">Get A Print Of Patints</a>
  <a href="#about">About</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>

<div style="padding-left:16px">

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

<h2 style="text-align:center; padding:15px;">Doctors' Contact List</h2>



    
    <div class="backup_frame">
    
        <form method="get">
    
        <input type="text" id="backup" name="search" placeholder="Search Name" autofocus autocomplete="off">
            
        </form>
    
    </div>
    



<div style="overflow-x:auto;">
  <table>
    <tr>
            <th>Doctor's Name</th>
            <th>Contact No</th>
            <th>Details of Contact</th>
            <th>Edit</th>
            <th>Delete</th>
    </tr>
    <?php  echo $userlist ?>
  </table>
</div>

</body>
</html><?php

mysqli_close($connection);

?>