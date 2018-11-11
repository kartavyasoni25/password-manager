<?php
session_start();
	$pass1="";
	$pass2="";
	$email="";
	$db = new PDO('mysql:host=localhost;dbname=its','root', '');
	if (isset($_POST["submit"]))
	{
		$stmt = $db->query('SELECT email FROM users');
		$psw=($_POST["psw"]);
		$psw1=($_POST["psw1"]);
		$email=($_POST["email"]);
		$changepass = false;

		$pass1 = SHA1($psw);
		$pass2 = SHA1($psw1);
		if($pass1 == $pass2)
		{
		//while($row = $stmt->fetch(PDO::FETCH_ASSOC))
			//if($row['email'] == $email)
				
					$sql = "UPDATE users SET password = '{$pass1}' WHERE email = '{$email}'";
					$stmt  = $db->prepare($sql);
					$stmt -> execute();
					$changepass = true;
		}
		 if($changepass) {
        header('Location: ./index.html');
        exit();
    }
     else {
        echo("Failed");
        echo $psw1;
    }

	}
