<?php
require_once("connection.php");
?>

<?php

session_start();

?>
<?php



if(isset($_GET['username'])){
    
    $p_file=mysqli_real_escape_string($connection,$_GET['username']);
    
    $query="SELECT * FROM user WHERE username='{$p_file}' LIMIT 1";
    
    $result_set=mysqli_query($connection,$query);
    
    if($result_set){
        
        if(mysqli_num_rows($result_set)==1){
            
        $result=mysqli_fetch_assoc($result_set);
        $uname=$result['username'];
        $pass=$result['password'];
        $clini=$result['clinic'];
        
            
        }else{
            
            echo "<script language='javascript'>
               
               alert('Can't found!');
               
               </script>";
        }
        
    }else{
        
        header('Location: Admin_list.php?query_falied');
    }
}

/*..............................................................................*/

?>
<?php

if(isset($_POST['submit'])){
    
    
    $errors=array();
    $errors2=array();
    $errors3=array();
    
    if(!isset($_POST['username']) || strlen(trim($_POST['username']))<1){
        
        $errors[]='Username is Missing/Invalid';
        
    }
    
    if(!isset($_POST['password']) || strlen(trim($_POST['password']))<1){
        
        $errors[]='password is Missing/Invalid';
        
    }
    
    if(!isset($_POST['re-password']) || strlen(trim($_POST['re-password']))<1){
        
        $errors[]='re-password is Missing/Invalid';
        
    }
    
    if(!isset($_POST['clinic']) || strlen(trim($_POST['clinic']))<1){
        
        $errors[]='clinic is Missing/Invalid';
        
    }
    
    if(empty($errors)){
        $user=mysqli_real_escape_string($connection,$_POST['username']);
        $password=mysqli_real_escape_string($connection,$_POST['password']);
        $re_password=mysqli_real_escape_string($connection,$_POST['re-password']);
        $clinic=mysqli_real_escape_string($connection,$_POST['clinic']);
        
        if($password===$re_password){
              
           
            $query= "DELETE FROM user WHERE username='{$user}'";
            
            $result=mysqli_query($connection,$query);
            
            if($result){
                
                header('Location: admin_list_OS.php?user_added=true');
            }else{
                
                $errors2[]='Failed to add a new recoed!';
            
            }
         
            
        }else{
            
            $errors3[]='Passwords are not match!';
        }
        
        
    }else{
        
        die('failed!');
    }
}

?>

<html>
<head>
	<meta charset="utf-8">
	<title>Delete Admin-OS</title>
    
<style type="text/css">

    body{
	margin:0;
	color:white;
	background-image: url("hospital.jpg");
	font:600 16px/18px 'Open Sans',sans-serif;  
        overflow-y: hidden;
}
*,:after,:before{box-sizing:border-box}
.clearfix:after,.clearfix:before{content:'';display:table}
.clearfix:after{clear:both;display:block}
a{color:inherit;text-decoration:none}
   
.login-wrap{
	width:100%;
	margin:auto;
    margin-top: 10px;
	max-width:525px;
	min-height:670px;
	position:relative;
	background:url(https://raw.githubusercontent.com/khadkamhn/day-01-login-form/master/img/bg.jpg) no-repeat center;
	box-shadow:0 12px 15px 0 rgba(0,0,0,.24),0 17px 50px 0 rgba(0,0,0,.19);
}
.login-html{
	width:100%;
	height:100%;
	position:absolute;
	padding:90px 70px 50px 70px;
	background:rgba(40,57,101,.9);
    
}
.login-html .sign-up-htm{
	top:-10px;
	left:0;
	right:0;
	bottom:0;
	position:absolute;
	backface-visibility:hidden;
	transition:all .4s linear;
}
.login-html .sign-up,
.login-form .group .check{
	display:none;
    margin-top:-30px;
   
}
.login-html .tab,
.login-form .group .label,
.login-form .group .button{
	text-transform:uppercase;
     
}
.login-html .tab{
	font-size:22px;
	margin-right:15px;
	padding-bottom:5px;
	margin:0 15px 10px 0;
	display:inline-block;
	border-bottom:2px solid transparent;
}
.login-html .sign-up:checked + .tab{
	color:#fff;
	border-color:#1161ee;
    
}
.login-form{
    position: absolute;
	min-height:320px;
	position:relative;
	perspective:1000px;
	transform-style:preserve-3d;
}
.login-form .group{
	margin-bottom:15px;
}
.login-form .group .label,
.login-form .group .input,
.login-form .group .button{
	width:100%;
	color:#fff;
	display:block;
    margin-bottom:20px;
}
.login-form .group .input,
.login-form .group .button{
	border:none;
	padding:15px 20px;
	border-radius:25px;
	background:rgba(255,255,255,.1);
    
    
}
.login-form .group input[data-type="password"]{
	text-security:circle;
	-webkit-text-security:circle;
}
.login-form .group .label{
	color:#aaa;
	font-size:12px;
}
.login-form .group .button{
	background:#1161ee;
    margin-top: 20px;
}
.login-form .group label .icon{
	width:15px;
	height:15px;
	border-radius:2px;
	position:relative;
	display:inline-block;
	background:rgba(255,255,255,.1);
}
.login-form .group label .icon:before,
.login-form .group label .icon:after{
	content:'';
	width:10px;
	height:2px;
	background:#fff;
	position:absolute;
	transition:all .2s ease-in-out 0s;
}

.foot-lnk{
   
	text-align:center;
    margin-top: -40px;
}
#p1{
        
    font-size: 20px;
    color: white;
    background: red;
    padding: 20px;
}  
#logout_user{
    font-size: 20px;
    color: white;
    background: green;
    padding: 20px; 
        
}
    
