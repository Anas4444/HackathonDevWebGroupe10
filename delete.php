<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $bd ="cll project";
 

  $link=mysqli_connect($servername,$username,$password,$bd);
     //Tu recuperes l'id du contact
     $id = $_GET["id"];
     //Requete SQL pour supprimer le contact dans la base
     mysqli_query($link ,"DELETE FROM `membres` WHERE id = ".$id);
     //Et la tu rediriges vers ta page contacts.php pour rafraichir la liste
?>