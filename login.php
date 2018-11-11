<?php

// Start the session
session_start();

if($_SERVER['REQUEST_METHOD']=='POST') 
{
    $user = $_POST['username'];
    $passwd = $_POST['passwd'];
 //   $passwd = sha1($passwd);

    $db = new PDO('mysql:host=localhost;dbname=its','root','');

    $stmt = $db->query('SELECT username, password,id FROM users');

    //$jsonData = array();

    $login = false;

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
    {   

        if($row['username'] == $user && $row['password'] == sha1($passwd)) 
        {
        	$myfile = fopen("Login-DIARY.txt", a);
        	fwrite($myfile, $user);
        	fclose($myfile);
            $login = true;
            break;
        }
    }

    
    if($login) 
    {
    	$_SESSION["id"]=$_POST['username'];
        echo "Welcome to the site";
      header( 'Location: ./page1.php' );
    }

     else 
     {
        echo("Failed");
        echo $passwd;
    }
}
