<?php

// Start the session


    session_start();
    $db = new PDO('mysql:host=localhost;dbname=its','root','');

    $stmt = $db->query('SELECT username, password,id FROM admin');

    //$jsonData = array();

    $login = false;
    $count =0;
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
    {   

        if($row['username'] == $_SESSION["id"] ) 
        {
        	 $count=1;
        	 echo "Hello i am here\r\n";

             echo "This are Login logs\r\n";
             $myfile=fopen("Login-DIARY.txt", "r");
             while(!feof($myfile)) 
             {
                echo fgets($myfile) . "<br>";
             }
             fclose($myfile);
             echo "This are output logs\n";
             $myfile=fopen("Logout-DIARY.txt", "r");
             while(!feof($myfile)) 
             {
                echo fgets($myfile) . "<br>";
             }
             fclose($myfile);

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
<a href="logout.php">Logout</a>

</body>
</html>

     

