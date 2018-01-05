<?php
include("config.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $id = mysqli_real_escape_string($db,$_POST['id']);
      
      $sql = "DELETE FROM items WHERE id='$id'";
      $result = mysqli_query($db,$sql);
      

   }
?>


<html>
    <head>
        <meta charset="utf-8">
        <title>Usuń lokalizacje</title>
    </head>
    
    <body>
        <form action = "" method = "post">
            <label>ID lokalizacji  :</label><input type = "text" name = "id" class = "box"/><br /><br />
            <input type = "submit" value = " Usuń "/><br />
        </form>
        
    <a href="welcome.php">Wróć -></a>

    </body>
    
</html>