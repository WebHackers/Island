<?php
	include('./conn.class.php');
	
	$sql = 'SELECT text FROM article where articleid = *******';
	$result = mysqli_query($db->conn, $sql);
?>