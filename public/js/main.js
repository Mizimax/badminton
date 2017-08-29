$(document).ready(function() {
	$(document).on("click","a.login-window",function() {
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
		else if(action === 'guest'){
			showGuest();
		}
		else if(action === 'eventRegis'){
			showEventRegis();
		}

		//Body Overflow hidde
		$('body').css('overflow', 'hidden');

		//Fade in the Popup and add close button
		$(loginBox).fadeIn(300);
		
		// Add the mask to body
		$('body').append('<div id="mask"></div>');
		$('#mask').fadeIn(300);
		
		return false;
    });

	
	
	// When clicking on the button close or the mask layer the popup closed
	$('a.close, #mask').live('click', function() { 
	$('#mask , .login-popup').fadeOut(300 , function() {
		$('#mask').remove(); 
		$('body').css('overflow', 'auto'); 
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
				result += '<li>' + jsonData[key] + '</li>';
			});
			$(error).show();
			$(error+' .error').html(result);
		}
	})
}

var showLogin = function(){
	var data = `
			<div class="ui message red">
				<h5>Something wrong !</h5>
				<ul class="list error">
				</ul>
			</div>
			<form onsubmit="ajaxPost('#signin', '/login', '.ui.message');return false;" id="signin" class="signin">
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
						<button type="submit" class="ui primary button">
						ยืนยัน
						</button>
						<br><br>
						<button type="button" onclick="window.location='/fb/redirect'" class="loginBtn loginBtn--facebook ui button" style="width:100%;text-align:center">
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
				<div class="ui message red">
					<h5>Something wrong !</h5>
					<ul class="list error">
					</ul>
				</div>
				<form onsubmit="ajaxPost('#signup', '/register', '.ui.message');return false;" id="signup" method="post" class="signin">
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
						<span>ชื่อจริง</span>
						<input id="firstname" name="firstname" value="" type="text" autocomplete="on" >
					</label>

					<label class="name">
						<span>นามสกุล</span>
						<input id="lastname" name="lastname" value="" type="text" autocomplete="on" >
					</label>

					<label class="tel">
						<span>เบอร์ติดต่อ</span>
						<input id="tel" name="tel" value="" type="text" autocomplete="on" >
					</label>
					
					<div align="center">
						<button type="submit" class="ui primary button">
						ยืนยัน
						</button>
						<br><br>
						<button type="button" onclick="window.location='/fb/redirect'" class="loginBtn loginBtn--facebook ui button" style="width:100%;text-align:center">
							Login with Facebook
						</button>
					</div>
					</fieldset>
				</form>
				`
	$('#modal-content').html(data);
}

	var showEventRegis = function(){
		var data = `
				<form method="post" class="signin" action="#">
				<fieldset class="textbox">
				<label class="username">
				<span>ชื่อ</span>
				<input id="username" name="username" value="" type="text" autocomplete="on" >
				</label>
				
				<label class="surname">
				<span>นามสกุล</span>
				<input id="surname" name="surname" value="" type="text" autocomplete="on" >
				</label>

				<label class="phone">
				<span>เบอร์โทรศัพท์</span>
				<input id="phone" name="phone" value="" type="text" autocomplete="on">
				</label>

				<label class="prize">
				<span> เคยได้รางวัลที่เท่าไหร่</span>
				<input id="prize" name="prize" value="" type="text" autocomplete="on" >
				</label>

				<label class="select-pic">
						<span> อัพโหลดภาพผู้เเข่งขัน(ถ้ามี)</span>
						<button class="ui blue button">เลือกรูป</button>
				</label>

				
						<span>  เพศ</span>
						<button type="button" class="circular one ui icon button left attached ">
								ชาย
							</button>
							
							<button type="button" class="circular one ui icon button  right attached ">
							หญิง
							</button>

							<span>อายุ</span>
							<div class="ui input" style="width: 30px;">
									<input type="text" />
							</div>

							<div class="ui selection dropdown" id="dropdown-ranked">
									<input type="hidden" name="Ranked">
									<i class="dropdown icon"></i>
									<div class="menu">
									<div class="item" data-value="1"></div>
									</div>
								</div>
				

				<label class="username">
				<span>ชื่อ</span>
				<input id="username" name="username" value="" type="text" autocomplete="on" >
				</label>
				
				<label class="surname">
				<span>นามสกุล</span>
				<input id="surname" name="surname" value="" type="text" autocomplete="on" >
				</label>

				<label class="phone">
				<span>เบอร์โทรศัพท์</span>
				<input id="phone" name="phone" value="" type="text" autocomplete="on">
				</label>

				<label class="prize">
				<span> เคยได้รางวัลที่เท่าไหร่</span>
				<input id="prize" name="prize" value="" type="text" autocomplete="on" >
				</label>

				<label class="select-pic">
						<span> อัพโหลดภาพผู้เเข่งขัน(ถ้ามี)</span>
						<button class="ui blue button">เลือกรูป</button>
				</label>

				
						<span>  เพศ</span>
						<button type="button" class="circular two ui icon button left attached ">
								ชาย
							</button>
							
							<button type="button" class="circular two ui icon button  right attached ">
							หญิง
							</button>
							<span>อายุ</span>
							<div class="ui input" style="width: 30px;">
									<input type="text" />
							</div>
							<div class="ui selection dropdown" id="dropdown-ranked">
									<input type="hidden" name="Ranked">
									<i class="dropdown icon"></i>
									<div class="menu">
									<div class="item" data-value="1"></div>
									</div>
								</div>
				<div align="center">
			    <button class="ui red button" type="button">ยืนยัน</button>
				</div>
				</fieldset>
		</form>
		`
		$('#modal-content').html(data);
	}

	var showGuest = function(){
		var data = `
			<br>
			<div align="center" style="color:black">ไม่สามารถสมัครแข่งได้ เนื่องจากยังไม่ได้ล็อกอินเข้าสู่ระบบ</div>
			<br>
			<div align="center">
			<a href="#login" class="login-window ui primary button">
			เข้าสู่ระบบ
			</a>
			<a href="#regis" class="login-window ui blue button">
			สมัครสมาชิก
			</a>
			</div>
		`
		$('#modal-content').html(data);
	}