/*navigation bar*/
        
ul {
  list-style-type: none;
  margin: 0;
  overflow: hidden;
  background-color: #3399ff;
}

li {
  float: left;
  padding: 10px;    
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
  
/*error msg display */
    
#p1{
    
    position: absolute;
    font-size: 15px;
    color: white;
    padding: 10px;
    width: 390px;
    margin-top: -510px;
    background-color: red;
    font-weight: bold;
    text-align: center;
}      
  
 .container{
         
        padding: 0px;  
        background-color:#3399ff;
         width: 350px;
         margin-top: 10px;
         margin-left: 30px;
     } 
     .form-control{
         
         width: 200px;
         height: 30px;
         background-color: #b3d9ff;
         color: black;
         border-color: transparent;
     }
     .btn-primary{
         
         position: absolute;
         margin-left: 210px;
         margin-top: -30px;
         width: 100px;
         height: 30px;
         border-color: transparent;
         font-weight: bold;
         font-size: 20px;
         background-color: transparent;
         color: linear-gradient(#141e30, #243b55);;
     }
    .btn-primary:hover{
        background-color: white;
    }
    #srch:hover{
        
         background-color: #3399ff;
    }  
    ::placeholder{
        
        color: black;
        font-weight: bold;
    }
</style>    
</head>
    
<body>

    
    <header>
    
<ul>
  <li><a class="active" href="onco_surgeory_clinic.php">Home</a></li>
  <li><a href="admin_list_OS.php">Show Admins</a></li>  
    
</ul>
    
    </header>
    
   
    
   <div class="login-wrap">
	<div class="login-html">
        
		
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Update Admin</label>
          <hr><br>    
		<div class="login-form">
          
			<div class="sign-up-htm">
				<div class="group">
                    <form method="post">
					<label for="user" class="label">Username</label>
					<input id="user" type="text" class="input" name="username" required value="<?php echo $uname; ?>" readonly>
				
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" class="input" name="password" data-type="password" required value="<?php echo $pass; ?>">
				
					<label for="pass" class="label">Repeat Password</label>
					<input id="pass" type="password" class="input" name="re-password" data-type="password" required value="<?php echo $pass; ?>">
                        
                    <label for="pass" class="label">Clinic</label>
					<input id="user" type="text" class="input" name="clinic" nrequired value="<?php echo $clini; ?>" readonly>    
				
				
				
                   <!--Error msg display -->
                        
                        
                    <?php if(isset($errors2) && !empty($errors2)){
    
                    echo '<p id="p1">Failed to add record</p>';
    	                   }
                        ?>
                        
                    <?php if(isset($errors3) && !empty($errors3)){
    
                    echo '<p id="p1">Passwords are not match!</p>';
    	                   }
                        ?>    
                    <!--.......................................-->
                        
					<input type="submit" class="button" value="Delete Admin" name="submit">
                        </form>
				</div>
				
			</div>
		</div>
	</div>
</div>
</body>
</html>

<?php

mysqli_close($connection);

?>