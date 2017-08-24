<?php
                            session_start();
                            include 'constants.php';
                            $connect = mysql_connect($db_host, $db_username, $db_password) or die($db_conn_fail);
                            mysql_select_db($db_user_name) or die($db_no_exist);

                            
                            $query = "UPDATE `".$db_user_table."` SET status = '0' WHERE username = '".$_SESSION['username']."'";
                            $db_return = mysql_query($query); 
                            session_unset(); 
                            session_destroy();
                            header('Location: index.php');      
                
                        ?>