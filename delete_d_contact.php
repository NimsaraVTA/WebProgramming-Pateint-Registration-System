<?php
require_once('connection.php');
?>

<?php

session_start();

?>
<?php



if(isset($_GET['d_name'])){
    
    $p_file=mysqli_real_escape_string($connection,$_GET['d_name']);
    
    $query="SELECT * FROM doctor_contact WHERE d_name='{$p_file}' LIMIT 1";
    
    $result_set=mysqli_query($connection,$query);
    
    if($result_set){
        
        if(mysqli_num_rows($result_set)==1){
            
        $result=mysqli_fetch_assoc($result_set);
        $dname=$result['d_name'];
        $dno=$result['d_no'];
        $dde=$result['d_details'];
        
            
        }else{
            
            echo "<script language='javascript'>
               
               alert('Can't found!');
               
               </script>";
        }
        
    }else{
        
        header('Location: d_contact_list.php?query_falied');
    }
}

/*..............................................................................*/

?>

<?php

if(isset($_POST['submit'])){
    
    
    $errors=array();
    $errors2=array();
    $errors3=array();
    
    if(!isset($_POST['name']) || strlen(trim($_POST['name']))<1){
        
        $errors[]='Name is Missing/Invalid';
        
    }
    
    if(!isset($_POST['contact']) || strlen(trim($_POST['contact']))<1){
        
        $errors[]='Contact is Missing/Invalid';
        
    }
    
    
    if(empty($errors)){
        $user=mysqli_real_escape_string($connection,$_POST['name']);
        $cont=mysqli_real_escape_string($connection,$_POST['contact']);
        $detail=mysqli_real_escape_string($connection,$_POST['any']);
        
       
            $query= "DELETE FROM doctor_contact WHERE d_name='{$user}'";
            
            $result=mysqli_query($connection,$query);
            
            if($result){
                
                header('Location: d_contact_list.php?contact_added=true');
            }else{
                
                $errors2[]='Something error';
            
            }
            
    }else{
        
        die('database failed!');
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Delete Doctors Contacs</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    
<style>

    body{
        
        background-attachment: fixed;
        overflow-y: hidden;
        font-weight: bold;
    }
/*navigation bar css */    
    ul {
  list-style-type: none;
  margin: 0;
  overflow: hidden;
  background-color: #66004d;
}

li {
  float: left;
  padding: 10px;    
}
li:hover{
    
background-color: #ffccf2;
        }
        
li a {
  display: block;
  color: white;
  font-size: 20px;
  font-weight: bold;
  text-align: center;
  margin: 0;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #ffccf2;
  color: black;
    
}
        *{
            margin: 0;
        }
  
/*main css */

@font-face {
  font-family: Poppins-Regular;
  src: url('../fonts/poppins/Poppins-Regular.ttf'); 
}

@font-face {
  font-family: Poppins-Medium;
  src: url('../fonts/poppins/Poppins-Medium.ttf'); 
}

@font-face {
  font-family: Poppins-Bold;
  src: url('../fonts/poppins/Poppins-Bold.ttf'); 
}

@font-face {
  font-family: Poppins-SemiBold;
  src: url('../fonts/poppins/Poppins-SemiBold.ttf'); 
}


* {
	margin: 0px; 
	padding: 0px; 
	box-sizing: border-box;
}

body, html {
	height: 100%;
	font-family: Poppins-Regular, sans-serif;
}

/*---------------------------------------------*/
a {
	font-family: Poppins-Regular;
	font-size: 14px;
	line-height: 1.7;
	color: #666666;
	margin: 0px;
	transition: all 0.4s;
	-webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
}

a:focus {
	outline: none !important;
}

a:hover {
	text-decoration: none;
}

/*---------------------------------------------*/
h1,h2,h3,h4,h5,h6 {
	margin: 0px;
}

p {
	font-family: Poppins-Regular;
	font-size: 14px;
	line-height: 1.7;
	color: #666666;
	margin: 0px;
}

ul, li {
	margin: 0px;
	list-style-type: none;
}


/*---------------------------------------------*/
input {
	outline: none;
	border: none;
}

input[type="number"] {
    -moz-appearance: textfield;
    appearance: none;
    -webkit-appearance: none;
}

input[type="number"]::-webkit-outer-spin-button,
input[type="number"]::-webkit-inner-spin-button {
    -webkit-appearance: none;
}

textarea {
  outline: none;
  border: none;
}

textarea:focus, input:focus {
  border-color: transparent !important;
}

input:focus::-webkit-input-placeholder { color:transparent; }
input:focus:-moz-placeholder { color:transparent; }
input:focus::-moz-placeholder { color:transparent; }
input:focus:-ms-input-placeholder { color:transparent; }

textarea:focus::-webkit-input-placeholder { color:transparent; }
textarea:focus:-moz-placeholder { color:transparent; }
textarea:focus::-moz-placeholder { color:transparent; }
textarea:focus:-ms-input-placeholder { color:transparent; }

input::-webkit-input-placeholder {color: #cccccc;}
input:-moz-placeholder {color: #cccccc;}
input::-moz-placeholder {color: #cccccc;}
input:-ms-input-placeholder {color: #cccccc;}

textarea::-webkit-input-placeholder {color: #cccccc;}
textarea:-moz-placeholder {color: #cccccc;}
textarea::-moz-placeholder {color: #cccccc;}
textarea:-ms-input-placeholder {color: #cccccc;}

/*---------------------------------------------*/
button {
	outline: none !important;
	border: none;
	background: transparent;
}

button:hover {
	cursor: pointer;
}

iframe {
	border: none !important;
}


.txt1 {
  font-family: Poppins-Regular;
  font-size: 15px;
  color: #999999;
  line-height: 1.4;
}

.txt2 {
  font-family: Poppins-Regular;
  font-size: 15px;
  color: #666666;
  line-height: 1.4;
}

.txt3 {
  font-family: Poppins-Regular;
  font-size: 16px;
  color: #666666;
  line-height: 1.4;
}

.hov1:hover {
  color: #c87ef0;
}


.limiter {
  width: 100%;
  margin: 0 auto;
}

.container-login100 {
  width: 100%;  
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  align-items: stretch;
  flex-wrap: wrap;
}


.wrap-login100 {
  width: 520px;
  min-height: 100vh;
  background: #fff;
  border-radius: 2px;
  position: relative;
}

/*------------------------------------------------------------------
[ Login100 more ]*/
.login100-more {
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
  width: calc(100% - 520px);
  position: relative;
  z-index: 1;
}

.login100-more::before {
  content: "";
  display: block;
  position: absolute;
  z-index: -1;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  background: #e8519e;
  background: -webkit-linear-gradient(bottom, #e8519e, #c77ff2);
  background: -o-linear-gradient(bottom, #e8519e, #c77ff2);
  background: -moz-linear-gradient(bottom, #e8519e, #c77ff2);
  background: linear-gradient(bottom, #e8519e, #c77ff2);
  opacity: 0.8;
}

/*==================================================================
[ Form ]*/

.login100-form {
  width: 100%;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}

.login100-form-title {
  display: block;
  width: 100%;
  font-family: Poppins-Bold;
  font-size: 39px;
  color: #333333;
  line-height: 1.2;
  text-align: left;
}

.wrap-input100 {
  width: 100%;
  position: relative;
  border-bottom: 2px solid #dbdbdb;
  margin-bottom: 45px;
}

.label-input100 {
  font-family: Poppins-SemiBold;
  font-size: 18px;
  color: #999999;
  line-height: 1.2;
  padding-left: 2px;
}

.input100 {
  display: block;
  width: 100%;
  height: 50px;
  background: transparent;
  font-family: Poppins-Regular;
  font-size: 22px;
  color: #555555;
  line-height: 1.2;
  padding: 0 2px;
}

.focus-input100 {
  position: absolute;
  display: block;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  pointer-events: none;
}

.focus-input100::before {
  content: "";
  display: block;
  position: absolute;
  bottom: -2px;
  left: 0;
  width: 0;
  height: 2px;

  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;

  background: #d5007d;
  background: -webkit-linear-gradient(45deg, #d5007d, #e53935);
  background: -o-linear-gradient(45deg, #d5007d, #e53935);
  background: -moz-linear-gradient(45deg, #d5007d, #e53935);
  background: linear-gradient(45deg, #d5007d, #e53935);
}


.input100:focus + .focus-input100::before {
  width: 100%;
}

.has-val.input100 + .focus-input100::before {
  width: 100%;
}

.input-checkbox100 {
  display: none;
}

.label-checkbox100 {
  margin: 0;

  display: block;
  position: relative;
  padding-left: 26px;
  cursor: pointer;
}

.label-checkbox100::before {
  content: "\f00c";
  font-family: FontAwesome;
  font-size: 13px;
  color: transparent;

  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  justify-content: center;
  align-items: center;
  position: absolute;
  width: 16px;
  height: 16px;
  border-radius: 2px;
  background: #e6e6e6;
  left: 0;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -moz-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  -o-transform: translateY(-50%);
  transform: translateY(-50%);
}

.input-checkbox100:checked + .label-checkbox100::before {
  color: #c87ef0;
}

.container-login100-form-btn {
  width: 100%;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  align-items: center;
}

.wrap-login100-form-btn {
  display: block;
  position: relative;
  z-index: 1;
  border-radius: 25px;
  overflow: hidden;
}

.login100-form-bgbtn {
  position: absolute;
  z-index: -1;
  width: 100%;
  height: 300%;
  background: #e8519e;
  background: -webkit-linear-gradient(top, #e8519e, #c77ff2, #e8519e, #c77ff2);
  background: -o-linear-gradient(top, #e8519e, #c77ff2, #e8519e, #c77ff2);
  background: -moz-linear-gradient(top, #e8519e, #c77ff2, #e8519e, #c77ff2);
  background: linear-gradient(top, #e8519e, #c77ff2, #e8519e, #c77ff2);
  bottom: -100%;
  left: 0;

  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;
}

.login100-form-btn {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 0 20px;
  min-width: 244px;
  height: 50px;

  font-family: Poppins-Medium;
  font-size: 16px;
  color: #fff;
  line-height: 1.2;
}

.wrap-login100-form-btn:hover .login100-form-bgbtn {
  bottom: 0;
}

.validate-input {
  position: relative;
}

.alert-validate::before {
  content: attr(data-validate);
  position: absolute;
  max-width: 70%;
  background-color: #fff;
  border: 1px solid #c80000;
  border-radius: 2px;
  padding: 4px 30px 4px 10px;
  bottom: calc((100% - 25px) / 2);
  -webkit-transform: translateY(50%);
  -moz-transform: translateY(50%);
  -ms-transform: translateY(50%);
  -o-transform: translateY(50%);
  transform: translateY(50%);
  right: 2px;
  pointer-events: none;

  font-family: Poppins-Medium;
  color: #c80000;
  font-size: 14px;
  line-height: 1.4;
  text-align: left;

  visibility: hidden;
  opacity: 0;

  -webkit-transition: opacity 0.4s;
  -o-transition: opacity 0.4s;
  -moz-transition: opacity 0.4s;
  transition: opacity 0.4s;
}

.alert-validate::after {
  content: "\f06a";
  font-family: FontAwesome;
  display: block;
  position: absolute;
  color: #c80000;
  font-size: 18px;
  bottom: calc((100% - 25px) / 2);
  -webkit-transform: translateY(50%);
  -moz-transform: translateY(50%);
  -ms-transform: translateY(50%);
  -o-transform: translateY(50%);
  transform: translateY(50%);
  right: 8px;
}

.alert-validate:hover:before {
  visibility: visible;
  opacity: 1;
}

@media (max-width: 992px) {
  .alert-validate::before {
    visibility: visible;
    opacity: 1;
  }
}

.true-validate::after {
  content: "\f26b";
  font-family: Material-Design-Iconic-Font;
  font-size: 22px;
  color: #00ad5f;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  align-items: center;
  justify-content: center;
  position: absolute;
  bottom: calc((100% - 25px) / 2);
  -webkit-transform: translateY(50%);
  -moz-transform: translateY(50%);
  -ms-transform: translateY(50%);
  -o-transform: translateY(50%);
  transform: translateY(50%);
  right: 5px;
}



@media (max-width: 576px) {
  .wrap-login100 {
    padding-left: 15px;
    padding-right: 15px;
  }
}

/*util css*/


.p-t-0 {padding-top: 0px;}
.p-t-1 {padding-top: 1px;}
.p-t-2 {padding-top: 2px;}
.p-t-3 {padding-top: 3px;}
.p-t-4 {padding-top: 4px;}
.p-t-5 {padding-top: 5px;}
.p-t-6 {padding-top: 6px;}
.p-t-7 {padding-top: 7px;}
.p-t-8 {padding-top: 8px;}
.p-t-9 {padding-top: 9px;}
.p-t-10 {padding-top: 10px;}
.p-t-11 {padding-top: 11px;}
.p-t-12 {padding-top: 12px;}
.p-t-13 {padding-top: 13px;}
.p-t-14 {padding-top: 14px;}
.p-t-15 {padding-top: 15px;}
.p-t-16 {padding-top: 16px;}
.p-t-17 {padding-top: 17px;}
.p-t-18 {padding-top: 18px;}
.p-t-19 {padding-top: 19px;}
.p-t-20 {padding-top: 20px;}
.p-t-21 {padding-top: 21px;}
.p-t-22 {padding-top: 22px;}
.p-t-23 {padding-top: 23px;}
.p-t-24 {padding-top: 24px;}
.p-t-25 {padding-top: 25px;}
.p-t-26 {padding-top: 26px;}
.p-t-27 {padding-top: 27px;}
.p-t-28 {padding-top: 28px;}
.p-t-29 {padding-top: 29px;}
.p-t-30 {padding-top: 30px;}
.p-t-31 {padding-top: 31px;}
.p-t-32 {padding-top: 32px;}
.p-t-33 {padding-top: 33px;}
.p-t-34 {padding-top: 34px;}
.p-t-35 {padding-top: 35px;}
.p-t-36 {padding-top: 36px;}
.p-t-37 {padding-top: 37px;}
.p-t-38 {padding-top: 38px;}
.p-t-39 {padding-top: 39px;}
.p-t-40 {padding-top: 40px;}
.p-t-41 {padding-top: 41px;}
.p-t-42 {padding-top: 42px;}
.p-t-43 {padding-top: 43px;}
.p-t-44 {padding-top: 44px;}
.p-t-45 {padding-top: 45px;}
.p-t-46 {padding-top: 46px;}
.p-t-47 {padding-top: 47px;}
.p-t-48 {padding-top: 48px;}
.p-t-49 {padding-top: 49px;}
.p-t-50 {padding-top: 50px;}
.p-t-51 {padding-top: 51px;}
.p-t-52 {padding-top: 52px;}
.p-t-53 {padding-top: 53px;}
.p-t-54 {padding-top: 54px;}
.p-t-55 {padding-top: 55px;}
.p-t-56 {padding-top: 56px;}
.p-t-57 {padding-top: 57px;}
.p-t-58 {padding-top: 58px;}
.p-t-59 {padding-top: 59px;}
.p-t-60 {padding-top: 60px;}
.p-t-61 {padding-top: 61px;}
.p-t-62 {padding-top: 62px;}
.p-t-63 {padding-top: 63px;}
.p-t-64 {padding-top: 64px;}
.p-t-65 {padding-top: 65px;}
.p-t-66 {padding-top: 66px;}
.p-t-67 {padding-top: 67px;}
.p-t-68 {padding-top: 68px;}
.p-t-69 {padding-top: 69px;}
.p-t-70 {padding-top: 70px;}
.p-t-71 {padding-top: 71px;}
.p-t-72 {padding-top: 72px;}
.p-t-73 {padding-top: 73px;}
.p-t-74 {padding-top: 74px;}
.p-t-75 {padding-top: 75px;}
.p-t-76 {padding-top: 76px;}
.p-t-77 {padding-top: 77px;}
.p-t-78 {padding-top: 78px;}
.p-t-79 {padding-top: 79px;}
.p-t-80 {padding-top: 80px;}
.p-t-81 {padding-top: 81px;}
.p-t-82 {padding-top: 82px;}
.p-t-83 {padding-top: 83px;}
.p-t-84 {padding-top: 84px;}
.p-t-85 {padding-top: 85px;}
.p-t-86 {padding-top: 86px;}
.p-t-87 {padding-top: 87px;}
.p-t-88 {padding-top: 88px;}
.p-t-89 {padding-top: 89px;}
.p-t-90 {padding-top: 90px;}
.p-t-91 {padding-top: 91px;}
.p-t-92 {padding-top: 92px;}
.p-t-93 {padding-top: 93px;}
.p-t-94 {padding-top: 94px;}
.p-t-95 {padding-top: 95px;}
.p-t-96 {padding-top: 96px;}
.p-t-97 {padding-top: 97px;}
.p-t-98 {padding-top: 98px;}
.p-t-99 {padding-top: 99px;}
.p-b-0 {padding-bottom: 0px;}
.p-b-1 {padding-bottom: 1px;}
.p-b-2 {padding-bottom: 2px;}
.p-b-3 {padding-bottom: 3px;}
.p-b-4 {padding-bottom: 4px;}
.p-b-5 {padding-bottom: 5px;}
.p-b-6 {padding-bottom: 6px;}
.p-b-7 {padding-bottom: 7px;}
.p-b-8 {padding-bottom: 8px;}
.p-b-9 {padding-bottom: 9px;}
.p-b-10 {padding-bottom: 10px;}
.p-b-11 {padding-bottom: 11px;}
.p-b-12 {padding-bottom: 12px;}
.p-b-13 {padding-bottom: 13px;}
.p-b-14 {padding-bottom: 14px;}
.p-b-15 {padding-bottom: 15px;}
.p-b-16 {padding-bottom: 16px;}
.p-b-17 {padding-bottom: 17px;}
.p-b-18 {padding-bottom: 18px;}
.p-b-19 {padding-bottom: 19px;}
.p-b-20 {padding-bottom: 20px;}
.p-b-21 {padding-bottom: 21px;}
.p-b-22 {padding-bottom: 22px;}
.p-b-23 {padding-bottom: 23px;}
.p-b-24 {padding-bottom: 24px;}
.p-b-25 {padding-bottom: 25px;}
.p-b-26 {padding-bottom: 26px;}
.p-b-27 {padding-bottom: 27px;}
.p-b-28 {padding-bottom: 28px;}
.p-b-29 {padding-bottom: 29px;}
.p-b-30 {padding-bottom: 30px;}
.p-b-31 {padding-bottom: 31px;}
.p-b-32 {padding-bottom: 32px;}
.p-b-33 {padding-bottom: 33px;}
.p-b-34 {padding-bottom: 34px;}
.p-b-35 {padding-bottom: 35px;}
.p-b-36 {padding-bottom: 36px;}
.p-b-37 {padding-bottom: 37px;}
.p-b-38 {padding-bottom: 38px;}
.p-b-39 {padding-bottom: 39px;}
.p-b-40 {padding-bottom: 40px;}
.p-b-41 {padding-bottom: 41px;}
.p-b-42 {padding-bottom: 42px;}
.p-b-43 {padding-bottom: 43px;}
.p-b-44 {padding-bottom: 44px;}
.p-b-45 {padding-bottom: 45px;}
.p-b-46 {padding-bottom: 46px;}
.p-b-47 {padding-bottom: 47px;}
.p-b-48 {padding-bottom: 48px;}
.p-b-49 {padding-bottom: 49px;}
.p-b-50 {padding-bottom: 50px;}
.p-b-51 {padding-bottom: 51px;}
.p-b-52 {padding-bottom: 52px;}
.p-b-53 {padding-bottom: 53px;}
.p-b-54 {padding-bottom: 54px;}
.p-b-55 {padding-bottom: 55px;}
.p-b-56 {padding-bottom: 56px;}
.p-b-57 {padding-bottom: 57px;}
.p-b-58 {padding-bottom: 58px;}
.p-b-59 {padding-bottom: 59px;}
.p-b-60 {padding-bottom: 60px;}
.p-b-61 {padding-bottom: 61px;}
.p-b-62 {padding-bottom: 62px;}
.p-b-63 {padding-bottom: 63px;}
.p-b-64 {padding-bottom: 64px;}
.p-b-65 {padding-bottom: 65px;}
.p-b-66 {padding-bottom: 66px;}
.p-b-67 {padding-bottom: 67px;}
.p-b-68 {padding-bottom: 68px;}
.p-b-69 {padding-bottom: 69px;}
.p-b-70 {padding-bottom: 70px;}
.p-b-71 {padding-bottom: 71px;}
.p-b-72 {padding-bottom: 72px;}
.p-b-73 {padding-bottom: 73px;}
.p-b-74 {padding-bottom: 74px;}
.p-b-75 {padding-bottom: 75px;}
.p-b-76 {padding-bottom: 76px;}
.p-b-77 {padding-bottom: 77px;}
.p-b-78 {padding-bottom: 78px;}
.p-b-79 {padding-bottom: 79px;}
.p-b-80 {padding-bottom: 80px;}
.p-b-81 {padding-bottom: 81px;}
.p-b-82 {padding-bottom: 82px;}
.p-b-83 {padding-bottom: 83px;}
.p-b-84 {padding-bottom: 84px;}
.p-b-85 {padding-bottom: 85px;}
.p-b-86 {padding-bottom: 86px;}
.p-b-87 {padding-bottom: 87px;}
.p-b-88 {padding-bottom: 88px;}
.p-b-89 {padding-bottom: 89px;}
.p-b-90 {padding-bottom: 90px;}
.p-b-91 {padding-bottom: 91px;}
.p-b-92 {padding-bottom: 92px;}
.p-b-93 {padding-bottom: 93px;}
.p-b-94 {padding-bottom: 94px;}
.p-b-95 {padding-bottom: 95px;}
.p-b-96 {padding-bottom: 96px;}
.p-b-97 {padding-bottom: 97px;}
.p-b-98 {padding-bottom: 98px;}
.p-b-99 {padding-bottom: 99px;}
.p-l-0 {padding-left: 0px;}
.p-l-1 {padding-left: 1px;}
.p-l-2 {padding-left: 2px;}
.p-l-3 {padding-left: 3px;}
.p-l-4 {padding-left: 4px;}
.p-l-5 {padding-left: 5px;}
.p-l-6 {padding-left: 6px;}
.p-l-7 {padding-left: 7px;}
.p-l-8 {padding-left: 8px;}
.p-l-9 {padding-left: 9px;}
.p-l-10 {padding-left: 10px;}
.p-l-11 {padding-left: 11px;}
.p-l-12 {padding-left: 12px;}
.p-l-13 {padding-left: 13px;}
.p-l-14 {padding-left: 14px;}
.p-l-15 {padding-left: 15px;}
.p-l-16 {padding-left: 16px;}
.p-l-17 {padding-left: 17px;}
.p-l-18 {padding-left: 18px;}
.p-l-19 {padding-left: 19px;}
.p-l-20 {padding-left: 20px;}
.p-l-21 {padding-left: 21px;}
.p-l-22 {padding-left: 22px;}
.p-l-23 {padding-left: 23px;}
.p-l-24 {padding-left: 24px;}
.p-l-25 {padding-left: 25px;}
.p-l-26 {padding-left: 26px;}
.p-l-27 {padding-left: 27px;}
.p-l-28 {padding-left: 28px;}
.p-l-29 {padding-left: 29px;}
.p-l-30 {padding-left: 30px;}
.p-l-31 {padding-left: 31px;}
.p-l-32 {padding-left: 32px;}
.p-l-33 {padding-left: 33px;}
.p-l-34 {padding-left: 34px;}
.p-l-35 {padding-left: 35px;}
.p-l-36 {padding-left: 36px;}
.p-l-37 {padding-left: 37px;}
.p-l-38 {padding-left: 38px;}
.p-l-39 {padding-left: 39px;}
.p-l-40 {padding-left: 40px;}
.p-l-41 {padding-left: 41px;}
.p-l-42 {padding-left: 42px;}
.p-l-43 {padding-left: 43px;}
.p-l-44 {padding-left: 44px;}
.p-l-45 {padding-left: 45px;}
.p-l-46 {padding-left: 46px;}
.p-l-47 {padding-left: 47px;}
.p-l-48 {padding-left: 48px;}
.p-l-49 {padding-left: 49px;}
.p-l-50 {padding-left: 50px;}
.p-l-51 {padding-left: 51px;}
.p-l-52 {padding-left: 52px;}
.p-l-53 {padding-left: 53px;}
.p-l-54 {padding-left: 54px;}
.p-l-55 {padding-left: 55px;}
.p-l-56 {padding-left: 56px;}
.p-l-57 {padding-left: 57px;}
.p-l-58 {padding-left: 58px;}
.p-l-59 {padding-left: 59px;}
.p-l-60 {padding-left: 60px;}
.p-l-61 {padding-left: 61px;}
.p-l-62 {padding-left: 62px;}
.p-l-63 {padding-left: 63px;}
.p-l-64 {padding-left: 64px;}
.p-l-65 {padding-left: 65px;}
.p-l-66 {padding-left: 66px;}
.p-l-67 {padding-left: 67px;}
.p-l-68 {padding-left: 68px;}
.p-l-69 {padding-left: 69px;}
.p-l-70 {padding-left: 70px;}
.p-l-71 {padding-left: 71px;}
.p-l-72 {padding-left: 72px;}
.p-l-73 {padding-left: 73px;}
.p-l-74 {padding-left: 74px;}
.p-l-75 {padding-left: 75px;}
.p-l-76 {padding-left: 76px;}
.p-l-77 {padding-left: 77px;}
.p-l-78 {padding-left: 78px;}
.p-l-79 {padding-left: 79px;}
.p-l-80 {padding-left: 80px;}
.p-l-81 {padding-left: 81px;}
.p-l-82 {padding-left: 82px;}
.p-l-83 {padding-left: 83px;}
.p-l-84 {padding-left: 84px;}
.p-l-85 {padding-left: 85px;}
.p-l-86 {padding-left: 86px;}
.p-l-87 {padding-left: 87px;}
.p-l-88 {padding-left: 88px;}
.p-l-89 {padding-left: 89px;}
.p-l-90 {padding-left: 90px;}
.p-l-91 {padding-left: 91px;}
    
.text-white {color: white;}
.text-black {color: black;}

.text-hov-white:hover {color: white;}

/* ------------------------------------ */
.text-up {text-transform: uppercase;}

/* ------------------------------------ */
.text-center {text-align: center;}
.text-left {text-align: left;}
.text-right {text-align: right;}
.text-middle {vertical-align: middle;}

/* ------------------------------------ */
.lh-1-0 {line-height: 1.0;}
.lh-1-1 {line-height: 1.1;}
.lh-1-2 {line-height: 1.2;}
.lh-1-3 {line-height: 1.3;}
.lh-1-4 {line-height: 1.4;}
.lh-1-5 {line-height: 1.5;}
.lh-1-6 {line-height: 1.6;}
.lh-1-7 {line-height: 1.7;}
.lh-1-8 {line-height: 1.8;}
.lh-1-9 {line-height: 1.9;}
.lh-2-0 {line-height: 2.0;}
.lh-2-1 {line-height: 2.1;}
.lh-2-2 {line-height: 2.2;}
.lh-2-3 {line-height: 2.3;}
.lh-2-4 {line-height: 2.4;}
.lh-2-5 {line-height: 2.5;}
.lh-2-6 {line-height: 2.6;}
.lh-2-7 {line-height: 2.7;}
.lh-2-8 {line-height: 2.8;}
.lh-2-9 {line-height: 2.9;}


.dis-none {display: none;}
.dis-block {display: block;}
.dis-inline {display: inline;}
.dis-inline-block {display: inline-block;}
.dis-flex {
	display: -webkit-box;
	display: -webkit-flex;
	display: -moz-box;
	display: -ms-flexbox;
	display: flex;
}

/*[ Position ]
-----------------------------------------------------------
*/
.pos-relative {position: relative;}
.pos-absolute {position: absolute;}
.pos-fixed {position: fixed;}

/*[ float ]
-----------------------------------------------------------
*/
.float-l {float: left;}
.float-r {float: right;}


/*[ Width & Height ]
-----------------------------------------------------------
*/
.sizefull {
	width: 100%;
	height: 100%;
}
.w-full {width: 100%;}
.h-full {height: 100%;}
.max-w-full {max-width: 100%;}
.max-h-full {max-height: 100%;}
.min-w-full {min-width: 100%;}
.min-h-full {min-height: 100%;}

/*[ Top Bottom Left Right ]
-----------------------------------------------------------
*/
.top-0 {top: 0;}
.bottom-0 {bottom: 0;}
.left-0 {left: 0;}
.right-0 {right: 0;}

.top-auto {top: auto;}
.bottom-auto {bottom: auto;}
.left-auto {left: auto;}
.right-auto {right: auto;}


/*[ Opacity ]
-----------------------------------------------------------
*/
.op-0-0 {opacity: 0;}
.op-0-1 {opacity: 0.1;}
.op-0-2 {opacity: 0.2;}
.op-0-3 {opacity: 0.3;}
.op-0-4 {opacity: 0.4;}
.op-0-5 {opacity: 0.5;}
.op-0-6 {opacity: 0.6;}
.op-0-7 {opacity: 0.7;}
.op-0-8 {opacity: 0.8;}
.op-0-9 {opacity: 0.9;}
.op-1-0 {opacity: 1;}



</style>
   
</head>
    
    
<body style="background-color: #999999;">
    
    
      <header>
    <?php
    
          
          $o='Onco';
          $b='Breast';
          $os='Onco Surgeory';
        
          if($_SESSION['user_clinic']===$o){
              
              $a='<ul>';
              $a.='<li><a class="active" href="main.php">Home</a></li>';
              $a.='<li><a href="d_contact_list.php">Show Contacts</a></li>';
              $a.='</ul>';
              
          }else if($_SESSION['user_clinic']===$b){
              
              $a='<ul>';
              $a.='<li><a class="active" href="breast_clinic.php">Home</a></li>';
              $a.='<li><a href="d_contact_list.php">Show Contacts</a></li>';
              $a.='</ul>';
              
          }else if($_SESSION['user_clinic']===$os){
              
              $a='<ul>';
              $a.='<li><a class="active" href="onco_surgeory_clinic.php">Home</a></li>';
              $a.='<li><a href="d_contact_list.php">Show Contacts</a></li>';
              $a.='</ul>';
          }else{
              
              die('Database query failed!');
          }
          
    ?>
<ul>
  <?php
    echo $a;
    ?>
</ul>
    
    </header>
	
    
    
    
	<div class="limiter">
		<div class="container-login100">
			<div class="login100-more" style="background-image: url('doctor.jpg');"></div>

<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
    
                        <form class="login100-form validate-form" method="post">
                        <span class="login100-form-title p-b-59">Delete Doctors' Contacts</span>
                                                                                                           
					<div class="wrap-input100 validate-input" data-validate="Name is required">
						<span class="label-input100">Doctor's Name</span>
						<input class="input100" type="tele" name="name" placeholder="Doctor Name" required value="<?php echo $dname; ?>" readonly>
						<span class="focus-input100"></span>
					</div>


					<div class="wrap-input100 validate-input" data-validate="Username is required">
						<span class="label-input100">Contact No</span>
						<input class="input100" type="text" name="contact" placeholder="Contact No" required maxlength="10" value="<?php echo $dno; ?>" autocomplete="off">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Repeat Password is required">
						<span class="label-input100">Any Details</span>
						<input class="input100" type="text" name="any" placeholder="Any Details" value="<?php echo $dde; ?>">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="submit">
								Delete Contacts
							</button>
						</div>

					</div>
				</form>
			</div>
		</div>
	</div>
	
	<script src="js/main.js"></script>

</body>
</html>
<?php

mysqli_close($connection);

?>