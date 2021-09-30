<?php
require_once("connection.php");
?>

<?php

session_start();

?>

<?php



if(isset($_GET['File'])){
    
    $p_file=mysqli_real_escape_string($connection,$_GET['File']);
    
    $query="SELECT * FROM breast_patient WHERE File={$p_file} LIMIT 1";
    
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
        
            
$query= "DELETE FROM onco_patient WHERE File={$p_file} LIMIT 1";
            
            $result=mysqli_query($connection,$query);
            
            if($result){
          
               header('Location: B_list.php');
                
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
        
            
$query= "DELETE FROM breast_patient WHERE File={$p_file} LIMIT 1";
            
            $result=mysqli_query($connection,$query);
            
            if($result){
                 
               header('Location: B_list.php');
                
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


<html>
<head>
	<meta charset="utf-8">
	<title>Delete Patient - Breast</title>
</head>
    
<style>
html {
  height: 100%;
}
body {
  margin:0;
  padding:0;
  font-family: sans-serif;
  background: linear-gradient(#141e30, #243b55);
  overflow-y: hidden;
    
}
    
/*Headline css*/
    
    #headline{
        
        position: absolute;
        font-size: 40px;
        margin-left: 650px;
        margin-top: 15px;
        color: linear-gradient(#141e30, #243b55);
        
    }
    
    #logo{
        
        position: absolute;
        margin-left: -20px;
        margin-top: -3px;
        height: 85px;
        width: 170px;
    } 
    
    #logo2{
        
        position: absolute;
        margin-left: 760px;
        margin-top: -40px;
        height: 155px;
        width: 170px;
    } 
/* verticle line */
    
.vertical-line{width: 50%; margin: auto; margin-top: -137%; margin-bottom: 50%; transform: rotate(90deg); border-color: white; 
    z-index: -1;} 
    
.vertical-heading{width: 50%; margin: auto; margin-top: -40%; margin-left: 430px; margin-bottom: 50%; transform: rotate(90deg); color: white; 
    z-index: -1;} 
    
/*navigation bar*/
        
ul {
  list-style-type: none;
  margin: 0;
  overflow: hidden;
  background-color: #b3d9ff;
}

li {
  float: left;
  padding: 15px;    
}
li:hover{
    
background-color: #000d1a;
        }
        
li a {
  display: block;
  color: black;
    font-size: 20px;
  font-weight: bold;
  text-align: center;
  margin: 0;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #000d1a;
  color: white;
    
}
        *{
            margin: 0;
        }
        

/* input fields property*/
.user-box {
  position: absolute;
}

    
.user-box input {
  width: 110%;
  padding: 10px 0;
  font-size: 16px;
  color: yellow;
  margin-bottom: 30px;
  margin-top: 20px;
  margin-left: 30px;
  border: none;
  border-bottom: 1px solid #fff;
  outline: none;
  background: transparent;
     
}
.user-box label {
  position: absolute;
  top:0;
  left: 0;
  margin-top: 20px;
  margin-left: 30px;
  padding: 10px 0;
  font-size: 16px;
  color: transparent;
  pointer-events: none;
  transition: .5s;

}

.user-box input:focus ~ label{
  top: -20px;
  left: 0;
  color: #03e9f4;
  font-size: 12px;
   
}	

/*.....................USER BOX 2......................................................................*/
    
.user-box2 {
  position: absolute;
}

.user-box2 input {
  width: 60%;
  padding: 10px 0;
  font-size: 16px;
  color: yellow;
  margin-bottom: 30px;
  margin-top: -568px;
  margin-left: 370px;
  border: none;
  border-bottom: 1px solid #fff;
  outline: none;
  background: transparent;
}
.user-box2 label {
  position: absolute;
  top:0;
  left: 0;
  margin-top: -568px;
  margin-left: 370px;
  padding: 10px 0;
  font-size: 16px;
  color: transparent;
  pointer-events: none;
  transition: .5s;
}

.user-box2 input:focus ~ label{
  top: -20px;
  left: 0;
  color: #03e9f4;
  font-size: 12px;
}	   

    /*..........SUBMIT.................*/
    
    #submit {
        padding: 10px 10px;
        display: inline-block;
        color: black;
        letter-spacing: 2px;
        text-transform: uppercase;
        text-decoration: none;
        font-size: 16px;
        overflow: hidden;
        margin-top: -570px;
        margin-left: 605px;
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
    
/*check box css*/
    
    .check-breast,label{
    
        position: absolute;
        margin-top: -1810px;
        margin-left: 370px;
        color: white;
    
    }
    
/*.....................USER BOX 3......................................................................*/
    
.user-box3 {
  position: absolute;
}

.user-box3 input {
  width: 25%;
  padding: 10px 0;
  font-size: 16px;
  color: yellow;
  margin-bottom: 30px;
  margin-top: -1160px;
  margin-left: 870px;
  border: none;
  border-bottom: 1px solid #fff;
  outline: none;
  background: transparent;
}
.user-box3 label {
  position: absolute;
  top:0;
  left: 0;
  margin-top: -1160px;
  margin-left: 870px;
  padding: 10px 0;
  font-size: 16px;
  color: transparent;
  pointer-events: none;
  transition: .5s;
}

.user-box3 input:focus ~ label{
  top: -20px;
  left: 0;
  color: #03e9f4;
  font-size: 12px;
}	        

    
/*.....................USER BOX 4......................................................................*/
    
.user-box4 {
  position: absolute;
}

.user-box4 input {
  width: 22%;
  padding: 10px 0;
  font-size: 16px;
  color: yellow;
  margin-bottom: 30px;
  margin-top: -1749px;
  margin-left: 1170px;
  border: none;
  border-bottom: 1px solid #fff;
  outline: none;
  background: transparent;
}
.user-box4 label {
  position: absolute;
  top:0;
  left: 0;
  margin-top: -1749px;
  margin-left: 1170px;
  padding: 10px 0;
  font-size: 16px;
  color: transparent;
  pointer-events: none;
  transition: .5s;
}

.user-box4 input:focus ~ label{
  top: -20px;
  left: 0;
  color: #03e9f4;
  font-size: 12px;
}	        
  
    
    ::placeholder{
        
        color: white;
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
 
    
<body>

    <article>
    
         <header>
    
<ul>
  <li><a class="active" href="breast_clinic.php">Home</a></li>
  <li><a href="B_list.php">Show Patients</a></li>
  <li><a href="B_update.php">Modify Patients</a></li>
  <h2 id="headline">National Cancer Serveillance Form</h2>  
  <img src="logo1.png" id="logo">   
  <img src="logo2.png" id="logo2">    
  
</ul>
    
    </header>
    
        
       <form method="post">
	
	

	<div class="user-box">
     <input type="text" name="Hospital" placeholder="Hospital/Institute" autocomplete="off" required value="<?php echo $Hospital ?>">
     <label>Hospital/Institute</label>
    </div>
        
      <br><br><br><br>  
    <div class="user-box">
     <input type="text" name="File" placeholder="Clinic File No" autocomplete="off" required value="<?php echo $File ?>">
     <label>Clinic File No</label>
    </div> 
        
    <br><br><br><br>  
    <div class="user-box">
     <input type="datetime-local" name="Reg" placeholder="Date of Registration" autocomplete="off" value="<?php echo $Reg ?>">
     <label>Date of Registration</label>
    </div>     
       
    <br><br><br><br>  
    <div class="user-box">
     <input type="text" name="Consult" placeholder="Consultant" autocomplete="off" value="<?php echo $Consult ?>">
     <label>Consultant</label>
    </div> 
        
    <br><br><br><br>  
    <div class="user-box">
     <input type="text" name="Full" placeholder="Full Name" autocomplete="off" required value="<?php echo $Full ?>">
     <label>Full Name</label>
    </div> 
        
    <br><br><br><br>  
    <div class="user-box">
     <input type="text" name="Age" placeholder="Age" autocomplete="off" value="<?php echo $Age ?>">
     <label>Age</label>
    </div> 
        
    <br><br><br><br>  
    <div class="user-box">
     <input type="datetime-local" name="Birth" placeholder="Date of Birth" autocomplete="off" value="<?php echo $Birth ?>">
     <label>Date of Birth</label>
    </div>
      
    <br><br><br><br>  
    <div class="user-box">
     <input type="text" name="Sex" placeholder="Sex" autocomplete="off" value="<?php echo $Sex ?>">
     <label>Sex</label>
    </div>    
        
    <br><br><br><br>  
    <div class="user-box">
     <input type="text" name="NIC" placeholder="National ID No" autocomplete="off" required value="<?php echo $NIC ?>">
     <label>National ID No</label>
    </div>        
 
       

  
<!--.....................................................................................................-->
        

	

	<div class="user-box2">
     <input type="text" name="Address" placeholder="Address" autocomplete="off" value="<?php echo $Address ?>">
     <label>Address</label>
    </div>
        
      <br><br><br><br>  
    <div class="user-box2">
     <input type="text" name="Tel" maxlength="10" placeholder="Telephone N" autocomplete="off" value="<?php echo $Tel ?>">
     <label>Telephone No</label>
    </div> 
        
    <br><br><br><br>  
    <div class="user-box2">
     <input type="text" name="Occupation" placeholder="Occupation" autocomplete="off" value="<?php echo $Occupation ?>">
     <label>Occupation</label>
    </div>     
       
    <br><br><br><br>  
    <div class="user-box2">
     <input type="text" name="Marital" placeholder="Marital Status" autocomplete="off" value="<?php echo $Marital ?>">
     <label>Marital Status</label>
    </div> 
        
    <br><br><br><br>  
    <div class="user-box2">
     <input type="text" name="Member" placeholder="Any Family Member Has a Cancer? Yes/No" autocomplete="off" value="<?php echo $Member ?>">
     <label>Any Family Member Has a Cancer? Yes/No</label>
    </div> 
        
    <br><br><br><br>  
    <div class="user-box2">
     <input type="text" name="Rela" placeholder="If 'Yes', Relationship" autocomplete="off" value="<?php echo $Rela ?>">
     <label>If 'Yes', Relationship</label>
    </div> 
        
    <br><br><br><br>  
    <div class="user-box2">
     <input type="text" name="Site" placeholder="Site of Cancer" autocomplete="off" value="<?php echo $Site ?>">
     <label>Site of Cancer</label>
    </div>
      
    <br><br><br><br>  
    <div class="user-box2">
     <input type="text" name="Ref" placeholder="Hospital Reffered" autocomplete="off" value="<?php echo $Ref ?>">
     <label>Hospital Reffered</label>
    </div> 
        
      <br><br><br><br>  
    <div class="user-box">
     <input type="submit" name="Submit" value="Delete" id="submit" autocomplete="off" onclick="ques()">
    </div> 
        


  
<!--.....................................................................................................-->
        

	
	
	<div class="user-box3">
     <input type="text" name="Topo" placeholder="Topography" autocomplete="off">
     <label>Topography</label>
    </div>
        
      <br><br><br><br>  
    <div class="user-box3">
     <input type="text" name="Histo" maxlength="10" placeholder="Histology" autocomplete="off">
     <label>Histology</label>
    </div> 
        
    <br><br><br><br>  
    <div class="user-box3">
     <input type="text" name="Icdo" placeholder="ICDO Code" autocomplete="off">
     <label>ICDO Code</label>
    </div>     
       
    <br><br><br><br>  
    <div class="user-box3">
     <input type="datetime-local" name="Diag" placeholder="Date of Diagnosis" autocomplete="off">
     <label>Date of Diagnosis</label>
    </div> 
        
    <br><br><br><br>  
    <div class="user-box3">
     <input type="text" name="Tnm" placeholder="TNM Status" autocomplete="off">
     <label>TNM Status</label>
    </div> 
            
    <br><br><br><br>  
    <div class="user-box3">
     <input type="text" name="Site2" placeholder="Site of Cancer" autocomplete="off">
     <label>Site of Cancer</label>
    </div>
      
    <br><br><br><br>  
    <div class="user-box3">
     <input type="text" name="S1" placeholder="Stage I" autocomplete="off">
    <label>Stage I</label>
    </div>    
        
     <br><br><br><br>  
    <div class="user-box3">
     <input type="text" name="S2" placeholder="Stage II" autocomplete="off">
     <label>Stage II</label>
    </div>
        
      <br><br><br><br>  
    <div class="user-box3">
     <input type="text" name="S3" placeholder="Stage III" autocomplete="off"> 
     <label>Stage III</label>
    </div>  
        
        
        
	          
    
           
<!--.....................................................................................................-->
        

	
	
	 
	<div class="user-box4">
     <input type="text" name="Mul" placeholder="Multiple Primary Site" autocomplete="off">
     <label>Multiple Primary Site</label>
    </div>
        
      <br><br><br><br>  
    <div class="user-box4">
     <input type="text" name="Rec" maxlength="10" placeholder="Recurrence Site" autocomplete="off">
     <label>Recurrence Site</label>
    </div> 
       
    <br><br><br><br>  
    <div class="user-box4">
     <input type="datetime-local" name="Rdate" placeholder="Date of Recurrence" autocomplete="off">
     <label>Date of Recurrence</label>
    </div>     
        
    <br><br><br><br>  
    <div class="user-box4">
     <input type="text" name="Treat" placeholder="Treatment" autocomplete="off">
     <label>Treatment</label>
    </div>     
           
    <br><br><br><br>  
    <div class="user-box4">
     <input type="datetime-local" name="Dlast" placeholder="Date of Last Contact" autocomplete="off">
     <label>Date of Last Contact</label>
    </div> 
            
    <br><br><br><br>  
    <div class="user-box4">
     <input type="text" name="Remark" placeholder="Remark" autocomplete="off">
     <label>Remark</label>
    </div>
      
    <br><br><br><br>  
    <div class="user-box4">
     <input type="text" name="Refto" placeholder="Reffered to" autocomplete="off">
    <label>Reffered to</label>
    </div>    
        
     <br><br><br><br>  
    <div class="user-box4">
     <input type="text" name="Slast" placeholder="Status at Last Contact" autocomplete="off">
     <label>Status at Last Contact</label>
    </div>
        
      <br><br><br><br>  
    <div class="user-box4">
     <input type="text" name="Nlast" placeholder="Name of Last Contact" autocomplete="off">
     <label>Name of Last Contact</label>
    </div>  
        
        
       <br><br><br><br>  
    <div>
     <input class="check-breast" type="checkbox" name="check-breast" autocomplete="off" onclick="return Validate();" <?php echo ($result == 1) ? "checked" : ""; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <label>Delete from Onco Clinic</label>
    </div>
               
</form>        

<main>

   <hr class="vertical-line">	
   <h2 class="vertical-heading">( Doctors Filling Page )</h2>    
 
</main>         

</article>
  

</body>
    
</html>    