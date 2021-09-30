<?php
require_once("connection.php");
?>

<?php

session_start();

?>

<?php



if(isset($_GET['File'])){
    
    $p_file=mysqli_real_escape_string($connection,$_GET['File']);
    
      $query2="SELECT File FROM breast_patient WHERE File={$p_file} LIMIT 1";
      $result_set2=mysqli_query($connection,$query2);
    
    if($result_set2){
            
            if(mysqli_num_rows($result_set2)==1){
                
                $user2=mysqli_fetch_assoc($result_set2);
                $_SESSION['check']=$user2['File'];
                
                 if($_SESSION['check']===$p_file){
        
       echo "<script language='javascript'>
               
               alert('This is a breast clinic patient!');
               
               </script>";
        
    }
    
            }
    }
    
   
  /*...............................................................................*/
    
    
      $query3="SELECT File FROM os_patient WHERE File={$p_file} LIMIT 1";
      $result_set3=mysqli_query($connection,$query3);
    
    if($result_set3){
            
            if(mysqli_num_rows($result_set3)==1){
                
                $user3=mysqli_fetch_assoc($result_set3);
                $_SESSION['check2']=$user3['File'];
                
                 if($_SESSION['check2']===$p_file){
        
       echo "<script language='javascript'>
               
               alert('This is a os clinic patient!');
               
               </script>";
        
    }
    
            }
    }
    
   
  /*...............................................................................*/
    
    
    $query="SELECT * FROM onco_patient WHERE File={$p_file} LIMIT 1";
    
    $result_set=mysqli_query($connection,$query);
    
    if($result_set){
        
        if(mysqli_num_rows($result_set)==1){
            
        $result=mysqli_fetch_assoc($result_set);
        $Hospital=$result['Hospital'];
        $File=$result['File'];
        $Reg=$result['Reg'];
        $Consult=$result['Consult'];
        $Full=$result['Full'];
        $Age=$result['Age'];
        $Birth=$result['Birth'];
        $Sex=$result['Sex'];
        $NIC=$result['NIC'];
        $Address=$result['Address'];
        $Tel=$result['Tel'];
        $Occupation=$result['Occupation'];
        $Marital=$result['Marital'];
        $Member=$result['Member'];
        $Rela=$result['Rela'];
        $Site=$result['Site'];
        $Ref=$result['Ref'];
            
        }else{
            
            echo "<script language='javascript'>
               
               alert('Can't found!');
               
               </script>";
        }
        
    }else{
        
        header('Location: OP_list.php?query_falied');
    }
}

/*..............................................................................*/

?>


<?php


if(isset($_POST['Submit'])){
    
    
    $errors=array();
    $errors2=array();
    $errors3=array();
    
    if(!isset($_POST['File']) || strlen(trim($_POST['File']))<1){
        
        $errors[]='File is Missing/Invalid';
        
    }
    
    if(!isset($_POST['Hospital']) || strlen(trim($_POST['Hospital']))<1){
        
        $errors[]='Hospital is Missing/Invalid';
        
    }
    
    if(!isset($_POST['NIC']) || strlen(trim($_POST['NIC']))<1){
        
        $errors[]='re-password is Missing/Invalid';
        
    }
    
    if(!isset($_POST['Full']) || strlen(trim($_POST['Full']))<1){
        
        $errors[]='Full name is Missing/Invalid';
        
    }
    
    if(empty($errors)){
        
        $Hospital=mysqli_real_escape_string($connection,$_POST['Hospital']);
        $File=mysqli_real_escape_string($connection,$_POST['File']);
        $Reg=mysqli_real_escape_string($connection,$_POST['Reg']);
        $Consult=mysqli_real_escape_string($connection,$_POST['Consult']);
        $Full=mysqli_real_escape_string($connection,$_POST['Full']);
        $Age=mysqli_real_escape_string($connection,$_POST['Age']);
        $Birth=mysqli_real_escape_string($connection,$_POST['Birth']);
        $Sex=mysqli_real_escape_string($connection,$_POST['Sex']);
        $NIC=mysqli_real_escape_string($connection,$_POST['NIC']);
        $Address=mysqli_real_escape_string($connection,$_POST['Address']);
        $Tel=mysqli_real_escape_string($connection,$_POST['Tel']);
        $Occupation=mysqli_real_escape_string($connection,$_POST['Occupation']);
        $Marital=mysqli_real_escape_string($connection,$_POST['Marital']);
        $Member=mysqli_real_escape_string($connection,$_POST['Member']);
        $Rela=mysqli_real_escape_string($connection,$_POST['Rela']);
        $Site=mysqli_real_escape_string($connection,$_POST['Site']);
        $Ref=mysqli_real_escape_string($connection,$_POST['Ref']);
        $Topo=mysqli_real_escape_string($connection,$_POST['Topo']);
        $Histo=mysqli_real_escape_string($connection,$_POST['Histo']);
        $Icdo=mysqli_real_escape_string($connection,$_POST['Icdo']);
        $Diag=mysqli_real_escape_string($connection,$_POST['Diag']);
        $Tnm=mysqli_real_escape_string($connection,$_POST['Tnm']);
        $Site2=mysqli_real_escape_string($connection,$_POST['Site2']);
        $S1=mysqli_real_escape_string($connection,$_POST['S1']);
        $S2=mysqli_real_escape_string($connection,$_POST['S2']);
        $S3=mysqli_real_escape_string($connection,$_POST['S3']);
        $Mul=mysqli_real_escape_string($connection,$_POST['Mul']);
        $Rec=mysqli_real_escape_string($connection,$_POST['Rec']);
        $Rdate=mysqli_real_escape_string($connection,$_POST['Rdate']);
        $Treat=mysqli_real_escape_string($connection,$_POST['Treat']);
        $Dlast=mysqli_real_escape_string($connection,$_POST['Dlast']);
        $Remark=mysqli_real_escape_string($connection,$_POST['Remark']);
        $Refto=mysqli_real_escape_string($connection,$_POST['Refto']);
        $Slast=mysqli_real_escape_string($connection,$_POST['Slast']);
        $Nlast=mysqli_real_escape_string($connection,$_POST['Nlast']);
        
            
$query= "UPDATE onco_patient SET Hospital ='{$Hospital}',Reg='$Reg',Consult='{$Consult}',Full='{$Full}',Age='$Age',Birth='$Birth',Sex='{$Sex}',NIC='{$NIC}',Address='{$Address}',Tel='{$Tel}',Occupation='{$Occupation}',Marital='{$Marital}',Member='{$Member}',Rela='{$Rela}',Site='{$Site}',Ref='{$Ref}',Topo='{$Topo}',Histo='{$Histo}',Icdo='{$Icdo}',Diag='{$Diag}',Tnm='{$Tnm}',Site2='{$Site2}',S1='{$S1}',S2='{$S2}',S3='{$S3}',Mul='{$Mul}',Rec='{$Rec}',Rdate='$Rdate',Treat='{$Treat}',Dlast='$Dlast',Remark='{$Remark}',Refto='{$Refto}',Slast='{$Slast}',Nlast='{$Nlast}' WHERE File='{$File}'";
            
            $result=mysqli_query($connection,$query);
            
            if($result){
          
               header('Location: OP_list.php');
                
            }else{
                
               echo "<script language='javascript'>
               
               alert('Data adding failed!');
               
               </script>";
            
            }
        
    }else{
        
        echo "<script language='javascript'>
               
               alert('Some errors are found!');
               
               </script>";
    }
}

?>


<?php

if(isset($_POST['check-breast']) && isset($_POST['Submit'])){
    
     
    $errors=array();
    $errors2=array();
    $errors3=array();
    
    if(!isset($_POST['File']) || strlen(trim($_POST['File']))<1){
        
        $errors[]='File is Missing/Invalid';
        
    }
    
    if(!isset($_POST['Hospital']) || strlen(trim($_POST['Hospital']))<1){
        
        $errors[]='Hospital is Missing/Invalid';
        
    }
    
    if(!isset($_POST['NIC']) || strlen(trim($_POST['NIC']))<1){
        
        $errors[]='re-password is Missing/Invalid';
        
    }
    
    if(!isset($_POST['Full']) || strlen(trim($_POST['Full']))<1){
        
        $errors[]='Full name is Missing/Invalid';
        
    }
    
    if(empty($errors)){
        
        $Hospital=mysqli_real_escape_string($connection,$_POST['Hospital']);
        $File=mysqli_real_escape_string($connection,$_POST['File']);
        $Reg=mysqli_real_escape_string($connection,$_POST['Reg']);
        $Consult=mysqli_real_escape_string($connection,$_POST['Consult']);
        $Full=mysqli_real_escape_string($connection,$_POST['Full']);
        $Age=mysqli_real_escape_string($connection,$_POST['Age']);
        $Birth=mysqli_real_escape_string($connection,$_POST['Birth']);
        $Sex=mysqli_real_escape_string($connection,$_POST['Sex']);
        $NIC=mysqli_real_escape_string($connection,$_POST['NIC']);
        $Address=mysqli_real_escape_string($connection,$_POST['Address']);
        $Tel=mysqli_real_escape_string($connection,$_POST['Tel']);
        $Occupation=mysqli_real_escape_string($connection,$_POST['Occupation']);
        $Marital=mysqli_real_escape_string($connection,$_POST['Marital']);
        $Member=mysqli_real_escape_string($connection,$_POST['Member']);
        $Rela=mysqli_real_escape_string($connection,$_POST['Rela']);
        $Site=mysqli_real_escape_string($connection,$_POST['Site']);
        $Ref=mysqli_real_escape_string($connection,$_POST['Ref']);
        $Topo=mysqli_real_escape_string($connection,$_POST['Topo']);
        $Histo=mysqli_real_escape_string($connection,$_POST['Histo']);
        $Icdo=mysqli_real_escape_string($connection,$_POST['Icdo']);
        $Diag=mysqli_real_escape_string($connection,$_POST['Diag']);
        $Tnm=mysqli_real_escape_string($connection,$_POST['Tnm']);
        $Site2=mysqli_real_escape_string($connection,$_POST['Site2']);
        $S1=mysqli_real_escape_string($connection,$_POST['S1']);
        $S2=mysqli_real_escape_string($connection,$_POST['S2']);
        $S3=mysqli_real_escape_string($connection,$_POST['S3']);
        $Mul=mysqli_real_escape_string($connection,$_POST['Mul']);
        $Rec=mysqli_real_escape_string($connection,$_POST['Rec']);
        $Rdate=mysqli_real_escape_string($connection,$_POST['Rdate']);
        $Treat=mysqli_real_escape_string($connection,$_POST['Treat']);
        $Dlast=mysqli_real_escape_string($connection,$_POST['Dlast']);
        $Remark=mysqli_real_escape_string($connection,$_POST['Remark']);
        $Refto=mysqli_real_escape_string($connection,$_POST['Refto']);
        $Slast=mysqli_real_escape_string($connection,$_POST['Slast']);
        $Nlast=mysqli_real_escape_string($connection,$_POST['Nlast']);
        
            
$query= "UPDATE breast_patient SET Hospital ='{$Hospital}',Reg='$Reg',Consult='{$Consult}',Full='{$Full}',Age='$Age',Birth='$Birth',Sex='{$Sex}',NIC='{$NIC}',Address='{$Address}',Tel='{$Tel}',Occupation='{$Occupation}',Marital='{$Marital}',Member='{$Member}',Rela='{$Rela}',Site='{$Site}',Ref='{$Ref}',Topo='{$Topo}',Histo='{$Histo}',Icdo='{$Icdo}',Diag='{$Diag}',Tnm='{$Tnm}',Site2='{$Site2}',S1='{$S1}',S2='{$S2}',S3='{$S3}',Mul='{$Mul}',Rec='{$Rec}',Rdate='$Rdate',Treat='{$Treat}',Dlast='$Dlast',Remark='{$Remark}',Refto='{$Refto}',Slast='{$Slast}',Nlast='{$Nlast}' WHERE File='{$File}'";
            
            $result=mysqli_query($connection,$query);
            
            if($result){
                 
               header('Location: OP_list.php');
                
            }else{
                
               echo "<script language='javascript'>
               
               alert('Data adding failed!');
               
               </script>";
    
        }
    }else{
        
       echo "<script language='javascript'>
               
               alert('Some errors are found!');
               
               </script>";
    }
}

?>

<?php

if(isset($_POST['check-os']) && isset($_POST['Submit'])){
    
     
    $errors=array();
    $errors2=array();
    $errors3=array();
    
    if(!isset($_POST['File']) || strlen(trim($_POST['File']))<1){
        
        $errors[]='File is Missing/Invalid';
        
    }
    
    if(!isset($_POST['Hospital']) || strlen(trim($_POST['Hospital']))<1){
        
        $errors[]='Hospital is Missing/Invalid';
        
    }
    
    if(!isset($_POST['NIC']) || strlen(trim($_POST['NIC']))<1){
        
        $errors[]='re-password is Missing/Invalid';
        
    }
    
    if(!isset($_POST['Full']) || strlen(trim($_POST['Full']))<1){
        
        $errors[]='Full name is Missing/Invalid';
        
    }
    
    if(empty($errors)){
        
        $Hospital=mysqli_real_escape_string($connection,$_POST['Hospital']);
        $File=mysqli_real_escape_string($connection,$_POST['File']);
        $Reg=mysqli_real_escape_string($connection,$_POST['Reg']);
        $Consult=mysqli_real_escape_string($connection,$_POST['Consult']);
        $Full=mysqli_real_escape_string($connection,$_POST['Full']);
        $Age=mysqli_real_escape_string($connection,$_POST['Age']);
        $Birth=mysqli_real_escape_string($connection,$_POST['Birth']);
        $Sex=mysqli_real_escape_string($connection,$_POST['Sex']);
        $NIC=mysqli_real_escape_string($connection,$_POST['NIC']);
        $Address=mysqli_real_escape_string($connection,$_POST['Address']);
        $Tel=mysqli_real_escape_string($connection,$_POST['Tel']);
        $Occupation=mysqli_real_escape_string($connection,$_POST['Occupation']);
        $Marital=mysqli_real_escape_string($connection,$_POST['Marital']);
        $Member=mysqli_real_escape_string($connection,$_POST['Member']);
        $Rela=mysqli_real_escape_string($connection,$_POST['Rela']);
        $Site=mysqli_real_escape_string($connection,$_POST['Site']);
        $Ref=mysqli_real_escape_string($connection,$_POST['Ref']);
        $Topo=mysqli_real_escape_string($connection,$_POST['Topo']);
        $Histo=mysqli_real_escape_string($connection,$_POST['Histo']);
        $Icdo=mysqli_real_escape_string($connection,$_POST['Icdo']);
        $Diag=mysqli_real_escape_string($connection,$_POST['Diag']);
        $Tnm=mysqli_real_escape_string($connection,$_POST['Tnm']);
        $Site2=mysqli_real_escape_string($connection,$_POST['Site2']);
        $S1=mysqli_real_escape_string($connection,$_POST['S1']);
        $S2=mysqli_real_escape_string($connection,$_POST['S2']);
        $S3=mysqli_real_escape_string($connection,$_POST['S3']);
        $Mul=mysqli_real_escape_string($connection,$_POST['Mul']);
        $Rec=mysqli_real_escape_string($connection,$_POST['Rec']);
        $Rdate=mysqli_real_escape_string($connection,$_POST['Rdate']);
        $Treat=mysqli_real_escape_string($connection,$_POST['Treat']);
        $Dlast=mysqli_real_escape_string($connection,$_POST['Dlast']);
        $Remark=mysqli_real_escape_string($connection,$_POST['Remark']);
        $Refto=mysqli_real_escape_string($connection,$_POST['Refto']);
        $Slast=mysqli_real_escape_string($connection,$_POST['Slast']);
        $Nlast=mysqli_real_escape_string($connection,$_POST['Nlast']);
        
        
        $duplicate="SELECT File from onco_patient where File='{$File}'";
        $result_dup=mysqli_query($connection,$duplicate);
        $dup=mysqli_fetch_assoc($result_dup);
            
        
        
            
$query= "UPDATE os_patient SET Hospital ='{$Hospital}',Reg='$Reg',Consult='{$Consult}',Full='{$Full}',Age='$Age',Birth='$Birth',Sex='{$Sex}',NIC='{$NIC}',Address='{$Address}',Tel='{$Tel}',Occupation='{$Occupation}',Marital='{$Marital}',Member='{$Member}',Rela='{$Rela}',Site='{$Site}',Ref='{$Ref}',Topo='{$Topo}',Histo='{$Histo}',Icdo='{$Icdo}',Diag='{$Diag}',Tnm='{$Tnm}',Site2='{$Site2}',S1='{$S1}',S2='{$S2}',S3='{$S3}',Mul='{$Mul}',Rec='{$Rec}',Rdate='$Rdate',Treat='{$Treat}',Dlast='$Dlast',Remark='{$Remark}',Refto='{$Refto}',Slast='{$Slast}',Nlast='{$Nlast}' WHERE File='{$File}'";
            
            $result=mysqli_query($connection,$query);
            
            if($result){
                 
               header('Location: OP_list.php');
                
            }else{
                
               echo "<script language='javascript'>
               
               alert('Data adding failed!');
               
               </script>";
          
        }
            
    }else{
        
        echo "<script language='javascript'>
               
               alert('Some errors are found!');
               
               </script>";
    }
}

?><html>

    <head>
    <title>Add Patients</title>
        
        <style>
        
            body{
                min-width: 100% !important;
                width: 100% !important;
                min-height: 100% !important;
                height: 100% !important;
                margin: 0 !important;
                padding: 0 !important;
                background: #082032;
                background-position: center;
                background-origin: content-box;
                background-repeat: repeat;
                background-size: cover;
                min-height:100vh;
                font-family: 'Noto Sans', sans-serif;
            }
.text-center{
	color:#fff;	
	text-transform:uppercase;
    font-size: 23px;
    margin: -50px 0 80px 0;
    display: block;
    text-align: center;
}

.input-container{
	position:relative;
	margin-bottom:25px;
    width: 60%;
}
.input-container label{
	position:absolute;
    color: transparent;
	top:0px;
	left:0px;
	font-size:16px;
    pointer-event:none;
	transition: all 0.5s ease-in-out;
}
.input-container input{ 
  border:0;
  border-bottom:1px solid #555;  
  background:transparent;
  width:70%;
  padding:20px 0 17px 0;
  font-size:16px;
  color:yellow;
}
.input-container input:focus{ 
 border:none;	
 outline:none;
 border-bottom:1px solid #03e9f4;	
}
.btn{
	color:#fff;
	background-color:#e74c3c;
	outline: none;
    border: 0;
    color: #fff;
	padding:12px 22px;
	text-transform:uppercase;
	margin-top:50px;
	border-radius:2px;
	cursor:pointer;
	position:relative;
}

.input-container input:focus ~ label{
	top:-12px;
	font-size:12px;
    color: #03e9f4;
	
}

            ::placeholder{
                color: white;   
            }
            
            .input-container{
                
                display: inline;
                margin-left: 15%;
                
            }
            
            .container{
                
                box-sizing: border-box;
                border: 1px solid white;
                width: 80%;
                margin-left: 10%;
            }
            .container2{
                
                box-sizing: border-box;
                border: 1px solid white;
                width: 80%;
                margin-left: 10%;
                margin-top: 10px;
                padding-bottom: 20px;
            }
            
            .check-breast,label{
            
                color: white;
    
    }
            
           
            
#submit {
        padding: 10px 10px;
        display: inline-block;
        color: black;
        letter-spacing: 2px;
        text-transform: uppercase;
        text-decoration: none;
        font-size: 16px;
        overflow: hidden;
    margin-top: -40px;
        margin-left: 428px;
        width: 105px;
        background-color: white;
        font-weight: bold;
        font-family: "Times New Roman", Times, serif;
    
        
    }
 
    /*creating animation effect*/
    #submit:hover {
        color: #111;
        background: #b3d9ff;
        box-shadow: 0 0 50px #b3d9ff;
    }            
      body {margin:0;font-family:Arial;}

