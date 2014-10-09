<?php
  //simple PHP login script using Session
  //start the session * this is important
  session_start();
   
  //login script
  if(isset($_REQUEST['ch']) && $_REQUEST['ch'] == 'login'){
   
  //give your login credentials here
  if($_REQUEST['uname'] == 'spravce' && $_REQUEST['pass'] == 'pavel123')
    $_SESSION['login_user'] = 1;
  else
    $_SESSION['login_msg'] = 1;
  }
   
  //get the page name where to redirect
  if(isset($_REQUEST['pagename']))
  $pagename = $_REQUEST['pagename'];
   
  //logout script
  if(isset($_REQUEST['ch']) && $_REQUEST['ch'] == 'logout'){
    unset($_SESSION['login_user']);
    header('Location:login.php');
  }
  if(isset($_SESSION['login_user'])){
    if(isset($_REQUEST['pagename']))
      header('Location:'.$pagename.'.php');
    else
      header('Location:index.php');
    } else{
?>
<!DOCTYPE html>
<html lang="cs">
  <head>	
    <title>CML</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="img/favicon.ico">
  	<link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-login.css" rel="stylesheet">
    <link href="css/bootstrap-edit.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
  </head>
  <body>
    <!-- navbar -->
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="navbar-brand"><div class="cml-title">CML <small>- <?php echo $_SERVER['HTTP_HOST'] ?></small></div></div>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="../index.php"><button type="button" class="btn btn-info navbar-btn">Náhled webu</button></a></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- end of navbar -->

    <!-- container -->
  	<div class="container">
      <div class="jumbotron">
    		<form class="form-signin" name="login_form" method="post" action="">
    			<h1 class="form-signin-heading">Přihlášte se</h1>
    			<input type="text" name="uname" id="uname" class="form-control" placeholder="Přihlašovací jméno" autofocus>
    			<input type="password" name="pass" id="pass" class="form-control" placeholder="Heslo">
    			
    			<?php
    				//display the error msg if the login credentials are wrong!
    				if(isset($_SESSION['login_msg'])){
    					echo '<div class="alert alert-danger">Špatné <strong>přihlašovací jméno</strong> nebo <strong>heslo</strong>!</div>';
    					unset($_SESSION['login_msg']);
    				}
    			?>
    			
    			<button class="btn btn-lg btn-primary btn-block" type="submit">Přihlásit se</button>
    			<input type="hidden" name="ch" value="login">
    			
    		</form>
      </div>

      <div class="footer">
        <p class="pull-left">© 2013 - CML v 1.0 beta</p>
        <p class="pull-right">developed by <a href="http://www.tarole.cz/deisgn">Tarole Design</a></p>
        <div class="clearfix"></div>
      </div>
    </div>
    <!-- end of container -->
  	
  	<?php } ?>
	
  </body>
</html>