@extends('layouts.app')
@section('title', 'Event')
@section('style')
<link rel="stylesheet" type="text/css" href="css/demo.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="canonical" href="http://www.alessioatzeni.com/wp-content/tutorials/jquery/login-box-modal-dialog-window/index.html" />
<style>
    body {
    	background-image: url("images/mainbackground.png");
    	-webkit-background-size: cover;
    	-moz-background-size: cover;
    	-o-background-size: cover;
    	background-size: cover;
    }

    .container {
    	width: 960px;
    	margin: 0 auto;
    	overflow: hidden;
    }

    #content {
    	float: left;
    	width: 100%;
    }

    .post {
    	margin: 0 auto;
    	padding-bottom: 50px;
    	float: left;
    	width: 960px;
    }

    .btn-sign {
    	width: 460px;
    	margin-bottom: 20px;
    	margin: 0 auto;
    	padding: 20px;
    	border-radius: 5px;
    	background: -moz-linear-gradient(center top, #00c6ff, #018eb6);
    	background: -webkit-gradient(linear, left top, left bottom, from(#00c6ff), to(#018eb6));
    	background: -o-linear-gradient(top, #00c6ff, #018eb6);
    	filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='#00c6ff', EndColorStr='#018eb6');
    	text-align: center;
    	font-size: 36px;
    	color: #fff;
    	text-transform: uppercase;
    }

    .btn-sign a {
    	color: #fff;
    	text-shadow: 0 1px 2px #161616;
    }

    #mask {
    	display: none;
    	background: #000;
    	position: fixed;
    	left: 0;
    	top: 0;
    	z-index: 10;
    	width: 100%;
    	height: 100%;
    	opacity: 0.8;
    	z-index: 999;
    }

    .login-popup {
    	display: none;
    	background: white;
    	padding: 10px;
    	float: left;
    	font-size: 1.2em;
    	position: fixed;
    	top: 50%;
    	left: 50%;
    	z-index: 99999;
    	border-radius: 10px 10px 10px 10px;
    	-moz-border-radius: 10px;
    	-webkit-border-radius: 10px;
    }

    img.btn_close {
    	float: right;
    	margin: -28px -28px 0 0;
    }

    fieldset {
    	border: none;
    }

    form.signin .textbox label {
    	display: block;
    	padding-bottom: 7px;
    }

    form.signin .textbox span {
    	display: block;
    }

    form.signin p,
    form.signin span {
    	color: black;
    	font-size: 11px;
    	line-height: 18px;
    }

    form.signin .textbox input {
    	background: #d0d1ce;
    	border-bottom: 1px solid#d0d1ce;
    	border-left: 1px solid #d0d1ce;
    	border-right: 1px solid #d0d1ce;
    	border-top: 1px solid #d0d1ce;
    	color: black;
    	border-radius: 3px 3px 3px 3px;
    	-moz-border-radius: 0px;
    	-webkit-border-radius: 0px;
    	font: 13px Arial, Helvetica, sans-serif;
    	padding: 6px 6px 4px;
    	width: 200px;
    }

    form.signin input:-moz-placeholder {
    	color: #bbb;
    	text-shadow: 0 0 2px #000;
    }

    form.signin input::-webkit-input-placeholder {
    	color: #bbb;
    	text-shadow: 0 0 2px #000;
    }

    .button {
    	background: -moz-linear-gradient(center top, #f3f3f3, #dddddd);
    	background: -webkit-gradient(linear, left top, left bottom, from(#f3f3f3), to(#dddddd));
    	background: -o-linear-gradient(top, #f3f3f3, #dddddd);
    	filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='#f3f3f3', EndColorStr='#dddddd');
    	border-color: #000;
    	border-width: 1px;
    	border-radius: 4px 4px 4px 4px;
    	-moz-border-radius: 4px;
    	-webkit-border-radius: 4px;
    	color: #333;
    	cursor: pointer;
    	display: inline-block;
    	padding: 6px 6px 4px;
    	margin-top: 10px;
    	font: 12px;
    	width: 214px;
    }

    .button:hover {
    	background: #ddd;
	}
	
	.error{
		color:red;
	}

	#one, #two, #three {
	width: 40px;
	height: 30px;
	padding: 10px;
    border: 1px solid black;
	background-color: black;
	background-size: 100% 100%;
    background-repeat: no-repeat;
	background-image:url(images/Kmutt web prototype2-31.png) ;
    margin: 0;  
	}
	#one, #two,#three,#two{margin:2px;}
#one, #two,#three { float: left; }
#myradio {float: left;}

	.loginBtn {
		box-sizing: border-box;
		position: relative;
		/* width: 13em;  - apply for fixed size */
		margin: 0.2em;
		padding: 0 15px 0 46px;
		border: none;
		text-align: left;
		line-height: 34px;
		white-space: nowrap;
		border-radius: 0.2em;
		font-size: 16px;
		color: #FFF;
		cursor:pointer;
	}
	.loginBtn:before {
		content: "";
		box-sizing: border-box;
		position: absolute;
		top: 0;
		left: 0;
		width: 34px;
		height: 100%;
	}
	.loginBtn:focus {
		outline: none;
	}
	.loginBtn:active {
		box-shadow: inset 0 0 0 32px rgba(0,0,0,0.1);
	}


	/* Facebook */
	.loginBtn--facebook {
		background-color: #4C69BA;
		background-image: linear-gradient(#4C69BA, #3B55A0);
		/*font-family: "Helvetica neue", Helvetica Neue, Helvetica, Arial, sans-serif;*/
		text-shadow: 0 -1px 0 #354C8C;
	}
	.loginBtn--facebook:before {
		border-right: #364e92 1px solid;
		background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/14082/icon_facebook.png') 6px 6px no-repeat;
	}
	.loginBtn--facebook:hover,
	.loginBtn--facebook:focus {
		background-color: #5B7BD5;
		background-image: linear-gradient(#5B7BD5, #4864B1);
	}
</style>
@endsection
@section('content')
<img src="ICONWEBSITE KMUTTOPEN\Kmutt web prototype2-26.png" style=" width:6%;position:fixed;right:5em;top:1.8em;left:0.2;display:block;position:absolute"
/>
<a href="#login-box2" class="login-window"><img src="ICONWEBSITE KMUTTOPEN\Kmutt web prototype2-25.png" style=" width:6%;position:fixed;right:11em;top:1.8em;left:0.2;display:block;position:absolute"
/></a>
@if(Auth::guest())
<a href="#login-box3" class="login-window"><img src="ICONWEBSITE KMUTTOPEN\Kmutt web prototype2-28.png" style=" width:5%;position:fixed;right:0.55em;top:5em;left:0.2;display:block;position:absolute"
/></a>
	<a href="#login-box" class="login-window"><img src="ICONWEBSITE KMUTTOPEN\Kmutt web prototype2-27.png " height="58" width="42" style="position:fixed;right:1.5em;top:1.2em;left:0.2;display:block;position:absolute"/></a>
@else
	<span style=" width:5%;position:fixed;right:0.55em;top:5em;left:0.2;display:block;position:absolute;text-align:center">Competitor<br>
	<form id="logout-form" action="{{ route('logout') }}" method="POST">
		{{ csrf_field() }}
		<a onclick="$('#logout-form').submit();">
			Logout
		</a>
	</form>
	</span>
@endif

<div class="container">
	<header>


	</header>
	<section id="dg-container" class="dg-container">
		<div class="dg-wrapper">
			@foreach($events as $event)
				<a href="event/{{ $event->Event_key }}">
					<center><img src="images/mainpic.png" alt="image01" style="width:55%;"></center>
					<div></div>
				</a>
			@endforeach
			
		</div>
		<nav>
			<span class="dg-prev"></span>
			<span class="dg-next">&gt;</span>
		</nav>
	</section>
</div>
<center>
	<form method="get" action="/search" id="search">
		<div id="search5back">


			<form method="get" action="/search" id="searchbox5">
				<input id="search52" name="q" type="text" size="40" placeholder="ค้นหารายการ" />
			</form>

		</div>

		</div>

		<div id="login-box" class="login-popup">
			<a href="#" class="close"><img src="ICONWEBSITE KMUTTOPEN\Kmutt web prototype2-29.png" class="btn_close" title="Close Window" alt="Close" width="20%" style="position:fixed;right:6.5em;top: 15em;left:0.2;display:block;position:absolute"  /></a>
			<div class="error"></div>
			<form class="signin">
				{{ csrf_field() }}
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
						<img id="login-button" src="ICONWEBSITE KMUTTOPEN\Kmutt web prototype2-32.png" width="40%"/>
						<br>
						<button type="button" onclick="window.location='/fb/redirect'" class="loginBtn loginBtn--facebook">
							Login with Facebook
						</button>
					</div>
				</fieldset>
			</form>
		</div>

	</div>
</div>


<div id="login-box2" class="login-popup">
	<a href="#" class="close"><img src="ICONWEBSITE KMUTTOPEN\Kmutt web prototype2-29.png" class="btn_close" title="Close Window" alt="Close" width="20%" style="position:fixed;right:6.7em;top: 17.5em;left:0.2;display:block;position:absolute"  /></a>
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
			<!-- <button class="submit button" type="button"></button> -->
			<img src="ICONWEBSITE KMUTTOPEN\Kmutt web prototype2-32.png" width="40%"/>
	</br>
					<p>
					คุณเคยจัดเเข่งหรือไม่?
					
					</p>
					<input type="radio" id="myRadio1">เคย
					
			</fieldset>
	  </form>
	</div>

</div>
</div>


<div id="login-box3" class="login-popup">
	<a href="#" class="close"><img src="ICONWEBSITE KMUTTOPEN\Kmutt web prototype2-29.png" class="btn_close" title="Close Window" alt="Close" width="20%" style="position:fixed;right:6.5em;top: 28em;left:0.2;display:block;position:absolute"  /></a>
	  <form id="signup" method="post" class="signin">
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
	
		   <!-- <button class="submit button" type="button"></button> -->
			<div align="center">
				<img id="regis-button" src="ICONWEBSITE KMUTTOPEN\Kmutt web prototype2-32.png" width="40%"/>
				<br>
				<button type="button" onclick="window.location='/fb/redirect'" class="loginBtn loginBtn--facebook">
					Login with Facebook
				</button>
			</div>
			</fieldset>
	  </form>
	</div>

</div>
</div>
@endsection
@section('script')
	<script type="text/javascript" src="js/modernizr.custom.53451.js"></script>
	<script type="text/javascript" src="js/jquery.gallery.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
		$("#login-button").click(function(e) {
			e.preventDefault();

			$.ajax({   
				type: "post",
				dataType: "json",
				headers: { 
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
				},
				data: $("form").serialize(),
				url: "/login",
				success: function (data) {
					$('#mask , .login-popup').fadeOut(300 , function() {
						$('#mask').remove();  
					}); 
					setTimeout(function() {
						location.reload();
					}, 300);
				},
				error: function (data) {
					var result = JSON.parse(data.responseText);
					$('.error').html('Error : ' + result.email+'<br>Error : ' + result.password);
				}
			})
			return false;
		});

		$("#regis-button").click(function(e) {
			e.preventDefault();

			$.ajax({   
				type: "post",
				dataType: "json",
				headers: { 
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
				},
				data: $("form").serialize(),
				url: "/register",
				success: function (data) {
					$('#mask , .login-popup').fadeOut(300 , function() {
						$('#mask').remove();  
					}); 
					setTimeout(function() {
						location.reload();
					}, 300);
				},
				error: function (data) {
					var result = JSON.parse(data.responseText);
					console.log(result);
//$('.error').html('Error : ' + result.email+'<br>Error : ' + result.password);
				}
			})
			return false;
		});


		$('a.login-window').click(function() {
			
			// Getting the variable's value from a link 
			var loginBox = $(this).attr('href');

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
	</script>
	<script type="text/javascript">
		$(function() {
			$('#dg-container').gallery();
		});
	</script>

@endsection