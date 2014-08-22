<?php
	include('./conn.class.php');
	
	$id = $_POST['id'];
	$sql = 'SELECT title, content FROM article WHERE id = ' . $id;

	if ($result = mysqli_query($db->conn, $sql)) {
		while($row = mysqli_fetch_array($result)) {
			$data = $row['title'] . '&&&&&' . $row['content'];
			echo $data;
		}
	}
	else {
		echo 'query error!<br>' . mysqli_error($db->conn);
	}
?>