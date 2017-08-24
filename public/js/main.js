$(document).ready(function() {

	$('a.login-window').click(function() {
		
		// Getting the variable's value from a link 
		var loginBox = $('#modal');
		var action = $(this).attr('href');
		action = action.slice(1, action.length);

		if(action === 'login'){
			showLogin();
		}
		else if(action === 'regis'){
			showRegister();
		}	

		//Fade in the Popup and add close button
		$(loginBox).fadeIn(300);
		
		//Set the center alignment padding + border
		var popMargTop = ($(loginBox).height() + 24) / 2; 
		var popMargLeft = ($(loginBox).width() + 24) / 2; 
		
		$(loginBox).css({ 
			'margin-top' : -popMargTop,
			'margin-left' : -popMargLeft
		});
		
		// Add the mask to body
		$('body').append('<div id="mask"></div>');
		$('#mask').fadeIn(300);
		
		return false;
	});
	
	// When clicking on the button close or the mask layer the popup closed
	$('a.close, #mask').live('click', function() { 
	$('#mask , .login-popup').fadeOut(300 , function() {
		$('#mask').remove();  
	}); 
	return false;
	});

});

var ajaxPost = function(form, url, error = ''){
	$.ajax({   
		type: "post",
		dataType: "json",
		headers: { 
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
		},
		data: $(form).serialize(),
		url: url,
		success: function (data) {
			$('#mask , .login-popup').fadeOut(300 , function() {
				$('#mask').remove();  
			}); 
			setTimeout(function() {
				location.reload();
			}, 300);
		},
		error: function (data) {
			var jsonData = JSON.parse(data.responseText);
			var result = '';
			Object.keys(jsonData).forEach(function(key){
				result += '<div>' + jsonData[key] + '</div>';
			});
			$(error).html(result);
		}
	})
}

var showLogin = function(){
	var data = `
			<div class="error"></div>
			<form onsubmit="ajaxPost('#signin', '/login', '.error');return false;" id="signin" class="signin">
				<fieldset class="textbox">
					<label class="username">
						<span>Email</span>
						<input id="email" name="email" value="" type="text" autocomplete="on" >
					</label>

					<label class="password">
						<span>Password</span>
						<input id="password" name="password" value="" type="password">
					</label>

					<!-- <button class="submit button" type="button"></button> -->
					<div align="center">
						<button type="submit">Login</button>
						<br>
						<button type="button" onclick="window.location='/fb/redirect'" class="loginBtn loginBtn--facebook">
							Login with Facebook
						</button>
					</div>
				</fieldset>
			</form>
			`
	$('#modal-content').html(data);
}

var showCreateEvent = function(){
	var data = `
				<form method="post" class="signin" action="#">
					<fieldset class="textbox">
					<label class="username">
					<span>ชื่อจริงของคุณ</span>
					<input id="username" name="username" value="" type="text" autocomplete="on" >
					</label>
					
					<label class="surname">
					<span>นามสกุลของคุณ</span>
					<input id="password" name="password" value="" >
					</label>

					<label class="surname">
					<span>ชื่อเล่น</span>
					<input id="password" name="password" value="" >
					</label>

					<div id="one"></div> 
					<div id="two"></div> 
					<div id="three"></div>
						<br>
					<br>
					<img src="ICONWEBSITE KMUTTOPEN\Kmutt web prototype2-32.png" width="40%"/>
					</br>
							<p>
							คุณเคยจัดเเข่งหรือไม่?
							
							</p>
							<input type="radio" id="myRadio1">เคย
							
					</fieldset>
				</form>
				`
	$('#modal-content').html(data);
}

var showRegister = function(){
	var data = `
				<div class="error"></div>
				<form onsubmit="ajaxPost('#signup', '/register', '.error');return false;" id="signup" method="post" class="signin">
					<fieldset class="textbox">
					<label class="email">
						<span>Email</span>
						<input id="email" name="email" value="" type="text" autocomplete="on" >
					</label>
					
					<label class="password">
						<span>Password</span>
						<input id="password" name="password" value="" type="password">
					</label>
					
					<label class="confirmed-password">
						<span>Confirmed password</span>
						<input id="password-confirm" name="password_confirmation" value="" type="password">
					</label>

					<label class="name">
						<span>ชื่อจริง นามสกุล</span>
						<input id="name" name="name" value="" type="text" autocomplete="on" >
					</label>
					
					<div align="center">
						<button type="submit">Register</button>
						<br>
						<button type="button" onclick="window.location='/fb/redirect'" class="loginBtn loginBtn--facebook">
							Login with Facebook
						</button>
					</div>
					</fieldset>
				</form>
				`
	$('#modal-content').html(data);
}