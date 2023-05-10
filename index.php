<html>
 <head>
  <title>PHP-Test</title>
 </head>
 <body>
<form action="#" method="GET" >
  <button type="submit" name="consulter"> bouton </button>

  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $bd ="cll project";

  $link=mysqli_connect($servername,$username,$password,$bd);
  // consulter
  if (isset($_GET["consulter"])){
  	  $sql="select * from membres";
      $result=mysqli_query($link,$sql);
	  if (!$result)     
		die("Database access failed: " . mysqli_error()); 
    	//output error message if query execution failed 
      $rows = mysqli_num_rows($result); 
	// get number of rows returned 
    
	if ($rows) {     
    
	while ($row = mysqli_fetch_array($result)) {         
		echo 'Name: ' . $row['name'] . '<br>';        
		echo 'lastname: ' . $row['lastname'] . '<br>';         
		echo 'Email: ' . $row['email'] . '<br>';         
		echo 'Status: ' . $row['status'] . '<br>';

		echo "<form action='delete.php' method='GET'>";
		echo "<input name='id' style='visibility: hidden;' value='".$row['id']."'>";
		echo '<button >Suppprimer</button> '; 
		echo '</form>';
		}       
	}
  }
  ?>
</form>
  <button type="submit" name="bouton_ajoute"> ajouter </button>



<?php

 //ajouter
       if (isset($_POST['bouton_ajouter']))
      {
      mysqli_query('INSERT INTO membres (name,lastname,email,status) values ($_POST["name"],$_POST["lastname"],$_POST["email"],$_POST["status"])');
      }
// modifier
      if(isset($_POST['id'])){
      		if(strstr($_POST['id'], 'm')=='modif'){
      			$id=strstr($_POST['id'], 'm',true);

              	if (isset($_POST["modifier_name"])){
              		mysql_query("UPDATE membres SET name=$_POST[name] where id=".$id);
              	}
              	 if (isset($_POST["modifier_lastname"])){
              		mysql_query("UPDATE membres SET lastname=$_POST[lastname] where id=".$id);
              	}
              	if (isset($_POST["modifier_email"])){
              		mysql_query("UPDATE membres SET email=$_POST[email] where id=".$id );
              	}
              	if (isset($_POST["modifier_status"])){
              		mysql_query("UPDATE membres SET status=$_POST[status] where id=".$id );
              	}
          }
		}
     ?> 

 </body>
</html>