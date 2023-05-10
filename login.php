<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="style2.css" />
</head>
<body>
<?php
require('config.php');
include("functions.php");
if (isset($_REQUEST['email'],$_REQUEST['password'])){
  $email = stripslashes($_POST['email']);
  $email = mysqli_real_escape_string($con, $email);

  $password = stripslashes($_POST['password']);
  $password = mysqli_real_escape_string($con, $password);

  $query = " SELECT * FROM `users` WHERE `email` = '".$email."' and `password` ='".$password."' LIMIT 1";
  $result = mysqli_query($con,$query) ;
  
  if($row = mysqli_fetch_assoc($result)){
    $_SESSION['id'] = $row['id'];
    $_SESSION['email'] = $row['email'];
    header("Location: accueil.php");
    exit;
  }else{ $message = "L'email ou le mot de passe est incorrect.";}
  
    
  
  mysqli_free_result($result);
  mysqli_close($con);

}
  
?>



<form class="box" action="" method="post" >
<div class="login">
		<div class="login-screen">
			<div class="app-title">
				<h1>Login</h1>
			</div>

			<div class="login-form">
				<div class="control-group">
				<input type="email" class="login-field" value="" placeholder="email" id="login-name" name ="email">
				<label class="login-field-icon fui-user" for="login-name"></label>
				</div>

				<div class="control-group">
				<input type="password" class="login-field" value="" placeholder="password" id="login-pass" name = "password">
				<label class="login-field-icon fui-lock" for="login-pass"></label>
				</div>

				<a class="btn btn-primary btn-large btn-block" href="#">login</a>
        <p class="box-register">Vous êtes nouveau ici? <a href="form.php">S'inscrire</a></p>
<?php if (! empty($message)) { ?>
    <p class="errorMessage"><?php echo $message; ?></p>
			</div>
		</div>
	</div>

<?php } ?>


</form>
</body>
</html>