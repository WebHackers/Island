<?php
	session_start();//初始化session
	if (isset($_SESSION['logined']))
	{
		if($_SESSION['logined'] == 1) {
			header("Location:./testHome.php");
	 		exit();
		}
		else {
			session_destroy();
			setcookie("logined", '', time()-3600);
		}
	}
	else {
		if(!empty($_COOKIE['logined'])) {
			$_SESSION['logined'] = $_COOKIE['logined'];
			header("Location:./testHome.php");
	 		exit();
		}
	}
?>

<DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>Welcome</title>
	<link rel="stylesheet" type="text/css" href="./public/uikit/css/uikit.gradient.min.css">
	<script type="text/javascript" src="http://libs.baidu.com/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="./public/uikit/js/uikit.min.js"></script>

	<style type="text/css">
		.reg {
			margin: 10px 30px 10px 20px;
		}

		#loginPage {
			float: right;
			margin: 100px 100px 50px 50px;
		}

		.login {
			
		}

		#loginEmail {
			margin: 20px 30px 5px 30px;
		}

		#loginPass {
			margin: 5px 30px 20px 30px;
		}

		#loginBtn {
			margin: 0 10px 20px 30px;
		}

		#registBtn {
			margin: 0 0 20px 10px;
		}
	</style>
</head>

<body>
	<div style="width: 100%;height: 450px;background-color: #415065;">
		<form class="uk-form" id="loginPage">
    		<fieldset>
    			<div id="loginTip" style="height:20px;color:white;margin:0 0 0 30px"></div>
        		<input class="uk-form-large login" id="loginEmail" type="text" placeholder="Email"><br>
        		<input class="uk-form-large login" id="loginPass" type="password" placeholder="Password"><br>
     			<button class="uk-button" id="loginBtn" type="button">Login</button>
     			<button class="uk-button" id="registBtn" type="button" data-uk-modal="{target:'#regPage'}">Regist</button>
    		</fieldset>
		</form>
	</div>
	<!-- the dialog page for regist -->
	<a href="#regPage" data-uk-modal></a>

	<div id="regPage" class="uk-modal">
		<div class="uk-modal-dialog">
    	    <a class="uk-modal-close uk-close"></a>

    	    <div class="uk-grid">
    	    	<div class="uk-width-1-5"><br></div>
    	    	<div class="uk-width-4-5">
    	    		<form class="uk-form">
    	    			<legend style="width: 60%;">Regist</legend>
						<input class="reg uk-form-width-medium" id="regName" type="text" placeholder="User Name" data-uk-tooltip="{pos:'left'}" title="3-16 chars (A-z0-9_)">
						<span id="nameSpan"></span><br>

						<input class="reg uk-form-width-medium" id="regEmail" type="text" placeholder="Email" data-uk-tooltip="{pos:'left'}" title="You will login with it">
						<span id="emailSpan"></span><br>

						<input class="reg uk-form-width-medium" id="regPassword" type="password" placeholder="Password" data-uk-tooltip="{pos:'left'}" title="6-18 chars (A-z0-9_)">
						<span id="passSpan"></span><br>

						<input class="reg uk-form-width-medium" id="repeat" type="password" placeholder="Repeat Password" data-uk-tooltip="{pos:'left'}" title="Repeat you key">
						<span id="repeatSpan"></span><br>

						<button class="uk-button reg" id="regist" type="button" disabled data-uk-tooltip="{pos:'left'}" title="Regist now">Regist</button>

					</form>
				</div>
			</div>
		</div>
	</div>

<script type="text/javascript" src="./public/javascript/index/regist.js"></script>
<script type="text/javascript" src="./public/javascript/index/login.js"></script>
</body>
</html>