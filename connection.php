<?php

$dbhost='localhost';
$dbuser='root';
$dbpass='';
$dbname='prweb';

$connection=mysqli_connect('localhost','root','','prweb');

if(mysqli_connect_errno()){
    
    die('Database connection failed'.mysqli_connect_errno());
}

?>