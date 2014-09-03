
$('#loginBtn').click(function() {
	var email = $('#loginEmail').val();
	var password = $('#loginPass').val();
	$(this).html('Logining');

	if(email != '' && password != '') {
		$.post(
			'./class/account/login.php',
			{
				email: email,
				password: password
			},
			function(data) {
				if(data == 'y') {
					window.location.assign('./testHome.php');
				}
				else {
					if(data == 'n1') {
						$('#loginTip').html('Password is wrong');
					}
					else {
						if(data == 'n2') $('#loginTip').html('Email is not exist');
						else $('#loginTip').html('Unexpect error');
					}
				}
			}
		);
	}
	else {
		$('#loginTip').html('please input email and password');
	}
});