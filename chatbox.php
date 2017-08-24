<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
	<head>
	
		<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
		<meta content="utf-8" http-equiv="encoding">
   	    <meta http-equiv="content-type" content="text/html" />
        <meta name="author" content="Ipshita Roy Burman" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="chatbox.css" />
</head>
    
    <body>
    <?php
    session_start();
    error_reporting(0);
    /**
    * @author Ipshita Roy Burman
    * @copyright 2015
    */

    ?>
    <script type="text/javascript">
			var username=<?php echo json_encode($_SESSION['username']); ?>;
			var href;
			var chat_files_path='';
			var clicked=0;
		
			
			
			$(document).ready(function(){
				
                $("#user").text(username+"\t");
                $("#greeting").text("Hello, "+username+"\t");
              		$("#send").click(function(e){
				
					$.post('message_update.php',{message:messageform.msg.value,selected_user:href});
					$("#msg").val('');
					return false;
				});				
				
                
                var loadLog = function(){
				if(clicked==1){
						$.ajax({
							url: chat_files_path ,cache: false,success: function(html){
								$("#chat_area").html(html);
								var newscrollHeight = $("#chat_area").attr("scrollHeight") - 20;
								//if(newscrollHeight > oldscrollHeight){
//									$("#chat_area").animate({ scrollTop: newscrollHeight }, 'normal'); 
//								}
							},
						});
					}
				};
                
                /**
                 * refreshes the chat area every 2 seconds
                 */
                setInterval (loadLog, 2000);
                
				$("#user_list li").on("click", function (e) {
				    clicked=1;
					href = $(this).attr("id");
                    $("#other_user_name").html(href);
					username=<?php echo json_encode($_SESSION['username']); ?>;
					chat_files_path ="chat_files/"+username+"/"+href+".html";
					$(this).css("background-color: #0098db;")
					loadLog();

				});
				
				$("#logout").click(function(){
                   var exit = confirm("Are you sure you want to end the session?");
                    if(exit==true){
                        window.location = 'logout.php';
                        }
				});
				
				});
			
		</script>
        <div id="logout"><input type="button" value="Sign Out" class="btn btn-warning"></div></br>
        
            <div id="onlineUsersList">
				<ul id="user_list">
					<?php
                    
                        /**
                         * pops the user list from the database
                         */
						include 'users.php';
					?>
				</ul>
			</div>
            
            
            <div id="message_area" align="center">
            <h1 id="greeting"></h1></br>
            <div id="other_user_name"></div></br>
            <div id="chat_area"></div></br>
			
            <div id="msg_window" align="center">
            
				<form name="messageform" action="">
					<span id = "user"></span><input name="msg" type="text" id="msg" size="85%"/>
					<input name="send" type="submit" id="send" value="Send" class="btn btn-success"/>
				</form>
			
            </div>
            </div>
    </body>

</html>