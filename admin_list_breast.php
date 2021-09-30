<?php
session_start();
?><?php
require_once("connection.php");
?><?php
if(isset($_GET['search'])){
    
    $search=mysqli_real_escape_string($connection,$_GET['search']);
    $query="SELECT * FROM user WHERE username LIKE '%{$search}%' AND clinic= 'Breast'";

}else if(empty($_GET['search'])){

$query="SELECT * FROM user where is_deleted=0 AND clinic= 'Breast' ORDER BY username";

    
}
$userlist='';
//getting the list of users

$users=mysqli_query($connection,$query);

if($users){
    
    while($user=mysqli_fetch_assoc($users)){
      $userlist.="<tr>";
        $userlist.="<td>{$user['username']}</td>";
        $userlist.="<td>{$user['clinic']}</td>";
        $userlist.="<td>{$user['last_login']}</td>";
        $userlist.="<td><a href=\"modify_admin_B.php?username={$user['username']}\">Edit</a></td>";
        $userlist.="<td><a href=\"delete_admin_B.php?username={$user['username']}\">Delete</a></td>";
      $userlist.='<tr>';    
        
    }
    
}else{
    
    echo 'Database query failed!';
}

?><!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin List</title>
<style>

body {margin:0;font-family:Arial; background-color: #e8e8e8;}

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
  background-color: #b3d9ff;
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
        background-color: #75B09C;
            color: white;
    }
tr:nth-child(even){background-color: #f2f2f2}


.backup_frame{
            
            
            margin-top : -10px;
            width: 180px;
            height: 50px;
            background-color: #b3d9ff;
            margin-left: 43%;
            
        }  
        
    @media screen and (max-width: 931px){
        
        .backup_frame,#backup{
            
            margin-left: 40%;
        }
        
        
    }
    
    @media screen and (max-width: 673px){
        
        .backup_frame,#backup{
            
            margin-left: 35%;
        }
        
        
    }
    
    @media screen and (max-width: 451px){
        
        .backup_frame,#backup{
            
            margin-left: 30%;
        }
        
        
    }
    
    @media screen and (max-width: 345px){
        
        .backup_frame,#backup{
            
            margin-left: 22%;
        }
        
        
    }
         #backup{
            
            position: absolute;
            text-align: center;
            margin: 5px 0px 0px 20px;
            height: 40px;
            width: 130px;
            font-size: 15px;
             background-color: #b3d9ff;
            font-weight: bold;
            border: none;
            border-color: transparent;
            outline: none;
            
        } 
        
        ::placeholder{
            
            color: black;
            font-weight: bold;
        }  
        
</style>
</head>
<body>



<div class="topnav" id="myTopnav">
  <a href="breast_clinic.php" class="active">Home</a>
  <a href="add_admin_breast.php">Add Admin</a>
  <a href="AB_update_b.php">Modify Admin</a>
  <a href="#contact" onclick="window.print()">Get A Print Of Admins</a>
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

<h2 style="text-align:center; padding:15px;">Admin List - Breast Clinic</h2>



    
    <div class="backup_frame">
    
        <form method="get">
    
        <input type="text" id="backup" name="search" placeholder="Search Username" autofocus autocomplete="off">
            
        </form>
    
    </div>
    



<div style="overflow-x:auto;">
  <table>
    <tr>
      <th>User Name</th>
      <th>Cinic Name</th>
      <th>Last Login</th>
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