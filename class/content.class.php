<?php
	include('./class/conn.class.php');
	
	$id = $_GET['id'];
	$sql = 'SELECT time, title, content FROM article WHERE id = ' . $id;
	
	if ($result = mysqli_query($db->conn, $sql)) {
		while ($row = mysqli_fetch_array($result)) {
			echo '<h4>' . $row['title'] . '</h4>';
			echo $row['content'];
			echo '<p style="float:right">' . $row['time'] . '</p>';
		}
	}
	else {
		echo 'query error!<br>';
		echo mysqli_error($db->conn);
	}
?>
