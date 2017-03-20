<?php
ob_start();
session_start();
if($_SESSION['logged_in']!==true)
{
    header("location:Login.php");
    die();
}
else{
    $dbhandler = new PDO('mysql:host=localhost;dbname=mydata', 'root', 'bhargav');
//echo '1';
//$dbhandler = new PDO('mysql:host=localhost;dbname=Login', 'root', 'ashu1996');
//echo "Connection is established...<br/>";
$dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$setonline="INSERT INTO online VALUES('".$_SESSION['uname']."',1)";

if($_SESSION['online']!==true) //just for sanity check
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
</head>
<body>





<div class="chat_window">
    <div class="top_menu">
        <div class="buttons">
            <div class="button close"></div>
            <div class="button minimize"></div>
            <div class="button maximize"></div>
        </div>
        <div class="title"> <header> <div id="welcome">
Welcome <span id="user"><?php echo $_SESSION['uname']; ?>,</span></div>
  <a href="logout.php" >Logout</a>
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








<!--
   
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

<!--
<form id="msg">
    <input type="text" id="txt_msg"/>
    <input type="submit" value="send">
</form>

-->

<script>
    
    
    var xhttp;
    
    function loadmsg ()
    {
        xhttp= new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var msgs=JSON.parse(xhttp.responseText);
       for(var i=0;i < msgs.length;i++)
           {
               
               
               var div = document.createElement("p");
               div.setAttribute("id",msgs[i].sender);
               var text=document.createTextNode(msgs[i].message);
               div.appendChild(text);
               document.getElementById("chat_window").appendChild(div);
               if( String(msgs[i].sender) === String(<?php echo $_SESSION['uname']?>))
               {
                   alert("hekjedfklsjflk");
               }
           }
    }
  };
    
  
  xhttp.open("GET", "getmessages.php", true);
  xhttp.send();
    }
    
    $("document").ready(loadmsg);


    $("#send_message").click(
        function(){
            var txt=$("#txt_msg").val();
             $.ajax({
                 url:"sendmessage.php",
                 data:'data='+txt
             });
            loadmsg();
        }
    );
    
    (function () {
    var Message;
    Message = function (arg) {
        this.text = arg.text, this.message_side = arg.message_side;
        this.draw = function (_this) {
            return function () {
                var $message;
                $message = $($('.message_template').clone().html());
                $message.addClass(_this.message_side).find('.text').html(_this.text);
                $('.messages').append($message);
                return setTimeout(function () {
                    return $message.addClass('appeared');
                }, 0);
            };
        }(this);
        return this;
    };
    
    $(function () {
        var getMessageText, message_side, sendMessage;
        message_side = 'right';
        getMessageText = function () {
            var $message_input;
            $message_input = $('.message_input');
            return $message_input.val();
        };
        sendMessage = function (text) {
            var $messages, message;
            if (text.trim() === '') {
                return;
            }
            $('.message_input').val('');
            $messages = $('.messages');
            message_side = message_side === 'left' ? 'right' : 'left';
            message = new Message({
                text: text,
                message_side: message_side
            });
            message.draw();
            return $messages.animate({ scrollTop: $messages.prop('scrollHeight') }, 300);
        };
        $('.send_message').click(function (e) {
            return sendMessage(getMessageText());
        });
        $('.message_input').keyup(function (e) {
            if (e.which === 13) {
                return sendMessage(getMessageText());
            }
        });
        
    });
}.call(this));
       

</script>
</body>
</html>