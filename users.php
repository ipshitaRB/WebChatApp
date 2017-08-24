<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
	<head>
	
		<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
		<meta content="utf-8" http-equiv="encoding">
	</head>
	<body>
		<?php
        
            include 'constants.php';
            session_start();
            error_reporting(0);
            
			
			$connect=mysql_connect($db_host,$db_username,$db_password) or die($db_conn_fail);
			mysql_select_db($db_user_name) or die($db_no_exist);
			
			
			
			$query = "SELECT username FROM `".$db_user_table."` WHERE username !='".$_SESSION['username']."'";
				$result = mysql_query($query);
				$num=mysql_numrows($result);
                mysql_close($connect);
                
				if($result){
					$username[$num]='';
				
				for($i=0;$i<$num;$i++){
					$username[$i]=mysql_result($result,$i,"username");
				
					echo('<li class="friend" id="'.$username[$i].'">'.$username[$i].'</li><br/>');
				}
				}else{
					echo "";
				}
		?>
	</body>
</html>