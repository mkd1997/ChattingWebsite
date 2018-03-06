<?php
session_start();
if(!isset($_SESSION['logged_in']))
     {
         header("location:Login.php");
     }
                 
else
 {
     try
                {
$dbhandler = new PDO('mysql:host=localhost;dbname=mydata', 'root');
$dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if(isset($_GET['data']))
{
     $data=$_GET['data'];
    $uname=$_SESSION['uname'];
   // echo $_GET['data'];
//$sql ="INSERT INTO groupchat (sender,message) VALUES ('".$data"','"$_SESSION['uname']."');";
    $sql ="INSERT INTO groupchat (sender,message) VALUES ('$uname','$data');";
   // echo $sql;
$query = $dbhandler->query($sql);
                   
                    
     
    
}
                   
     
 } catch (PDOException $e)
     {
                    echo $e->getMessage();
                    
                }
 }
        
                        
                        
                
?>