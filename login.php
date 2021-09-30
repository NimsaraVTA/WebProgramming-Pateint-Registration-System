<?php
require_once("connection.php");
?>

<?php

session_start();

if(isset($_POST['submit'])){
    
    $errors=array();
    
    if(!isset($_POST['uname']) || strlen(trim($_POST['uname']))<1){
        
        $errors[]='Username is Missing/Invalid';
        
    }
    
    if(!isset($_POST['upass']) || strlen(trim($_POST['upass']))<1){
        
        $errors[]='password is Missing/Invalid';
        
    }
    
    if(empty($errors)){
        
        $user1=mysqli_real_escape_string($connection,$_POST['uname']);
        $password=mysqli_real_escape_string($connection,$_POST['upass']);
        
        $hashpass=sha1($password);
        
        $query="SELECT * FROM user WHERE username='{$user1}' AND password='{$password}' LIMIT 1";
        
        $result_set=mysqli_query($connection,$query);
        
        if($result_set){
            
            if(mysqli_num_rows($result_set)==1){
                
                $user2=mysqli_fetch_assoc($result_set);
                $_SESSION['first_name']=$user2['username'];
                $_SESSION['user_clinic']=$user2['clinic'];
                
                $o='Onco';
                $b='Breast';
                $os='Onco Surgeory';
                
                if($b===$_SESSION['user_clinic']){
                    
                    header('Location: breast_clinic.php');
                    
                }else if($o===$_SESSION['user_clinic']){
                    
                    header('Location: main.php');
                    
                }else if($os===$_SESSION['user_clinic']){
                    
                    header('Location: onco_surgeory_clinic.php');
                }else{
                    
                     die("Database query failed!");
                }
//......................................................................................................                
                
                //updating last login
                
                $query2="UPDATE user SET last_login=NOW()";
                $query2.="WHERE username='{$user1}' LIMIT 1";
                
                $result_set2=mysqli_query($connection,$query2);
                
                if(!$result_set2){
                    
                    die("Database query failed!");
                }
                
//......................................................................................................                
                
               
            }else{
                
                $errors[]="Invalid username or password";
            }
            
            
        }else{
            
            $errors[]="Databse query failed";
        }
        
        
        
        
    }
}


?>


<?php

if(isset($_POST['submit2'])){
    
    
    $errors1=array();
    $errors2=array();
    $errors3=array();
    $errors4=array();
    
    //succes displays
    
    $succes=array();
    
    if(!isset($_POST['username2']) || strlen(trim($_POST['username2']))<1){
        
        $errors1[]='Username is Missing/Invalid';
        
    }
    
    if(!isset($_POST['password2']) || strlen(trim($_POST['password2']))<1){
        
        $errors1[]='password is Missing/Invalid';
        
    }
    
    if(!isset($_POST['re-password']) || strlen(trim($_POST['re-password']))<1){
        
        $errors1[]='re-password is Missing/Invalid';
        
    }
    
    if(!isset($_POST['clinic2']) || strlen(trim($_POST['clinic2']))<1){
        
        $errors1[]='clinic is Missing/Invalid';
        
    }
    if(!isset($_POST['secuirty']) || strlen(trim($_POST['secuirty']))<1){
        
        $errors4[]='secuirty is Missing/Invalid';
        
    }
    if(empty($errors1)){
        $user=mysqli_real_escape_string($connection,$_POST['username2']);
        $sec=mysqli_real_escape_string($connection,$_POST['secuirty']);
        $password=mysqli_real_escape_string($connection,$_POST['password2']);
        $re_password=mysqli_real_escape_string($connection,$_POST['re-password']);
        $clinic=mysqli_real_escape_string($connection,$_POST['clinic2']);
        
        $code='#123#123#';
        
        if($sec===$code){
        
        if($password===$re_password){
              
            $pre_user="SELECT * from user WHERE username='{$user}'";
            $result_preuser=mysqli_query($connection,$pre_user);
            $user2=mysqli_fetch_assoc($result_preuser);
            
            $_SESSION['preuser_name']=$user2['username'];
            
            if($_SESSION['preuser_name']===$user){
                
                $errors1[]='This username is exist';
                
            }else{
            
            $query= "INSERT INTO user (username, password, clinic,is_deleted) VALUES ('{$user}', '{$password}', '{$clinic}','0')";
            
            $result=mysqli_query($connection,$query);
            
            if($result){
                
                $success[]="successfully registered!";
            }else{
                
                $errors2[]='Failed to add a new recoed!';
            
            }
           }
            
        }else{
            
            $errors3[]='Passwords are not match!';
        }
        
        }else{
            
            $errors4[]='Incorrect secuirty code!';
        }
    }else{
        
        die('failed!');
    }
}

?>

<html>
<head>
	<meta charset="utf-8">
	<title>User Login</title>
    
