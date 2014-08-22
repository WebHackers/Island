<?php
	include('./class/conn.class.php');

	$sql = "CREATE TABLE if Not Exists article
	(
		id varchar(15),
		time varchar(16),
		title varchar(80),
		content text
	)";

	if (mysqli_query($db->conn, $sql)) {
		$sql = 'SELECT id, time, title FROM article';
		if($result = mysqli_query($db->conn, $sql)) {
			while($row = mysqli_fetch_array($result))
    		{
        		$list = '<li class="list">' .
    		    '<p class="title" id="t_' . $row['id'] . '">' . $row['title'] . '</p>' .
    		    '<p class="time">' . $row['time'] . '</p>' .
    		    '<p id="d_' . $row['id'] . '" onselectstart="return false" style="display:none;">Delete</p>' .
    		    '<p id="e_' . $row['id'] . '" onselectstart="return false" style="display:none;">Edit</p>' .
    		    '</li>';
    		    echo $list;
    		}
		}
		else {
			$staute = "mysqli query error";
			echo $staute . '<br>';
			echo mysqli_error($db->conn);
		}
	}
	else {
		$staute = "database initialize error";
		echo $staute . '<br>';
		echo mysqli_error($db->conn);
	}
?>