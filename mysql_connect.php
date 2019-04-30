<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chimie";



$connection=mysqli_connect($servername,$username,$password,$dbname);

if(!$connection)
{
	die('Erreur de connexion :'. mysqli_connect_error);
}

if (!mysqli_select_db ($connection,'chimie'))
{
	echo 'Base de connées non selectionnée';
}

?>