<style type="text/css">

    body{
	margin:0;
	color:#6a6f8c;
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
    margin-top: 40px;
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
.login-html .sign-in-htm,
.login-html .sign-up-htm{
	top:0;
	left:0;
	right:0;
	bottom:0;
	position:absolute;
	transform:rotateY(180deg);
	backface-visibility:hidden;
	transition:all .4s linear;
    margin-top:2px;
}
.login-html .sign-in,
.login-html .sign-up,
.login-form .group .check{
	display:none;
    
}
.login-html .tab,
.login-form .group .label,
.login-form .group .button{
	text-transform:uppercase;
    margin-top:-20px;
}
.login-html .tab{
	font-size:22px;
	margin-right:15px;
	padding-bottom:5px;
	margin:0 15px 10px 0;
	display:inline-block;
	border-bottom:2px solid transparent;
    
}
.login-html .sign-in:checked + .tab,
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
    margin-top:-10px;
   
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
.login-form .group label .icon:before{
	left:3px;
	width:5px;
	bottom:6px;
	transform:scale(0) rotate(0);
}
.login-form .group label .icon:after{
	top:6px;
	right:0;
	transform:scale(0) rotate(0);
}
.login-form .group .check:checked + label{
	color:#fff;
}
.login-form .group .check:checked + label .icon{
	background:#1161ee;
}
.login-form .group .check:checked + label .icon:before{
	transform:scale(1) rotate(45deg);
}
.login-form .group .check:checked + label .icon:after{
	transform:scale(1) rotate(-45deg);
}
.login-html .sign-in:checked + .tab + .sign-up + .tab + .login-form .sign-in-htm{
	transform:rotate(0);
}
.login-html .sign-up:checked + .tab + .login-form .sign-up-htm{
	transform:rotate(0);
}

.hr{
	height:2px;
	margin:30px 0 50px 0;
	background:rgba(255,255,255,.2);
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
#p2{
    
    position: absolute;
    font-size: 15px;
    color: white;
    padding: 10px;
    margin-top: -640px;
    margin-left: 570px;
    width: 400px;
    background-color: red;
    font-weight: bold;
    text-align: center;
} 
#p3{
    
    position: absolute;
    font-size: 15px;
    color: white;
    padding: 10px;
    margin-top: -640px;
    margin-left: 570px;
    width: 400px;
    background-color: green;
    font-weight: bold;
    text-align: center;
} 
    .tab{
         margin-top:-10px;
    }
</style>    
</head>
    
<body>

   <div class="login-wrap">
	<div class="login-html">
        
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked style=" margin-top:-10px;"> <label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up" style=" margin-top:-10px;"><label for="tab-2" class="tab">Sign Up</label>
              
		<div class="login-form">
			<div class="sign-in-htm">
				<div class="group">
                    <form method="post">
					<label for="user" class="label">Username</label>
					<input id="user" type="text" class="input" name="uname" autocomplete="off">

					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" class="input" data-type="password" name="upass">
               
					<input id="check" type="checkbox" class="check" checked>
					<label for="check"><span class="icon"></span> Keep me Signed in</label>
				
					<input type="submit" class="button" name="submit" value="Sign In">
                    </form>
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<p name="forg"><a href="reset_password.php">Forgot Password?</a></p>
                    <p style="font-size:20px; font-weight:bold; margin-top:80px; color:yellow;"><a href="index.php">Back to Startup</a></p>
				</div>
                <?php if(isset($errors) && !empty($errors)){
    
                    echo '<p id="p1">Username or password incorrect</p>';
    	           }
                ?>
                <?php if(isset($_GET['logout'])){
    
                    echo '<p id="logout_user">You are successfully loggged out!</p>';
    	           }
                ?>
                
			</div>
          
			<div class="sign-up-htm">
				<div class="group">
                    <form method="post">
					<label for="user" class="label">Username</label>
					<input id="user" type="text" class="input" name="username2" autocomplete="off">
				
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" class="input" data-type="password" name="password2">
				
					<label for="pass" class="label">Repeat Password</label>
					<input id="pass" type="password" class="input" data-type="password" name="re-password">
                    
                    <label for="user" class="label">Admin Secuirty Code</label>
					<input id="user" type="text" class="input" name="secuirty" autocomplete="off">
				
					<label for="pass" class="label">Clinic</label>
					<select class="input" name="clinic2">
                    <option>Onco</option>
                    <option>Breast</option>
                    <option>Onco Surgeory</option>    
                    </select>
                   
					<input type="submit" class="button" value="Sign Up" name="submit2">
                        </form>
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<label for="tab-1">Already Member?</label>
				</div>
			</div>
		</div>
	</div>
</div>
    
                <!--Error msg display -->
                        
                    <?php if(isset($errors1) && !empty($errors1)){
    
                    echo '<p id="p2">This username is exist! Choose an another one</p>';
    	                   }
                        ?>
                        
                    <?php if(isset($errors2) && !empty($errors2)){
    
                    echo '<p id="p2">Failed to add record</p>';
    	                   }
                        ?>
                        
                    <?php if(isset($errors3) && !empty($errors3)){
    
                    echo '<p id="p2">Passwords are not match!</p>';
    	                   }
                        ?> 
    
                    <?php if(isset($errors4) && !empty($errors4)){
    
                    echo '<p id="p2">Incorrect Code!</p>';
    	                   }
                        ?> 
                    <!--.......................................-->
                    
				    <?php if(isset($success) && !empty($success)){
    
                    echo '<p id="p3">You are successfully registered!</p>';
    	                   }
                        ?>  
                            
</body>
</html>

<?php

mysqli_close($connection);

?>