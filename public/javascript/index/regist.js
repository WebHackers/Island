	var nameBool = false, emailBool = false, passwordBool = false, repeatBool = false;

	$.check = function() {
		if(nameBool && emailBool && passwordBool && repeatBool) {
			$('#regist').attr("disabled", false);
		}
		else {
			$('#regist').attr("disabled", true);
		}
	};

	$('[id^="re"]').focus(function() {
		$(this).next('span').html('');
	});

	$('#regName').blur(function() {              //check name
		var name = $('#regName').val();
		nameBool = false;
		$.check();

		if(name != '') {
			$('#nameSpan').html('<i class="uk-icon-spin"></i>');

			var t = /^[a-zA-Z\u4e00-\u9fa5][a-zA-Z0-9\d_\u4e00-\u9fa5]+/;
        	t.lastIndex = 0;
        	var len = name.replace(/^[\u4e00-\u9fa5]/,"aa").length;

        	if(len<3 || len>16) {
        		nameBool = false;
				$.check();
				$('#nameSpan').html('<i class="uk-icon-times"></i>&nbsp;name is not correct');
				return;
        	}

        	if(t.exec(name) != name) {
        		nameBool = false;
				$.check();
				$('#nameSpan').html('<i class="uk-icon-times"></i>&nbsp;name is not correct');
				return;
        	}

			$.post(
				'./class/account/checkName.php',
				{
					name: name
				},
				function(data) {
					if(data == 'y') {
						nameBool = true;
						$.check();
						$('#nameSpan').html('<i class="uk-icon-check"></i>');
					}
					else {
						nameBool = false;
						$.check();
						$('#nameSpan').html('<i class="uk-icon-times"></i>&nbsp;name have been taken');
					}
				}
			);
		}
		else {
			nameBool = false;
			$.check();
			$('#nameSpan').html('');
		}
	});

	$('#regEmail').blur(function() {             //check email
		var email = $('#regEmail').val();
		emailBool = false;
        $.check();

		if(email != '') {
			$('#emailSpan').html('<i class="uk-icon-spin"></i>');

			var t = /^[a-zA-Z0-9_]+@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)+/;
        	t.lastIndex = 0;
        	var str;

        	if(t.exec(email)) {
        		str = t.exec(email)[0];
        	}
        	else {
        		emailBool = false;
        		$.check();
				$('#emailSpan').html('<i class="uk-icon-times"></i>&nbsp;form is wrong');
				return;
        	}

        	if(str != email) {
        		emailBool = false;
        		$.check();
				$('#emailSpan').html('<i class="uk-icon-times"></i>&nbsp;form is wrong');
				return;
        	}

        	$.post(
				'./class/account/checkEmail.php',
				{
					email: email
				},
				function(data) {
					if(data == 'y') {
						emailBool = true;
						$.check();
						$('#emailSpan').html('<i class="uk-icon-check"></i>');
					}
					else {
						emailBool = false;
						$.check();
						$('#emailSpan').html('<i class="uk-icon-times"></i>&nbsp;Email have been taken');
					}
				}
			);
		}
		else {
			emailBool = false;
			$.check();
			$('#emailSpan').html('');
			return;
		}
	});

	$('#regPassword').blur(function() {          //check password
		var repeat = $('#repeat').val();
		var password = $('#regPassword').val();

		if(repeat != '') {
			$('#repeatSpan').html('<i class="uk-icon-spin"></i>');

			if(repeat != password) {
				repeatBool = false;
				$('#repeatSpan').html('<i class="uk-icon-times"></i>&nbsp;repeat error');
			}
			else {
				repeatBool = true;
				$('#repeatSpan').html('<i class="uk-icon-check"></i>');
			}
		}

		if(password != '') {
			$('#passSpan').html('<i class="uk-icon-spin"></i>');

			var t = /^[a-zA-Z0-9_]{6,18}/;
        	t.lastIndex = 0;

        	if(t.exec(password) == password) {
        		passwordBool = true;
				$('#passSpan').html('<i class="uk-icon-check"></i>');
        	}
        	else {
        		passwordBool = false;
				$('#passSpan').html('<i class="uk-icon-times"></i>&nbsp;form is wrong');
        	}
		}
		else {
			passwordBool = false;
			$('#passSpan').html('');
		}
		$.check();
	});

	$('#repeat').blur(function() {               //check repeat
		var repeat = $('#repeat').val();
		var password = $('#regPassword').val();

		if(repeat != '') {
			$('#repeatSpan').html('<i class="uk-icon-spin"></i>');

			if(repeat == password) {
				repeatBool = true;
				$('#repeatSpan').html('<i class="uk-icon-check"></i>');
			}
			else {
				repeatBool = false;
				$('#repeatSpan').html('<i class="uk-icon-times"></i>&nbsp;repeat error');
			}
		}
		else {
			repeatBool = false;
			$('#repeatSpan').html('');
		}
		$.check();
	});

	$('#regist').click(function() {              //post regist's information
		$(this).attr("disabled", true);
		$(this).html('Posting');

		var name = $('#regName').val();
		var email = $('#regEmail').val();
		var password = $('#regPassword').val();

		$.post(
			'./class/account/regist.php',
			{
				userName: name,
				email: email,
				password: password
			},
			function(data) {
				if(data == 'y') {
					window.location.assign('./testHome.php');
				}
				else {
					alert(data);
				}
			}
		);
	});