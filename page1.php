<?php

// Start the session


    session_start();
    $db = new PDO('mysql:host=127.0.0.1;dbname=its','root','');

    $stmt = $db->query('SELECT username FROM users');

    //$jsonData = array();

    $login = false;
    $count =0;
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
    {   

        if($row['username'] == $_SESSION["id"] ) 
        {
        	 $count=1; 
        	 echo "Hello ".$row['username'];
           // header( 'Location: ./page1.html' );
            break;
        }
    }

    
    if($count==0) 
    {
        echo $count;
    	header( 'Location: ./dont.html' );
    }

    ?>
<!DOCTYPE html>
<html>
<body>

<p>This is a paragraph.</p>
<p>This is another paragraph.</p>
<form method="POST" action="./data.php">
<input type="text" name="account" placeholder="Account name">
<input type="text" name="password" placeholder="password">
<button type="submit" id="sub">Submit</button>

<a href="display1.php">Display</a>
<a href="logout.php">Logout</a>

</body>
</html>

     

