<?php
	include('../conn.class.php');
	session_start();

	$userName = $_POST['userName'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	if($userName==""||$email==""||$password=="") {
		echo "The parameter is undefined";
	}
	else{

		$sql = "CREATE TABLE if Not Exists user
		(
			userName varchar(17),
			email varchar(21),
			password varchar(19)
		)";

		if (mysqli_query($db->conn, $sql)) {

			$sql = "INSERT INTO user (userName, email, password)
			VALUES ('$userName', '$email', '$password')";

			if($result = mysqli_query($db->conn, $sql)) {
				$_SESSION['logined'] = 1;
				echo 'y';
			}
			else {
				echo mysqli_error($db->conn);
			}
		}
	}
?>