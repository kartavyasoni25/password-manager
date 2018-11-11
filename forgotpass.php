<?php

if($_SERVER['REQUEST_METHOD']=='POST') 
{
    $email = $_POST['email'];
    $sq = $_POST['sq'];
    $sa = $_POST['sa'];

    $db = new PDO('mysql:host=localhost;dbname=its','root','');

    $stmt = $db->query('SELECT email, sq ,sa FROM users');


    $login = false;

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
    {
        if($row['email'] == $email && $row['sq'] == $sq && $row['sa']==$sa) 
        {
            
            $login = true;
            break;
        }
    }

    if($login) 
    {
        header('Location: passchange.html');
        exit();
    }

    else {
        echo("Failed !!");
    }
}