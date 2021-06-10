<?php
$server="localhost";
$usuario="root";
$contraseña="";
$bd="galeria";
$mysqli=new mysqli($server, $usuario,$contraseña,$bd);

if($mysqli){
    echo "Todo correcto";
}
?>