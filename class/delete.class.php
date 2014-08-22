<?php
	include('./conn.class.php');
	$id = $_POST['id'];
	$sql = 'DELETE FROM article WHERE id =' . $id;

	if(mysqli_query($db->conn, $sql)) {
		echo 'Delete success';
	}
	else {
		echo mysqli_error($db->conn);
	}
?>