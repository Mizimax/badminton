$(document).ready(function() {
	$(document).on("click","a.login-window",function() {
        // Getting the variable's value from a link 
		var loginBox = $('#modal');
		var path = window.location.pathname.split('/');
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
			showEventRegis(path[2]);
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
			document.getElementById('error-box').scrollIntoView();
		}
	});
}

var ajaxGet = function(ele, url, callback){
	// Loading element
	$(ele).html(`
	<div class="ui segment">
		<p></p>
		<div class="ui active dimmer">
		<div class="ui small loader"></div>
		</div>
	</div>
   `);
	$.ajax({   
		type: "get",
		dataType: "json",
		headers: { 
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
		},
		url: url,
		success: function (data) {			
			callback(data.data);
		},
		error: function (data) {
			var jsonData = JSON.parse(data.responseText);
			callback(error);
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
						<input required id="email" name="email" value="" type="text" autocomplete="on" >
					</label>

					<label class="password">
						<span>Password</span>
						<input required id="password" name="password" value="" type="password">
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
			`;
	$('#modal-content').html(data);
}

var showCreateEvent = function(){
	var data = `
				<form method="post" class="signin" action="#">
					<fieldset class="textbox">
					<label class="username">
					<span>ชื่อจริงของคุณ</span>
					<input required id="username" name="username" value="" type="text" autocomplete="on" >
					</label>
					
					<label class="surname">
					<span>นามสกุลของคุณ</span>
					<input required id="password" name="password" value="" >
					</label>

					<label class="surname">
					<span>ชื่อเล่น</span>
					<input required id="password" name="password" value="" >
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
							<input required type="radio" id="myRadio1">เคย
							
					</fieldset>
				</form>
				`;
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
						<input required id="email" name="email" value="" type="text" autocomplete="on" >
					</label>
					
					<label class="password">
						<span>Password</span>
						<input required id="password" name="password" value="" type="password">
					</label>
					
					<label class="confirmed-password">
						<span>Confirmed password</span>
						<input required id="password-confirm" name="password_confirmation" value="" type="password">
					</label>

					<label class="name">
						<span>ชื่อจริง</span>
						<input required id="firstname" name="firstname" value="" type="text" autocomplete="on" >
					</label>

					<label class="name">
						<span>นามสกุล</span>
						<input required id="lastname" name="lastname" value="" type="text" autocomplete="on" >
					</label>

					<label class="tel">
						<span>เบอร์ติดต่อ</span>
						<input required id="tel" name="tel" value="" type="text" autocomplete="on" >
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
				`;
	$('#modal-content').html(data);
}

	var showEventRegis = function(name){
		var data = `
				<div id="error-box" class="ui message red">
					<h5>Something wrong !</h5>
					<ul class="list error">
					</ul>
				</div>
				<form id="event_regis" onsubmit="ajaxPost('#event_regis', '/event/${name}/regis', '.ui.message');return false;" method="post" class="signin">
				<fieldset class="textbox">
				<label class="team_name">
				<span>ชื่อทีม</span>
				<input required id="team_name" name="team_name" value="" type="text" autocomplete="on" >
				</label>

				<h6 style="color:black">ชื่อของคุณ</h6>
				<label class="username">
				<span>ชื่อ</span>
				<input required id="first_name" name="first_name" value="" type="text" autocomplete="on" >
				</label>
				
				<label class="surname">
				<span>นามสกุล</span>
				<input required id="last_name" name="last_name" value="" type="text" autocomplete="on" >
				</label>

				<label class="phone">
				<span>เบอร์โทรศัพท์</span>
				<input required id="phone" name="phone" value="" type="text" autocomplete="on">
				</label>

				<label class="prize">
				<span> จำได้มั้ย คุณเคยได้รางวัลที่เท่าไหร่มา</span>
				<input required id="prize" name="prize" value="" type="text" autocomplete="on" >
				</label>
				<span> อัพโหลดภาพผู้เเข่งขัน(ถ้ามี)</span>

				<label for="pic1" class="custom-file-upload">
				<a class="ui blue button small">เลือกรูป</a>
				<a id="result_1" class="result-pic font-small"></a>
				<input required id="pic" name="pic" type="text" class="delete"/>
				</label>
				<input required id="pic1" onchange="$('#result_1').html(this.files[0].name); $('#pic').val(this.files[0].name)" type="file"/>

				
					<input required class="gender delete" type="radio" id="male1" name="gender" value="m">
					<input required class="gender delete" type="radio" id="female1" name="gender" value="f">
						<span>เพศ</span>
						<button onclick="$('#male1').prop('checked', true)" type="button" class="circular one ui icon button left attached ">
							ชาย
						</button>
						
						<button onclick="$('#female1').prop('checked', true)" type="button" class="circular one ui icon button  right attached ">
						หญิง
						</button>

							<span>อายุ</span>
							<div class="ui input" style="width: 30px;">
									<input required type="text" name="age" maxlength="2" />
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
				<h6 style="color:black">คู่ของคุณ</h6>

				<label class="username">
				<span>ชื่อ</span>
				<input required id="first_name_2" name="first_name_2" value="" type="text" autocomplete="on" >
				</label>
				
				<label class="surname">
				<span>นามสกุล</span>
				<input required id="last_name_2" name="last_name_2" value="" type="text" autocomplete="on" >
				</label>

				<label class="phone">
				<span>เบอร์โทรศัพท์</span>
				<input required id="phone_2" name="phone_2" value="" type="text" autocomplete="on">
				</label>

				<label class="prize">
				<span> จำได้มั้ย คุณเคยได้รางวัลที่เท่าไหร่มา</span>
				<input required id="prize" name="prize_2" value="" type="text" autocomplete="on" >
				</label>

				<span> อัพโหลดภาพผู้เเข่งขัน(ถ้ามี)</span>
				<label for="pic2" class="custom-file-upload">
				<a class="ui blue button small">เลือกรูป</a>
				<a id="result_2" class="result-pic font-small"></a>
				<input required id="pic_2" name="pic_2" type="text" class="delete" />
				</label>
				<input required name="pic2" id="pic2" onchange="$('#result_2').html(this.files[0].name); $('#pic').val(this.files[0].name)" type="file"/>

				
				<input required class="gender_2 delete" type="radio" id="male2" name="gender_2" value="m" />
				<input required class="gender_2 delete" type="radio" id="female2" name="gender_2" value="f" />
					<span>เพศ</span>
					<button onclick="$('#male2').prop('checked', true)" type="button" class="circular two ui icon button left attached ">
						ชาย
					</button>
					
					<button onclick="$('#female2').prop('checked', true)" type="button" class="circular two ui icon button  right attached ">
					หญิง
					</button>
							<span>อายุ</span>
							<div class="ui input" style="width: 30px;">
									<input required type="text" name="age_2" maxlength="2" />
							</div>
						  <br>
				<div align="center">
			    <button class="ui primary button" type="submit">ยืนยัน</button>
				</div>
				</fieldset>
		</form>
		`;
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
			<a style="margin-top:10px" href="#regis" class="login-window ui blue button">
			สมัครสมาชิก
			</a>
			</div>
		`;
		$('#modal-content').html(data);
	}