<?php
    if($_SERVER['REQUEST_METHOD']=='POST') 
{
    $first = $_POST['fname'];
    $last = $_POST['lname'];
    $email = $_POST['email'];
    $user = $_POST['uname'];
    $passwd=$_POST['passwd'];
    $passwd = sha1($passwd);
    $sq=$_POST['sq'];
    $sa=$_POST['sa'];
   
}   


try {
    $conn = new PDO('mysql:host=localhost;dbname=its','root','');
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO users  VALUES (' ' ,'$user','$passwd','$first','$last','$email','$sq','$sa')";
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
    $site= "http://localhost:8080/kiku/index.html";
        $id_site = sha1($user); 
  $str = '&lt;a href=&quot;'.$site.'/'.$id_site  .'  &quot;&gt;Click here to Verify &lt;/a&gt;';
       echo html_entity_decode($str);
  //alert("you are successfully registered.");
  
   

    }


catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;

?>
