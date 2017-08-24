<?php

/**
 * @author Ipshita Roy Burman
 * @copyright 2015
 */
 
    /** for constant strings like const_username*/
    include 'constants.php';
    ?>
    <?php
   
    /** to avoid display of unnecessary warnings */
    
    $username = $_POST[$const_username];
    $password = $_POST[$const_password];
    /** if username or password is blank , ask user to re-enter */
    if($username == $const_empty || $password == $const_empty){
        die("Username/Password cannot be empty. Please enter a valid username/password. Thank you");
    }
    /** insert into database and proceed into chat application */
    else{
        $connect = mysql_connect($db_host, $db_username, $db_password) or die($db_conn_fail);
        mysql_select_db($db_user_name) or die($db_no_exist);
        $query = "SELECT * FROM`".$db_user_table."` WHERE username='".$username."'";
        $db_return = mysql_query($query);
        $num=mysql_numrows($db_return);
        
        if($num!=0){
            $checkpassword=mysql_result($db_return,0,"password");
            $checkstatus=mysql_result($db_return,0,"status");
            if($checkpassword==$password){
                session_start();
                if($checkstatus==0){
                //if(!isset($_SESSION['username'])){
                $_SESSION['username']=$username;
                
                $chat_files_path = "chat_files/".$username;
                $query = "UPDATE `".$db_user_table."` SET status = '1' WHERE username = '".$username."'";
                $db_return = mysql_query($query); 
                header('Location: chatbox.php');                
                }else{
                 die("User session is already active from another location");
                 header('Location: index.php');
                //header('Refresh: 3; URL=index.php');
                }
            }
            else{
                 die("Please enter a valid username/password. Thank you");
                 header('Refresh: 3; URL=index.php');
            }            
        }else{
            $query = "INSERT INTO `".$db_user_table."` (username,password,status,undecided) VALUES ('".$username."','".$password."','1','0')";
      		$db_return = mysql_query($query);
    		mysql_close($connect);   
            
            
            if($db_return){    
                session_start();
                $_SESSION['username']=$username;
                $chat_files_path = "chat_files/".$username;
                mkdir($chat_files_path);
                $query = "UPDATE `".$db_user_table."` SET status = '1' WHERE username = '".$username."'";
                $db_return = mysql_query($query); 
                header('Location: chatbox.php');
            }else{
                
                echo "Log In Failed. Try again";
 				header('Refresh: 3; URL=index.php');
            }
       }
        
    }
    
    

?>