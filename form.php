<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style3.css" />
</head>
<body>
<?php
session_start();
require('config.php');
require("functions.php");
if (isset($_REQUEST['firstname'], $_REQUEST['secondname'], $_REQUEST['email'], $_REQUEST['password'], $_REQUEST['telephone'], $_REQUEST['niveauetude'])){

  $firstname = stripslashes($_POST['firstname']);
  $firstname = mysqli_real_escape_string($con, $firstname);

  $secondname = stripslashes($_POST['secondname']);
  $secondname = mysqli_real_escape_string($con, $secondname);  
 
  $email = stripslashes($_POST['email']);
  $email = mysqli_real_escape_string($con, $email);
  
  $password = stripslashes($_POST['password']);
  $password = mysqli_real_escape_string($con, $password);

  $telephone = stripslashes($_POST['telephone']);
  $telephone = mysqli_real_escape_string($con, $telephone);

  $niveauetude = stripslashes($_POST['niveauetude']);
  $niveauetude = mysqli_real_escape_string($con, $niveauetude);
   $query = "INSERT INTO `users` ( firstname ,secondname, email , password , telephone, niveauetude)
              VALUES ('$firstname', '$secondname','$email', '$password', '$telephone', '$niveauetude')";
  
   $res = mysqli_query($con, $query);
    if($res){
      echo "<div class='sucess'>
             <h3>Vous êtes inscrit avec succès.</h3>
             <p>Cliquez ici pour vous <a href='login.php'>connecter</a>
             </p>
       </div>";
       header("Location: login.php");
       die;
       
    }
    else echo "prob";
    
    mysqli_close($con);
}
  
else{
?>
<form class="box" action="" method="post">
<form action="index.html" method="post">
      
      <h1>Sign Up</h1>
      
      <fieldset>
        <label for="firstname">Fist Name:</label>
        <input type="text" id="firstname" name="firstname">

        <label for="secondname">Second Name:</label>
        <input type="text" id="secondname" name="secondname">
        
        <label for="email">Email:</label>
        <input type="email" id="mail" name="email" required />


        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required />

        <label for="cpassword">Confirm password:</label>
        <input type="password" id="cpassword" name="cuser_password" required />

        <label for="cpassword">téléphone:</label>
        <input type="number" name="telephone"  required /></br>

        <label for="cpassword"> niveau d'etude:</label>
  <input type="text" name="niveauetude"  required /></br>
        
      </fieldset>
      
      <button type="submit">Sign Up</button>
  </form>
    <p class="box-register">Déjà inscrit? <a href="login.php">Connectez-vous ici</a></p>
</form>
<?php } ?>
</body>
</html>