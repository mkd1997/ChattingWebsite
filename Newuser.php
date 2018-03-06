<html>
    <head>
        <title>Signup</title>
    </head>
    <body style="background-color:lightyellow;">
        <form action="SaveInfo.php" method="POST">
            <table border="1">
                <tr>
                    <?php
                    if (isset($_GET['msg']))
                    {
                        echo $_GET['msg'];
                    } else
                    {
                        echo 'Hello newbie!!';
                    }
                    ?>
                </tr>
                <tr>
                    <td>*Username: </td>
                    <td><input type="text" name="nuname" /></td>
                </tr>
                <tr>
                    <td>D.O.B: </td>
                    <td><input type="date" name="date" /></td>
                </tr>
                <tr>
                    <td>Gender: </td>
                    <td>
                        <input type="radio"  name="g1" value="Female"/>Female
                        &nbsp
                        <input type="radio"  name="g1" value="Male"/>Male
                    </td>
                </tr>
                <tr>
                    <td>*Password: </td>
                    <td><input type="password" name="npass"/></td>
                </tr>
                <tr>
                    <td>*Re-enter Password: </td>
                    <td><input type="password" name='rpass'/></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Save" /></td>
                </tr>    
                <tr>
                    Fields with * are Mandatory
                </tr>
            </table>      

        </form>
    </body>    
</html>
