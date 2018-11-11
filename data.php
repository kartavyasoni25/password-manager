<?php 
    session_start();
    $db = new PDO('mysql:host=localhost;dbname=its','root','');

    $stmt = $db->query('SELECT username, password,id FROM users');

    //$jsonData = array();

    $login = false;
    $count =0;
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
    {   

        if($row['username'] == $_SESSION["id"] ) 
        {
             $count=1;
             $username=$row['username'];
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
    if($_SERVER['REQUEST_METHOD']=='POST') 
{
    $account = $_POST['account'];
    $password = $_POST['password'];

    
   
}   
   

/*if (isset ($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response'])
{
    var_dump($_POST);
    $secret = "6LfntG0UAAAAAJ3ZOiY086t1YBoJKW2mJT6LZdHw";
    $ip = $_SERVER['REMOTE_ADDR'];
    $captcha = $_POST['g-recaptcha-response'];
    $rsp = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip=$ip");
    $arr = json_decode($rsp,TRUE);
    if($arr['success'])
    {
    echo 'Registration Successful';
    }
        else
        {
        echo 'Spam';
        }
    var_dump($rsp);
}*/
try {
    $conn = new PDO('mysql:host=localhost;dbname=its','root','');
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "INSERT INTO data  VALUES ('$username','$account','$password')";
    
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully\r\n";
  //  $headers = 'From: <webmaster@example.com>' . "\r\n";
   //  $headers = "From:" ;
 //  mail($email, "username,password", "This is for testing",$headers);
    echo "<br>";
    //echo $mail;
    //echo mail($email, "username,password", "This is for testing",$headers);
    //echo $conn;     
    
  //alert("you are successfully registered.");
      
   

    }


catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;

?>

    