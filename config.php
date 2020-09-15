<?php
error_reporting(0);
$serverName='localhost';
$username="root";
$password="";
$database="codegama";

//connection with database
$con = mysqli_connect($serverName,$username,$password,$database);

if($con){

}else{
    "database is not connected";
}
?>