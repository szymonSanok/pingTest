<?php
include("config.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $name = mysqli_real_escape_string($db,$_POST['name']);
      $adress = mysqli_real_escape_string($db,$_POST['adress']);
      $port = mysqli_real_escape_string($db,$_POST['port']);
      $timeout = mysqli_real_escape_string($db,$_POST['timeout']);
      $freq = mysqli_real_escape_string($db,$_POST['freq']);
      
      $sql = "INSERT INTO items (name, adress, port, timeout, freq, active) VALUES ('$name','$adress','$port','$timeout','$freq','Tak');";
      $result = mysqli_query($db,$sql);
      header('Location: welcome.php');
   }
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Dodaj lokalizacje</title>
        <style>
            form{
                margin: 100px 0 0 100px;
            }

            form label{
                font-size: 1.3em;
                width: 180px;
            }

            .tooltip {
                position: relative;
                display: inline-block;
            }

            .tooltip .tooltiptext {
                visibility: hidden;
                width: 180px;
                background-color: #555;
                color: #fff;
                text-align: center;
                border-radius: 6px;
                padding: 5px 0;
                position: absolute;
                z-index: 1;
                bottom: 125%;
                left: 50%;
                margin-left: -60px;
                opacity: 0;
                transition: opacity 1s;
            }

            .tooltip .tooltiptext::after {
                content: "";
                position: absolute;
                top: 100%;
                left: 50%;
                margin-left: -5px;
                border-width: 5px;
                border-style: solid;
                border-color: #555 transparent transparent transparent;
            }

            .tooltip:hover .tooltiptext {
                visibility: visible;
                opacity: 1;
            }
        </style>
    </head>
    
    <body>
        <form action = "" method = "post">
            <label class="tooltip">Nazwa własna  :<span class="tooltiptext">Nasza nazwa dla strony</span></label><input type = "text" name = "name" class = "box"/><br /><br />
                
            <label class="tooltip">Adres  :<span class="tooltiptext">Dokładny adres naszego serwera</span></label><input type = "text" name = "adress" class = "box" /><br/><br />
                
            <label class="tooltip">Port  :<span class="tooltiptext">Port serwera (domyślnie 80)</span></label><input type = "text" value="80" name = "port" class = "box" /><br/><br />
                
            <label class="tooltip">Timeout(ms) :<span class="tooltiptext">Dozwolony czas oczekiwania<br/> na odpowiedź serwera w ms</span></label><input type = "text" name = "timeout" class = "box" /><br/><br />
                
            <label class="tooltip">Częstotliwość(min)  :<span class="tooltiptext">Co jaki czas ma być uruchamiany skrypt</span></label><input type = "text" name = "freq" class = "box" /><br/><br />
            <input type="hidden" name="resulturl" value="welcome.php">  
            <input type = "submit" value = " Dodaj "/>

            <!-- <a href="cron.php">Run</a> -->
            <!-- <a href="welcome.php">Wróć -></a> -->
        </form>
        
    

    </body>
    
</html>