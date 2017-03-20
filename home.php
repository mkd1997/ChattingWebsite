<!--Home Page-->
<?php
session_start();
if (!isset($_SESSION['uname']))
{
    header("location:index.php?msg=Please Login First");
    die();
} else
{
    $u = $_SESSION['uname'];
}
$dbhandler = new PDO('mysql:host=localhost;dbname=mydata', 'root', 'bhargav');
//echo '1';
//$dbhandler = new PDO('mysql:host=localhost;dbname=Login', 'root', 'ashu1996');
//echo "Connection is established...<br/>";
$dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT * from useraccounts where username='$u'";
$query = $dbhandler->query($sql);
$result = $query->fetch(PDO::FETCH_ASSOC);
//$dbhandler.
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Home Page</title>
    </head>
    <body>
        <div>
            <table border='2'>
                <tr>
                    <td style="height:100px">
                        <?php                        
                      <!--  $temp='"UserPhotos/'.$result['username'].'.jpg"'; -->
                        echo '<img height="100" width="100" src='.$temp.'/>';                        
                        ?>                                                                                       
                    </td>
                    <td>
                        Username:
                    </td>        
                    <td>
                        <?php
                        echo $result['username'];
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Gender:
                    </td>        
                    <td>
                        <?php
                        echo $result['gender'];
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Birthdate:
                    </td>        
                    <td>
                        <?php
                        echo $result['bdate'];
                        ?>
                    </td>
                </tr>                
            </table>
        </div>
        <!--List of online users-->
        <?php
        
        ?>
    </body>
</html>
