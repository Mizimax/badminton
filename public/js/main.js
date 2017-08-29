$(document).ready(function() {
	$(document).on("click","a.login-window",function() {
        // Getting the variable's value from a link 
		var loginBox = $('#modal');
		var path = window.location.pathname.split('/');
		var action = $(this).attr('href');
		var token = $('#token').attr('value');
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
			showEventRegis(path[2], token);
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
		$('body').css('overflow-y', 'auto'); 
	}); 
	return false;
	});

});

var ajaxPost = function(form, url, error = ''){
	$('.ui.primary.button').addClass('loading');
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
			$('.ui.primary.button').removeClass('loading');
			document.getElementById('error-box').scrollIntoView()
		}
	});
}

var ajaxGet = function(ele, url){
	$(ele).html('Loading...');
	$.ajax({   
		type: "get",
		dataType: "json",
		headers: { 
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
		},
		url: url,
		success: function (data) {			
			$(ele).html(data.data['Event_Status']);
		},
		error: function (data) {
			var jsonData = JSON.parse(data.responseText);
			$(ele).html(jsonData['action']);
		}
	});
}

var showLogin = function(){
	var data = `
			<div id="error-box" class="ui message red">
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
				<div id="error-box" class="ui message red">
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

	var showEventRegis = function(name, token = ''){
		var data = `
				<div id="error-box" class="ui message red">
					<h5>Something wrong !</h5>
					<ul class="list error">
					</ul>
				</div>
				<form id="event_regis" onsubmit="ajaxPost('#event_regis', '/api/event/${name}/regis?api_token=${token}', '.ui.message');return false;" method="post" class="signin">
				<fieldset class="textbox">
				<label class="team_name">
				<span>ชื่อทีม</span>
				<input id="team_name" name="team_name" value="" type="text" autocomplete="on" >
				</label>

				<h5 style="color:black">ผู้เล่นคนที่หนึ่ง</h5>
				<label class="username">
				<span>ชื่อ</span>
				<input id="first_name" name="first_name" value="" type="text" autocomplete="on" >
				</label>
				
				<label class="surname">
				<span>นามสกุล</span>
				<input id="last_name" name="last_name" value="" type="text" autocomplete="on" >
				</label>

				<label class="phone">
				<span>เบอร์โทรศัพท์</span>
				<input id="phone" name="phone" value="" type="text" autocomplete="on">
				</label>

				<label class="prize">
				<span> เคยได้รางวัลที่เท่าไหร่</span>
				<input id="prize" name="prize" value="" type="text" autocomplete="on" >
				</label>
				<span> อัพโหลดภาพผู้เเข่งขัน(ถ้ามี)</span>

				<label for="pic1" class="custom-file-upload">
				<a class="ui blue button small">เลือกรูป</a>
				<a id="result_1" class="result-pic font-small"></a>
				<input id="pic" name="pic" type="text" class="delete"/>
				</label>
				<input id="pic1" onchange="$('#result_1').html(this.files[0].name); $('#pic').val(this.files[0].name)" type="file"/>

				
					<input class="gender delete" type="radio" id="male1" name="gender" value="m">
					<input class="gender delete" type="radio" id="female1" name="gender" value="f">
						<span>เพศ</span>
						<button onclick="$('#male1').prop('checked', true)" type="button" class="circular one ui icon button left attached ">
							ชาย
						</button>
						
						<button onclick="$('#female1').prop('checked', true)" type="button" class="circular one ui icon button  right attached ">
						หญิง
						</button>

							<span>อายุ</span>
							<div class="ui input" style="width: 30px;">
									<input type="text" name="age" maxlength="2" />
							</div>
							<span>มือ</span>
							<select name="rank" class="ui fluid search dropdown">
							<option value="1">A</option>
							<option value="2">B+</option>
							<option value="3">B</option>
							<option value="4">C+</option>
							<option value="5">C</option>
							<option value="6">P+</option>
							<option value="7">P</option>
							<option value="8">P-</option>
							<option value="9">S</option>
							<option value="10">N</option>
							</select>
				<br>
				<h5 style="color:black">ผู้เล่นคนที่สอง</h5>

				<label class="username">
				<span>ชื่อ</span>
				<input id="first_name_2" name="first_name_2" value="" type="text" autocomplete="on" >
				</label>
				
				<label class="surname">
				<span>นามสกุล</span>
				<input id="last_name_2" name="last_name_2" value="" type="text" autocomplete="on" >
				</label>

				<label class="phone">
				<span>เบอร์โทรศัพท์</span>
				<input id="phone_2" name="phone_2" value="" type="text" autocomplete="on">
				</label>

				<label class="prize">
				<span> เคยได้รางวัลที่เท่าไหร่</span>
				<input id="prize" name="prize_2" value="" type="text" autocomplete="on" >
				</label>

				<span> อัพโหลดภาพผู้เเข่งขัน(ถ้ามี)</span>
				<label for="pic2" class="custom-file-upload">
				<a class="ui blue button small">เลือกรูป</a>
				<a id="result_2" class="result-pic font-small"></a>
				<input id="pic_2" name="pic_2" type="text" class="delete" />
				</label>
				<input name="pic2" id="pic2" onchange="$('#result_2').html(this.files[0].name); $('#pic').val(this.files[0].name)" type="file"/>

				
				<input class="gender_2 delete" type="radio" id="male2" name="gender_2" value="m" />
				<input class="gender_2 delete" type="radio" id="female2" name="gender_2" value="f" />
					<span>เพศ</span>
					<button onclick="$('#male2').prop('checked', true)" type="button" class="circular two ui icon button left attached ">
						ชาย
					</button>
					
					<button onclick="$('#female2').prop('checked', true)" type="button" class="circular two ui icon button  right attached ">
					หญิง
					</button>
							<span>อายุ</span>
							<div class="ui input" style="width: 30px;">
									<input type="text" name="age_2" maxlength="2" />
							</div>
							<span>มือ</span>
							<select name="rank_2" class="ui fluid search dropdown">
							<option value="1">A</option>
							<option value="2">B+</option>
							<option value="3">B</option>
							<option value="4">C+</option>
							<option value="5">C</option>
							<option value="6">P+</option>
							<option value="7">P</option>
							<option value="8">P-</option>
							<option value="9">S</option>
							<option value="10">N</option>
							</select>
						  <br>
				<div align="center">
			    <button class="ui primary button" type="submit">ยืนยัน</button>
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