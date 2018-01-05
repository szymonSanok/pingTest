<?php
   include('session.php');
?>
<html>
   
   <head>
      <title>Welcome </title>
       <meta charset="utf-8">
   </head>
   
   <body>
      <h1>Welcome <?php echo $login_session; ?></h1> 
      <h2><a href = "logout.php">Sign Out</a></h2>
       
       <h2> Lista działań: </h2>
       <ul>
           <li><a href = "showlocation.php">Moje lokalizacje</a></li>
           <li><a href = "addlocation.php">Dodaj lokalizację</a></li>
           <li><a href = "removelocation.php">Usuń lokalizację</a></li>
           <li><a href = "logfile.php">Spis logów</a></li>
       </ul>
       
   </body>
   
</html>