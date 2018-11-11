<?php

if($_SERVER['REQUEST_METHOD']=='POST') 
{
    $first = $_POST['fname'];
    $last = $_POST['lname'];
    $email = $_POST['email'];
    $user = $_POST['uname'];
    $passwd = $_POST['passwd'];

    $db = new PDO('mysql:host=localhost;dbname=its','root','');

    $stmt = $db->query("INSERT into users values (null,\'".$user."\',\'".$passwd."\',\'".$first."\',\'".$last."\',\'".$email."\')");
    
    echo $first;
    echo $last;
    echo $email;
    echo $user;
    echo $passwd;
    if ($stmt === TRUE) 
    {
        echo "New record created successfully";
    }
     else
      {
        echo "Error: " . $stmt . "<br>" ;
      }
     
    //$jsonData = array();

    
}