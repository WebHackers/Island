<?php
	include('./conn.class.php');
	
	$id = $_POST['id'];
	$time = $_POST['time'];
	$title = $_POST['title'];
	$content = $_POST['content'];

	if($id==""||$time==""||$title==""||$content=="") {
		echo "The parameter is undefined";
	}
	else{

		$sql = "CREATE TABLE if Not Exists article
		(
			id varchar(15),
			time varchar(16),
			title varchar(80),
			content text
		)";

		if (mysqli_query($db->conn, $sql)) {

			$sql = "INSERT INTO article (id, time, title, content)
			VALUES ('$id', '$time', '$title', '$content')";

			if($result = mysqli_query($db->conn, $sql)) {
				echo 'ok';
			}
			else {
				echo mysqli_error($db->conn);
			}
		}
		else {
			echo mysqli_error($db->conn);
		}
	}
?>