<?php
include("config.php");
session_start();
$wynik = mysqli_query($db,"SELECT * FROM items");
//$row = mysqli_fetch_assoc($wynik);


function deactivate($db, $id, $active){
        if($active=="Tak"){
            $active="Nie";
        }elseif($active=="Nie"){
            $active="Tak";
        }
      $sql = "UPDATE items SET active='$active' WHERE id='$id'";
      $result = mysqli_query($db,$sql); 
    header('Location: '.$_SERVER['PHP_SELF']);
    die;
}

function delete($db, $id){
  $sql = "DELETE FROM items WHERE id='$id'";
  $result = mysqli_query($db,$sql); 
header('Location: '.$_SERVER['PHP_SELF']);
die;
}

  if (isset($_GET['active'])) {
      
    deactivate($db, $_GET['id'],$_GET['active']);
  }

  if (isset($_GET['del'])) {
    
  delete($db, $_GET['id']);
}

/* wyświetlenie nagłówka tabeli */ 
		echo "<table class=\"ex\" width=\"96%\" cellpadding=\"10\" border=1>"; 
		echo "<tr class=\"bold\">"; 
		echo "<td>".'ID'."</td>";
		echo "<td>".'Nazwa'."</td>"; 
        echo "<td>".'Adres'."</td>";
        echo "<td>".'Port'."</td>";
        echo "<td>".'Timeout'."</td>";
		echo "<td>".'Częstotliwość'."</td>";
        echo "<td>".'Aktywna'."</td>";
        echo "<td>".'Sprawdź'."</td>";
        echo "<td>".'Usuń'."</td>";
		echo "</tr>"; 

/* wyświetlenie zawartości tabeli */
do{	
	$row = mysqli_fetch_assoc($wynik);
    $test = $row['id'];
    if($test==NULL){
        break;
    }
    if($row['active']=="Nie"){   
        echo "<tr style=".'color:gray'.">"; 
        $disable = "";
    }else
    {
        echo "<tr style=".'color:black'.">";
        $disable = "Sprawdź";
    }
		echo "<td>".$row['id']."</td>";
		echo "<td>".$row['name']."</td>"; 
        echo "<td>".$row['adress']."</td>";
        echo "<td>".$row['port']."</td>";
        echo "<td>".$row['timeout']."</td>";
		echo "<td>".$row['freq']."</td>";
        echo "<td><a href=".'showlocation.php?id='.$row['id'].'&active='.$row['active'].''.">".$row['active']."</td>";
        echo "<td><a href=".'ping.php?adress='.$row['adress'].'&port='.$row['port'].'&timeout='.$row['timeout'].'&freq='.$row['freq'].''." target=".'_blank'.">$disable</a></td>";
        echo "<td><a href=".'showlocation.php?id='.$row['id'].'&del='.'del'.''."><img src=".'remove.png'." width=".'20px'."/></a></td>";
        //echo "<td><form action=".''." method=".'post'."><input type = ".'button'." name = ".'test'." onclick = ".'deactivate('.$row['id'].','.$row['active'].')'." value = ".' Klik '."/><br /></form></td>";
		echo "</tr>"; 
    
    
} while(!$test==NULL);
echo "</table>";
    

?> 
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <a href="welcome.php">Wróć -></a>
</html>