<?php
	include('./conn.class.php');
	
	$sql = 'SELECT title FORM article';
	$result = mysqli_connect($db->conn, $sql);
?>