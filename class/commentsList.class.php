<?php
	$con = mysqli_connect("localhost", "root", "", "blog") or die('Can not connect the database');

	/**
	*commentList.class.php   ---    is blog module  to deal with the List comments
	*
	*version 0.1
	*@package class
	*/

	 /*
	    此版本未经过测试可能存在bug或不能运行等问题,过两天重新发一份
	 */
	   
	$sql = 'SELECT * FROM comments';
	$result = mysqli_query($con, $sql);
	
	if($result){
		while($row = mysqli_fetch_array($result))  {
        	                	 echo 	"<article class="uk-comment">";
                                 	echo 	"<header class="uk-comment-header">";
                                 	//echo   "<img class="uk-comment-avatar" src="http://" alt="">";
                                 	echo  	"<h4 class="uk-comment-title">"$row['reviewer']"</h4>";
                                 	echo 	"<div class="uk-comment-meta">"$row['time']"</div>";
                                 	echo 	"</header>";
                                 	echo 	"<div class="uk-comment-body">";
                                 	echo 	"<p>"$row['content']"</p>";
                                 	echo 	"</div>";
                                 	echo 	"</article>";

   	 	}
   	 }else{
   	 	echo 'query error!<br>';
		echo mysqli_error($db->conn);
   	 }
?> 
