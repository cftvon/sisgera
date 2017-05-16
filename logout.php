<?php

session_start();

//if (!isset($_SESSION["login"])){
	$_SESSION["nome"]		= "";
	$_SESSION["idperfil"]   = "";
	$_SESSION["perfil"] 	= "";
	$_SESSION["login"]	    = "";
    session_unset();
    
//}
//echo  "session".$_SESSION["login"];
session_destroy();
header("location: index.php");
        

?>
