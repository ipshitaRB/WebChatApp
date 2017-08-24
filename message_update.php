<?php

        /**
        * @author Ipshita Roy Burman
        * @copyright 2015
        */
        session_start();
	    /** retrieving chat and chat buddy's name from chatbox.php*/   
		$chat = $_POST['message'];
		$other_user = $_POST['selected_user'];
        
		$userfile=$_SESSION['username'];
		
        /** Creating two separate chat files for both the users with the same content and saving those under their indiivdual folders */
        $chat_files_path="chat_files/".$userfile."/".$other_user.".html";
		$fp = fopen($chat_files_path, 'a');
		fwrite($fp, "<div class='msgln'>(".date("g:i A").") <b>".$_SESSION['username']."</b>: ".stripslashes(htmlspecialchars($chat))."<br></div>");
		$chat_files_path="chat_files/".$other_user."/".$userfile.".html";
		$fp = fopen($chat_files_path, 'a');
		fwrite($fp, "<div class='msgln'>(".date("g:i A").") <b>".$_SESSION['username']."</b>: ".stripslashes(htmlspecialchars($chat))."<br></div>");
		fclose($fp);
	
?>
