<?php
	include('../conn.class.php');

	$name = $_POST['name'];

	if($name != "") {
		$sql = "CREATE TABLE if Not Exists user
		(
			userName varchar(17),
			email varchar(21),
			password varchar(19)
		)";

		if(mysqli_query($db->conn, $sql)) {
			$sql = "SELECT userName FROM user WHERE userName = '$name'";
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