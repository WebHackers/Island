
<?php
	session_start();
	if(isset($_SESSION['logined'])) {
		setcookie("logined", 1, time()+3600*24*15);
	}
	else {
		if(!empty($_COOKIE['logined'])) $_SESSION['logined'] = $_COOKIE['logined'];
		else header("Location:./");
	}
?>

<DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>Welcome</title>
	<script type="text/javascript" src="http://libs.baidu.com/jquery/2.1.1/jquery.min.js"></script>
</head>

<body>
	<p>Welcome</p>
	<button id="exit">Exit</button>

<script type="text/javascript">
	$('#exit').click(function() {
		$.get(
			'./class/account/exit.php',
			function(data) {
				if(data == 'y') {
					window.location.assign('./');
				}
				else {
					alert("Exit unsuccess");
				}
			}
		);
	});
</script>
</body>
</html>