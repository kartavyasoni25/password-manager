<?php

// Start the session

    session_start();
   
    $db = new PDO('mysql:host=localhost;dbname=its','root','');

    $stmt = $db->query('SELECT account, password,username FROM data');

    //$jsonData = array();

    $login = false;
    $count =0;
    echo "account ";
    echo "\n\n";
    echo "password";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>"; 
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
    {   
       if($row['username'] == $_SESSION["id"] )
       {
      echo $row['account'];
      
      echo "\n\n\n";    
      echo $row['password'];
      
      echo "<br>";
        }
    }