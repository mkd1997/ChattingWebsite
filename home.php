<?php
ob_start();
session_start();
if($_SESSION['logged_in']!==true)
{
    header("location:Login.php");
    die();
}
else{
    $dbhandler = new PDO('mysql:host=localhost;dbname=mydata', 'root');
//echo '1';
//$dbhandler = new PDO('mysql:host=localhost;dbname=Login', 'root', 'ashu1996');
//echo "Connection is established...<br/>";
$dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$setonline="INSERT INTO online VALUES('".$_SESSION['uname']."',1)";

if(!isset($_SESSION['online']))
{
    $query = $dbhandler->query($setonline);
$_SESSION['online']=true;
}



//$result = $query->fetch(PDO::FETCH_ASSOC);
}
?>
<html>
<head>
<title>Home:</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="mystyle.css">
<link rel="stylesheet" type="text/css" href="navstyle.css">
</head>

<body>

    <nav id="nav-1">
 <a class="link-1" href="home.php">Home</a>
 <a class="link-1" href="profileview.php">Profile</a>
 <a class="link-1" href="About_Us.html">About</a>
 <a class="link-1" href="logout.php" >Logout</a>
</nav>

<div id="msg_bix">

<div class="chat_window">
    <div class="top_menu">
        <div class="buttons"><a href="logout.php" ><div class="button close"></div></a>
            
            <div class="button minimize"></div>
            <div class="button maximize"></div>
        </div>
        <div class="title"> <header> <div id="welcome">
Welcome <?php echo $_SESSION['uname']; ?>,</div>
  
  </header>  </div>
    </div>

    <ul class="messages" >

<div id="chat_window"> </div>

    </ul>

    
    <div class="bottom_wrapper clearfix">
        <div class="message_input_wrapper">
           
            <input class="message_input" id="txt_msg" placeholder="Type your message here..." />
           
        </div>
        <div class="send_message" id="send_message">
            <div class="icon"></div>
            <div class="text">Send</div>
        </div>
    </div>

</div>

<div class="message_template">
    <li class="message">
        <div class="avatar"></div>
        <div class="text_wrapper">
            <div class="text"></div>
        </div>
    </li>
</div>


</div>











<!--
<form id="msg">
    <input type="text" id="txt_msg"/>
    <input type="submit" value="send">
</form>
   <
<aside>
    
   <div id="users_online">USERS ONLINE:<br>
<p>
<?php
$sql = "SELECT * from online WHERE login=1";
$query = $dbhandler->query($sql);
 while ($result= $query->fetch(PDO::FETCH_ASSOC))
 {
     print($result['username']."<br>");
 }
?></p>
</div>
</aside>

-->

<script src="myjs.js" ></script>

</body>
</html>