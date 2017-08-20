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
</style>
@endsection
@section('content')
<img src="ICONWEBSITE KMUTTOPEN\Kmutt web prototype2-28.png" style=" width:5%;position:fixed;right:0.55em;top:5em;left:0.2;display:block;position:absolute"
/>
<img src="ICONWEBSITE KMUTTOPEN\Kmutt web prototype2-26.png" style=" width:6%;position:fixed;right:5em;top:1.8em;left:0.2;display:block;position:absolute"
/>
<img src="ICONWEBSITE KMUTTOPEN\Kmutt web prototype2-25.png" style=" width:6%;position:fixed;right:11em;top:1.8em;left:0.2;display:block;position:absolute"
/>

<div class="container">

	<header>


	</header>
	<section id="dg-container" class="dg-container">
		<div class="dg-wrapper">
			<a href="#">
				<center><img src="images/mainpic.png" alt="image01" style="width:55%;"></center>
				<div></div>
			</a>
			<a href="#">
				<center><img src="images/mainpic.png" alt="image02" style="width:55%;"></center>
				<div>http://www.percivalclo.com/</div>
			</a>
			<a href="#">
				<center><img src="images/mainpic.png" alt="image03" style="width:55%;"></center>
				<div>http://www.wanda.net/fr</div>
			</a>
			<a href="#">
				<center><img src="images/mainpic.png" alt="image04" style="width:55%;"></center>
				<div>http://lifeingreenville.com/</div>
			</a>
			<a href="#">
				<center><img src="images/mainpic.png" alt="image05" style="width:55%;"></center>
				<div>http://circlemeetups.com/</div>
			</a>
			<a href="#">
				<center><img src="images/mainpic.png" alt="image06" style="width:55%;"></center>
				<div>http://www.castirondesign.com/</div>
			</a>
			<a href="#">
				<center><img src="images/mainpic.png" alt="image07" style="width:55%;"></center>
				<div>http://www.foundrycollective.com/</div>
			</a>
			<a href="#">
				<center><img src="images/mainpic.png" alt="image08" style="width:55%;"></center>
				<div>http://www.mathiassterner.com/home</div>
			</a>
			<a href="#">
				<center><img src="images/mainpic.png" alt="image09" style="width:55%;"></center>
				<div>http://learnlakenona.com/</div>
			</a>
			<a href="#">
				<center><img src="images/mainpic.png" alt="image10" style="width:55%;"></center>
				<div>http://www.neighborhood-studio.com/</div>
			</a>
			<a href="#">
				<center><img src="images/mainpic.png" alt="image11" style="width:55%;"></center>
				<div>http://www.beckindesign.com/</div>
			</a>
			<a href="#">
				<center><img src="images/mainpic.png" alt="image12" style="width:55%;"></center>
				<div>http://kicksend.com/</div>
			</a>
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



		<a href="#login-box" class="login-window"><img src="ICONWEBSITE KMUTTOPEN\Kmutt web prototype2-27.png " height="58" width="42" style="position:fixed;right:1.5em;top:1.2em;left:0.2;display:block;position:absolute"/></a>

		</div>

		<div id="login-box" class="login-popup">
			<a href="#" class="close"><img src="ICONWEBSITE KMUTTOPEN\Kmutt web prototype2-29.png" class="btn_close" title="Close Window" alt="Close" width="20%" style="position:fixed;right:6.5em;top: 15em;left:0.2;display:block;position:absolute"  /></a>
			<form method="post" class="signin" action="#">
				<fieldset class="textbox">
					<label class="username">
						<span>Username or email</span>
						<input id="username" name="username" value="" type="text" autocomplete="on" >
					</label>

					<label class="password">
						<span>Password</span>
						<input id="password" name="password" value="" type="password">
					</label>

					<!-- <button class="submit button" type="button"></button> -->
					<img src="ICONWEBSITE KMUTTOPEN\Kmutt web prototype2-32.png" width="40%" />
					<p>
						<a class="forgot" href="#" style="color:black;">ลืม password หรือ username</a>
					</p>

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