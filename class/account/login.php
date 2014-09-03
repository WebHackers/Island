<?php
	include('../conn.class.php');
	session_start();

	$email = $_POST['email'];
	$password = $_POST['password'];

	if($email==""||$password=="") {
		echo "The parameter is undefined";
	}
	else{
		$sql = "SELECT password FROM user WHERE email = '$email'";
		$result = mysqli_query($db->conn, $sql);

		if($row = mysqli_fetch_array($result)) {
			if($row['password'] == $password) {
				$_SESSION['logined'] = 1;
				echo 'y';
			}
			else {
				echo 'n1';
			}
		}
		else {
			echo 'n2';
		}
	}
?>