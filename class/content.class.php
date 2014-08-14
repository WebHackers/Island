<?php
	$con = mysqli_connect("localhost", "root", "", "blog") or die('Can not connect the database');
	
	$id = $_GET['id'];
	$sql = 'SELECT time, title, content FROM article WHERE id = ' . $id;
	if ($result = mysqli_query($con, $sql)) {
		while ($row = mysqli_fetch_array($result)) {
			echo '<h2>' . $row['title'] . '</h2>';
			echo $row['content'];
			echo '<p style="float:right">' . $row['time'] . '</p>';
		}
	}
	else {
		echo 'query error!<br>';
		echo mysqli_error($con);
	}
?>