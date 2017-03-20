<html>
    <body style="background-color:lightgreen"></body>
</html>
<?php
ob_start();
if ($_POST['nuname'] != NULL && $_POST['npass'] != NULL && $_POST['rpass'] != NULL)
{
    if ($_POST['npass'] === $_POST['rpass'])
    {

        $dbhandler = new PDO('mysql:host=localhost;dbname=mydata', 'root', 'bhargav');
        //$dbhandler = new PDO('mysql:host=localhost;dbname=Login', 'root', 'ashu1996');
        //echo "Connection is established...<br/>";
        $dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $nuname = $_POST['nuname'];
        $npass = $_POST['npass'];
        $date = $_POST['date'];
        $gender = $_POST['g1'];
        $rpass = $_POST['rpass'];        
        $sql = "INSERT INTO useraccounts(username,password,bdate,gender) VALUES ('$nuname','$npass','$date','$gender')";
        //$sql = "INSERT INTO Login(username,password,D.O.B,gender,Re-enter password) VALUES ('$nuname','$npass','$date','$gender','$rpass')";
        $query = $dbhandler->query($sql); 
              echo "You have succefully registered!!";
              echo "<a href=login.php>Login.php</a>";
        
      //  die();
    }
    else
    {
        header("location:Newuser.php?msg=Both password do not match");
    //    die();
    }
} else
{
    header("location:Newuser.php?msg=Enter required fields");
 //   die();
}
die();
?>

