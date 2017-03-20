<?php
session_start();
//ob_start();

              try  {
$dbhandler = new PDO('mysql:host=localhost;dbname=mydata', 'root', 'bhargav');
$dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 if (isset($_POST['uname']) && isset($_POST['pass']))
                    {
                        
                        $sql = "SELECT password from useraccounts where username='".$_POST['uname']."'";
                        $query = $dbhandler->query($sql);
                        $result= $query->fetch(PDO::FETCH_ASSOC);
                        if(count($result)===1 && ($result['password']===$_POST['pass']))
                        {
                           
                                $_SESSION['logged_in'] = true;
                                $_SESSION['uname']=$_POST['uname'];
                               
                                header("location:home1.php");
                                die();
                                   
                           
                                
                               
                         }
                            
                        
                         else
                            {
                                header("location:Login.php?msg=Invalid Login Detail");
                                die();
                            }
                        
                    }
                    
           
                  } catch (PDOException $e)
                {
                    echo $e->getMessage();
                    
                }

                
                ?>
<!--This Page is ready-->
<!--Login Page-->

<html>
    <head>
        <script>
        function textfocus()
            {
                if(document.forms.username.value=="")
                    {
                        document.forms.username.focus();
                        
                    }
                else{
                    document.forms.pass.focus();   
                }
            }
        </script>
    </head>
    <body style="background-color:lightgreen">
        <form  action="Login.php" method="POST">
            <table border="1">
                <tr>
                    <h1>
                        <?php
                        if (isset($_GET['msg']))
                        {
                            echo $_GET['msg'];
                        } else
                        {
                            echo "Login to Chat ";
                        }
                        ?>
                    </h1>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td colspan=2><input type="text" name="uname" /></td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td><input type="password" name="pass" /></td>
                </tr>
                
                <tr>
                    <td colspan=2><input type="submit" value="submit" /></td>
                </tr>
                </table>

         </form>
         </body>
         </html>       
