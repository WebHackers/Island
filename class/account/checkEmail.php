<?php
	include('../conn.class.php');

	$email = $_POST['email'];

	if($email != ""){
		$sql = "CREATE TABLE if Not Exists user
		(
			userName varchar(17),
			email varchar(21),
			password varchar(19)
		)";
		
		if (mysqli_query($db->conn, $sql)) {
			$sql = "SELECT email FROM user WHERE email = '$email'";
			$result = mysqli_query($db->conn, $sql);

			if(mysqli_num_rows($result)) {
				echo 'n';
			}
			else {
				echo 'y';
			}
		}
	}
?>