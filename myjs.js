    var xhttp;
    $messages = $('#chat_window');
    
    function loadmsg ()
    {
        xhttp= new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var msgs=JSON.parse(xhttp.responseText);
       for(var i=0;i < msgs.length  ;i++)
           {
               
               
               var div = document.createElement("p");
               div.setAttribute("id",msgs[i].sender);
               div.setAttribute("class","mymessage");
               var s=document.createElement("h4");
               var name=document.createTextNode(msgs[i].sender);
               s.appendChild(name);
               var text=document.createTextNode("  : " +msgs[i].message);
               
               div.appendChild(s);
               div.appendChild(text);
               
               document.getElementById("chat_window").appendChild(div);
               
           }
    }
  };
    
  
  xhttp.open("GET", "getmessages.php", true);
  xhttp.send();
        var $t = $('#chat_window');
    $t.animate({"scrollTop": $('#chat_window')[0].scrollHeight}, "slow");
    }
    
    $("document").ready(loadmsg);


    $("#send_message").click(
        function(){
            var txt=$("#txt_msg").val();
             $.ajax({
                 url:"sendmessage.php",
                 data:'data='+txt
             });
            $("#txt_msg").val('');
            $('#chat_window p').empty()
            loadmsg();
            $('#chat_window').scrollTop($('#chat_window').height());
        }
    );
    window.setInterval(function() {
        $('#chat_window p').empty()
        loadmsg();
}, 2000); 
    
  