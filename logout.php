<?php
session_start();
$myfile = fopen("Logout-DIARY.txt", a);
        	fwrite($myfile, $_SESSION["id"]);
        	fclose($myfile);
unset($_SESSION["id"]);
header( 'Location: ./' );
?>