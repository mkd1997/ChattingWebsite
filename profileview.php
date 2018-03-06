<?php
    session_start();
    if(!isset($_SESSION['uname']))
    {
        header("location:index.php?msg=Please Login First");
        die();
    }
?>    
<html>
    <head>
        <title>Profile</title>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="ProfileViewStyleSheet.css">
        <link rel="stylesheet" type="text/css" href="navstyle.css">
    </head>
    <body>
    <nav id="nav-1">
 <a class="link-1" href="home.php">Home</a>
 <a class="link-1" href="profileview.php">Profile</a>
 <a class="link-1" href="About_Us.html">About</a>
 <a class="link-1" href="logout.php" >Logout</a>
</nav>
        <header class="w3-container w3-red">
            <h1>View Your Profile</h1>
        </header>
            <div class="w3-container">
                <table class="w3-table w3-bordered w3-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Birthdate</th>
                            <th>Gender</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $curruser=$_SESSION['uname'];
                        
                        try
                        {
                            $dbhandler = new PDO('mysql:host=localhost;dbname=mydata', 'root');
                            $dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            $sql="SELECT * from useraccounts where username='$curruser'";
                            $query=$dbhandler->query($sql);
                            while ($result=$query->fetch(PDO::FETCH_ASSOC))
                            {
                                $bdate=$result['bdate'];
                                $gender=$result['gender'];
                                echo '<tr><td>'.$curruser.'</td><td>'.$bdate.'</td><td>'.$gender.'</td></tr>';
                            }
                        } catch (Exception $ex) 
                        {
                            $ex->getMessage();
                        }                        
                        ?>
                    </tbody>
                </table>
            </div>
    </body>
</html>

