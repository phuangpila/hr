<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>ระบบ HR</title>

    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />  
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

  </head>

  <body>

	  <div id="login-page">
	  	<div class="container">
	  	
		      <form class="form-login" action="chk_login.php" method="POST">
		        <h2 class="form-login-heading">Login</h2>
		        <div class="login-wrap">
		            <input type="text" class="form-control" placeholder="User ID" name="user_name" >
		            <br>
		            <input type="password" name="pass_word" class="form-control" placeholder="Password">
		            <br>
		           <br>
		            <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> Login</button>
		            <hr>
		        </div>
		      </form>	  	
	  	
	  	</div>
	  </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/login-bg.jpg", {speed: 500});
    </script>


  </body>
</html>
