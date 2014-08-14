<?php
	$con = mysqli_connect("localhost", "root", "", "blog") or die('Can not connect the database');
	
	$sql = "CREATE TABLE if Not Exists article
	(
		id varchar(15),
		time varchar(16),
		title varchar(80),
		content text
	)";

	if (mysqli_query($con, $sql)) {
		$sql = 'SELECT id, time, title FROM article';
		if($result = mysqli_query($con, $sql)) {
			while($row = mysqli_fetch_array($result))
    		{
        		$list = '<li class="list" id="l_' . $row['id'] . '" style="cursor:pointer;">'.
    		    '<h3 style="float:left;">' . $row['title'] . '</h3>'.
    		    '<p style="float:right;">' . $row['time'] . '</p>'.
    		    '</li>';
    		    echo $list;
    		}
		}
		else {
			$staute = "mysqli query error";
			echo $staute . '<br>';
			echo mysqli_error($con);
		}
	}
	else {
		$staute = "database initialize error";
		echo $staute . '<br>';
		echo mysqli_error($con);
	}
?>