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
$sql = "SELECT * from groupchat";
                    $query = $dbhandler->query($sql);
                       
                    $msg=null;
                     while($result= $query->fetch(PDO::FETCH_ASSOC))
                     {
                         $msgs[] = $result;
                     }
                    header('Content-Type: application/json');
                    echo json_encode($msgs);
                    
     
     
 } catch (PDOException $e)
     {
                    echo $e->getMessage();
                    
                }
 }
        
                        
                        
                
?>