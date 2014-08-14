<?php
	include ('./conn.class.php');

	/**
	*comments.class.php   --   is blog module  to deal with the article comments
	*
	*version 0.1
	*@author   Tyln
	*@package class
	*/

	/**
	*@param       varchar 	 $id  		ID of this article review
	*@param       varchar 	 $time 		The published time of the article review
	*@param       varchar 	 $reviewer	The reviewer of the article review
	*@param       text 	 $content   	The content of the article review
	*/
	$id = $_POST['id'];
	$time = $_POST['time'];
	$reviewer=$_POST['reviewer'];
	$content = $_POST['content'];
	

	if($id==""||$time==""||$reviewer==""||$content=="") {
		echo "The parameter is undefined";
	}
	else{

		$sql = "CREATE TABLE if Not Exists comments
		(
			id varchar(15),
			time varchar(16),
			reviewer varchar(20),
			content text
		)";

		if (mysqli_query($db->conn, $sql)) {

			$sql = "INSERT INTO comments (id, time, reviewer, content)
			VALUES ('$id', '$time', '$reviewer', '$content')";

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