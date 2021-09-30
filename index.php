<?php
require_once("connection.php");
?>

<?php

if(isset($_POST['submit'])){
    
   
        $name=mysqli_real_escape_string($connection,$_POST['name']);
        $mail=mysqli_real_escape_string($connection,$_POST['mail']);
        $no=mysqli_real_escape_string($connection,$_POST['num']);
        $msg=mysqli_real_escape_string($connection,$_POST['msg']);
        
     
            
            $query= "INSERT INTO comment (name, mail, teleno, msg) VALUES ('{$name}', '{$mail}', '$no','{$msg}')";
            
            $result=mysqli_query($connection,$query);
            
            if($result){
                
                header('Location: index.php?user_added=true');
            }else{
                
                $errors2[]='Failed to add a new recoed!';
            
            }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Welcome Page</title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Candal">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
 
</head>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container2 {
    
        display: flex;
        flex-wrap: wrap;
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
    width: 700px;
    margin-left: 200px;
}
    #com{
       margin-left: 200px;
        font-weight: bold;
        color: green;
        border-bottom-color: green;
    }
    #hr1{
        
        border-color: green;
    } 
      
    @media screen and (max-width:907px){
      
        .container2 {
    
        display: flex;
        flex-wrap: wrap;
  padding: 20px;
    width: 500px;
    margin-left: 100px;
}
    
        
    } 
    
 @media screen and (max-width:630px){
      
        .container2 {
    
        display: flex;
        flex-wrap: wrap;
  padding: 20px;
    width: 400px;
    margin-left: 50px;
}
    
        
    }  
    
@media screen and (max-width:474px){
      
        .container2 {
    
        display: flex;
        flex-wrap: wrap;
  padding: 20px;
    width: 250px;
    margin-left: 30px;
}
    
        
    }      
</style>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
  <!--banner-->
  <section id="banner" class="banner">
    <div class="bg-color">
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="col-md-12">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
              <a class="navbar-brand" href="#"><img src="img/logo.png" class="img-responsive" style="width: 140px; margin-top: -16px;"></a>
            </div>
            <div class="collapse navbar-collapse navbar-right" id="myNavbar">
              <ul class="nav navbar-nav">
                <li class="active"><a href="comment.php">See Comments On Our Site</a></li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
      <div class="container">
        <div class="row">
          <div class="banner-info">
            <div class="banner-logo text-center">
              <img src="img/logo.png" class="img-responsive" style="height: 200px;">
            </div>
            <div class="banner-text text-center">
              <h1 class="white">Patient Registration System</h1>
              <p>Teaching Hospital - Kurunegala</p>
              <a href="login.php" class="btn btn-appoint">Get Start to Your Page</a>
            </div>
            <div class="overlay-detail text-center">
              <a href="#service"><i class="fa fa-angle-down"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--cta 2-->
  <section id="cta-2" class="section-padding">
    <div class="container">
      <div class=" row">
        <div class="col-md-2"></div>
        <div class="text-right-md col-md-4 col-sm-4">
          <h2 class="section-title white lg-line">« A few words<br> about us »</h2>
        </div>
        <div class="col-md-4 col-sm-5">
          This site was made by us for combination of three clinics. There are Onco clinic, Breast clinic and Onco Surgeory clinic. The main clinic of them is Onco clinic. An admin of Onco clinic can access other two clinics. But Admins of other clinics can access only their clinic. Patients are registered by Onco clinic admins. Others can't do it. They can only modify their patient without change File Number. 
          <p class="text-right text-primary"><i>— Onco Clinic - Teching Hospital/Kurunegala</i></p>
        </div>
        <div class="col-md-2"></div>
      </div>
    </div>
  </section>
  <!--cta-->
  <!--cta 2-->
  <section id="cta-2" class="section-padding">
    <div class="container">
      <div class=" row">
        <div class="col-md-2"></div>
        <div class="text-right-md col-md-4 col-sm-4">
          <h2 class="section-title white lg-line">« Privacy policy<br>»</h2>
        </div>
        <div class="col-md-4 col-sm-5">
          This site can control only by Admins that are registered by other admins. The security of your Personal Information is important to us, but remember that no method of transmission over the Internet, or method of electronic storage, is 100% secure. While we strive to use commercially acceptable means to protect your Personal Information, we cannot guarantee its absolute security.
          <p class="text-right text-primary"><i>— Onco Clinic - Teching Hospital/Kurunegala</i></p>
        </div>
        <div class="col-md-2"></div>
      </div>
    </div>
  </section>
  <!--cta-->
  <!--contact-->
    <h3 id="com">Give Your Comment About This Site</h3>
    <hr id="hr1">
  <div class="container2">
  <form method="post">
    <label for="fname">Your Name</label>
    <input type="text" id="fname" name="name" placeholder="Your name.." required>

    <label for="lname">Your Mail (Optional)</label>
    <input type="text" id="lname" name="mail" placeholder="Your email">

    <label for="lname">Your Contact Number (Optional)</label>
    <input type="text" id="lname" name="num" placeholder="Your Contact Number">

    <label for="subject">Your Comment</label>
    <textarea id="subject" name="msg" placeholder="Write something.." style="height:200px" required></textarea>

    <input type="submit" value="Submit" name="submit">
  </form>
</div>
  <!--/ contact-->


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>
    <hr id="hr1">
    <footer>
    
        <p style="text-align:center;">&copy; copyright - Developed by Thathsarani Nimsara (2021)</p>
        
    </footer>

</body>

</html>
