<?php
ob_start();
session_start();

  $dbhandler = new PDO('mysql:host=localhost;dbname=mydata', 'root');
  $dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $var =$_SESSION['uname'];
$sql="DELETE FROM online WHERE username='".$var."'";
$dbhandler->query($sql);
$_SESSION['logged_in']=false;
$_SESSION['online']=false;


header("location:Login.php");

?>