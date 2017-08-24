<!--
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="Ipshita Roy Burman" />

	<title>ChitChat</title>
</head>

<body>
    
    <h1 style="text-align: center;">Have a chitchat !</h1>

    <form name="login" action="afterLogIn.php" method="post" style="text-align: center;" >
        Username : <input type="text" name="username"/><br />
        Password : <input type="password" name="password"/><br />
        <input type="submit" name="submit" value="Log in"/>
    </form>

</body>
</html>-->
<!DOCTYPE html>
<html>
  <head>
    <meta name="author" content="Ipshita Roy Burman" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  </head>

  <body>
   <?php
    session_start();

    if(isset($_SESSION['username'])){
     
                
                 
                header('Location: chatbox.php'); 
    }
    

?>
    <div class="container">
      <h2>Have a chitchat !</h2>
      <form class="form-horizontal" role="form" action="afterLogIn.php" method="post">
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Username:</label>
          <div class="col-sm-10">
            <input type="text" name="username"class="form-control" id="email" placeholder="Enter username">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Password:</label>
          <div class="col-sm-10">          
            <input type="password" class="form-control" name="password" placeholder="Enter password">
          </div>
        </div>
        
        <div class="form-group">        
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" name="submit" class="btn btn-default">Log in</button>
          </div>
        </div>
      </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
   
  </body>

</html>