.topnav {
  overflow: hidden;
  background-color: #1597BB;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 22px 18px;
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
  background-color: #719FB0;
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
    
        </style>
        
<script type="text/javascript">  
function Validate()  
{  
    var checkboxes = document.getElementsByClassName("check-breast");  
    var numberOfChecked = 0;  
    for(var i = 0; i < checkboxes.length; i++)  
    {  
        if(checkboxes[i].checked)  
            numberOfChecked++;  
    }  
    if(numberOfChecked> 1)  
    {  
        alert("You can add to one at one time!");  
        return false;  
    }  
}  
</script>
        
    </head>

    
    <body>
    
   <div class="topnav" id="myTopnav">
  <a href="main.php" class="active">Home</a>
  <a href="OP_list.php">Show Patient</a>
  <a href="#contact">Modify Patients</a>
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
     
        
        <div>
        
            <h1 style="color: white; text-align:center; padding:10px; text-transform:uppercase;">N&nbsp;a&nbsp;t&nbsp;i&nbsp;o&nbsp;n&nbsp;a&nbsp;l &nbsp;&nbsp; C&nbsp;a&nbsp;n&nbsp;c&nbsp;e&nbsp;r &nbsp;&nbsp; S&nbsp;e&nbsp;r&nbsp;v&nbsp;e&nbsp;i&nbsp;l&nbsp;l&nbsp;a&nbsp;n&nbsp;c&nbsp;e &nbsp;&nbsp; F&nbsp;o&nbsp;r&nbsp;m</h1>
            <hr/>
        
        </div>
    
        <div>
            
            <h1 style="padding:10px; background:#719FB0; text-align:center; color:white;">Staff Filling Page</h1>
            
        </div>
        
    <div class="container">
    
       <form method="post">
        
	<div class="input-container">
     <input type="text" name="Hospital" placeholder="Hospital/Institute" autocomplete="off" required value="<?php echo $Hospital ?>">
     <label>Hospital/Institute</label>
    </div>
        
      
   <div class="input-container">
     <input type="text" name="File" placeholder="Clinic File No" autocomplete="off" required value="<?php echo $File ?>">
     <label>Clinic File No</label>
    </div> 
        
      
    <div class="input-container">
     <input type="datetime-local" name="Reg" placeholder="Date of Registration" autocomplete="off" value="<?php echo $Reg ?>">
     <label>Date of Registration</label>
    </div>     
       
    
    <div class="input-container">
     <input type="text" name="Consult" placeholder="Consultant" autocomplete="off" value="<?php echo $Consult ?>">
     <label>Consultant</label>
    </div> 
        
     
    <div class="input-container">
     <input type="text" name="Full" placeholder="Full Name" autocomplete="off" required value="<?php echo $Full ?>">
     <label>Full Name</label>
    </div> 
        
     
    <div class="input-container">
     <input type="text" name="Age" placeholder="Age" autocomplete="off" value="<?php echo $Age ?>">
     <label>Age</label>
    </div> 
        
    
    <div class="input-container">
     <input type="datetime-local" name="Birth" placeholder="Date of Birth" autocomplete="off" value="<?php echo $Birth ?>">
     <label>Date of Birth</label>
    </div>
      
     
    <div class="input-container">
     <input type="text" name="Sex" placeholder="Sex" autocomplete="off" value="<?php echo $Sex ?>">
     <label>Sex</label>
    </div>    
        
 
    <div class="input-container">
     <input type="text" name="NIC" placeholder="National ID No" autocomplete="off" required value="<?php echo $NIC ?>">
     <label>National ID No</label>
    </div>        
 
       

    <div class="input-container">
     <input type="text" name="Address" placeholder="Address" autocomplete="off" value="<?php echo $Address ?>">
     <label>Address</label>
    </div>
        
       
    <div class="input-container">
     <input type="text" name="Tel" maxlength="10" placeholder="Telephone N" autocomplete="off" value="<?php echo $Tel ?>">
     <label>Telephone No</label>
    </div> 
        
      
    <div class="input-container">
     <input type="text" name="Occupation" placeholder="Occupation" autocomplete="off" value="<?php echo $Occupation ?>">
     <label>Occupation</label>
    </div>     
       
    
    <div class="input-container">
     <input type="text" name="Marital" placeholder="Marital Status" autocomplete="off" value="<?php echo $Marital ?>">
     <label>Marital Status</label>
    </div> 
        
      
    <div class="input-container">
     <input type="text" name="Member" placeholder="Any Family Member Has a Cancer? Yes/No" autocomplete="off" value="<?php echo $Member ?>">
     <label>Any Family Member Has a Cancer? Yes/No</label>
    </div> 
        
    
    <div class="input-container">
     <input type="text" name="Rela" placeholder="If 'Yes', Relationship" autocomplete="off" value="<?php echo $Rela ?>">
     <label>If 'Yes', Relationship</label>
    </div> 
        
      
    <div class="input-container">
     <input type="text" name="Site" placeholder="Site of Cancer" autocomplete="off" value="<?php echo $Site ?>">
     <label>Site of Cancer</label>
    </div>
      
      
    <div class="input-container">
     <input type="text" name="Ref" placeholder="Hospital Reffered" autocomplete="off" value="<?php echo $Ref ?>">
     <label>Hospital Reffered</label>
    </div> 
        
    
        
    <div class="input-container">
     <input type="text" name="Topo" placeholder="Topography" autocomplete="off">
     <label>Topography</label>
    </div>
        
    </div>
    
        <div>
            
            <h1 style="padding:10px; background:#719FB0; text-align:center; color:white;">Doctors' Filling Page</h1>
            
        </div>    
    
    <div class="container2">
        
    <div class="input-container">
     <input type="text" name="Histo" maxlength="10" placeholder="Histology" autocomplete="off">
     <label>Histology</label>
    </div> 
        
    
    <div class="input-container">
     <input type="text" name="Icdo" placeholder="ICDO Code" autocomplete="off">
     <label>ICDO Code</label>
    </div>     
       
     
    <div class="input-container">
     <input type="datetime-local" name="Diag" placeholder="Date of Diagnosis" autocomplete="off">
     <label>Date of Diagnosis</label>
    </div> 
        
      
    <div class="input-container">
     <input type="text" name="Tnm" placeholder="TNM Status" autocomplete="off">
     <label>TNM Status</label>
    </div> 
            
      
    <div class="input-container">
     <input type="text" name="Site2" placeholder="Site of Cancer" autocomplete="off">
     <label>Site of Cancer</label>
    </div>
      
      
    <div class="input-container">
     <input type="text" name="S1" placeholder="Stage I" autocomplete="off">
    <label>Stage I</label>
    </div>    
        
     
    <div class="input-container">
     <input type="text" name="S2" placeholder="Stage II" autocomplete="off">
     <label>Stage II</label>
    </div>
        
      
    <div class="input-container">
     <input type="text" name="S3" placeholder="Stage III" autocomplete="off"> 
     <label>Stage III</label>
    </div>  
        
    
        
    <div class="input-container">
     <input type="text" name="Mul" placeholder="Multiple Primary Site" autocomplete="off">
     <label>Multiple Primary Site</label>
    </div>
        
    
    <div class="input-container">
     <input type="text" name="Rec" maxlength="10" placeholder="Recurrence Site" autocomplete="off">
     <label>Recurrence Site</label>
    </div> 
       
     
    <div class="input-container">
     <input type="datetime-local" name="Rdate" placeholder="Date of Recurrence" autocomplete="off">
     <label>Date of Recurrence</label>
    </div>     
        
    
    <div class="input-container">
     <input type="text" name="Treat" placeholder="Treatment" autocomplete="off">
     <label>Treatment</label>
    </div>     
           
      
    <div class="input-container">
     <input type="datetime-local" name="Dlast" placeholder="Date of Last Contact" autocomplete="off">
     <label>Date of Last Contact</label>
    </div> 
            
     
    <div class="input-container">
     <input type="text" name="Remark" placeholder="Remark" autocomplete="off">
     <label>Remark</label>
    </div>
      
     
   <div class="input-container">
     <input type="text" name="Refto" placeholder="Reffered to" autocomplete="off">
    <label>Reffered to</label>
    </div>    
        
      
    <div class="input-container">
     <input type="text" name="Slast" placeholder="Status at Last Contact" autocomplete="off">
     <label>Status at Last Contact</label>
    </div>
        
     
    <div class="input-container">
     <input type="text" name="Nlast" placeholder="Name of Last Contact" autocomplete="off">
     <label>Name of Last Contact</label>
    </div>  
      
      <br><br><br><br>  
        
    <div>
     <input class="check-breast" type="checkbox" name="check-breast" autocomplete="off" onclick="return Validate();">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <label>Add to Breast Clinic</label>
    </div>
           <br>
    <div>
     <input class="check-breast" type="checkbox" name="check-os" autocomplete="off" onclick="return Validate();">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <label>Add to Onco Surgeory Clinic</label>
    </div>   
            
    
    
     <input type="submit" name="Submit" value="Submit" id="submit" autocomplete="off" onclick="ques()">
    
        </div>
        </form>
    </div>
    
        
<footer>

    <h1 style="padding:30px; background:#03506F; text-align:center; color:white;">This page can access for admins of Onco Clinic only</h1>
    
</footer>        
    </body>
    
</html>