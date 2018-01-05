<?php

include("config.php");
include("session.php");

$file = 'log.txt';
$current = file_get_contents($file);
$adresemail = 'kontakt@sanokreklama.pl';
$charset = "Content-Type: text/html; charset=UTF-8";

function ping($host,$port,$timeout){
        echo("skrypt");
        
        $fsock = fsockopen($host, $port, $errno, $errstr, $timeout);
        if ( ! $fsock )
        {
                return FALSE;
        }
        else
        {
                return TRUE;
        }

}

for(;;){

$up = ping($_GET['adress'],$_GET['port'],$_GET['timeout']);

        if($up==1){     
                $current .= $_GET['adress'] . " DZIALA " . date('h:i:s') . "\n";
                // mail($adresemail, "Ping test", "$current", "FROM: szymus_k4a@wp.pl");                 
        }
        else{   
              
                $current .= $_GET['adress'] . " NIE DZIALA " . date('h:i:s') . "\n"; 
                mail($adresemail, "Ping test", "$current", "FROM: szymus_k4a@wp.pl");   
        }
        file_put_contents($file, $current);
        sleep($_GET['freq']*60);
}

?>

<html>
    <head>
        <meta charset="utf-8">
    </head>
    <h2>Nie zamykaj karty, skrypt działa</h2>
</html>