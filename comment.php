<?php
require_once("connection.php");
?>

<?php
session_start();
?>

<?php


$userlist='';

$query="SELECT * FROM comment";
    


//getting the list of users

$users=mysqli_query($connection,$query);

if($users){
    
    while($user=mysqli_fetch_assoc($users)){
      $userlist.="<tr>";
        $userlist.="<td>{$user['name']}</td>";
        $userlist.="<td>{$user['msg']}</td>";
      $userlist.='<tr>';    
        
    }
    
}else{
    
    echo 'Database query failed!';
}

?>

<html>
<head>
	<meta charset="utf-8">
	<title>Comments List</title>
    <style type="text/css">
    
        body{
            
            /*background-image: url("hospital.jpg");*/
            background-image: url("comment.jpg");
            background-attachment: fixed;
            background-repeat: repeat-y;
         
        }
        .table_main{
            position: absolute;
            height: 100%;
            background-color: black;
            width: 80%;
            margin-left: 150px;
            opacity: .7;
        }
        .masterlist{
            
            margin-top: 80px;
            position: absolute;
            padding: 2px;
            width: 70%;
            background-color: transparent;
            margin-left: 200px;
    
        
        }
       
        td{
        
            background-color: transparent;
            height: 60px;
            color: white;
            border-bottom: 2px solid white;
        }
        h1{
            position: absolute;
            margin-top: 170px;
        }
        

        *{
            margin: 0;
        }

        ::placeholder{
            
            color: black;
            font-weight: bold;
        } 
        #com{
            
            position: absolute;
            color: yellow;
            margin-top: 30px;
            margin-left: 200px;
        }
             
    </style>
</head>
    
<body>
<article>

   
    <main class="table_main"></main>
    <table class="masterlist">
    
        <tr>
           <h1 id="com">Thank You For Your Comment!</h1> 
        </tr>
    
        <?php  echo $userlist ?>
    </table>
    
    
    

    
</article>
</body>    

</html>

<?php

mysqli_close($connection);

?>