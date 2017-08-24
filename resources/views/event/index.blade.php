@extends('layouts.app')
@section('title', 'Event')
@section('content')
	<img src="ICONWEBSITE KMUTTOPEN\Kmutt web prototype2-26.png" style=" width:6%;position:fixed;right:5em;top:1.8em;left:0.2;display:block;position:absolute"
/>
	<a href="#login-box2" class="login-window"><img src="ICONWEBSITE KMUTTOPEN\Kmutt web prototype2-25.png" style=" width:6%;position:fixed;right:11em;top:1.8em;left:0.2;display:block;position:absolute"/></a>
@if(Auth::guest())
	<div class="nav">
		<a href="#login" class="login-window"><img src="ICONWEBSITE KMUTTOPEN\Kmutt web prototype2-27.png " height="58" width="42"/></a>
		<br>
		<a href="#regis" class="login-window">regis</a>
	</div>
@else
	<div class="nav">
		<span>Competitor</span>
		<form id="logout-form" action="logout" method="POST">
			{{ csrf_field() }}
			<a onclick="$('#logout-form').submit();">
				Logout
			</a>
		</form>
	</div>
	
@endif

<section id="dg-container" class="dg-container">
	<div class="dg-wrapper">
		@foreach($events as $event)
			<a href="event/{{ $event->Event_key }}">
				<center><img src="images/mainpic.png" alt="image01" style="width:55%;"></center>
				<div></div>
			</a>
		@endforeach
		<a href="#">
			<center><img src="images/mainpic.png" alt="image01" style="width:55%;"></center>
			<div></div>
		</a>
		<a href="#">
			<center><img src="images/mainpic.png" alt="image01" style="width:55%;"></center>
			<div></div>
		</a>
		<a href="#">
			<center><img src="images/mainpic.png" alt="image01" style="width:55%;"></center>
			<div></div>
		</a>
			
	</div>
	<nav>
		<span class="dg-prev"></span>
		<span class="dg-next">&gt;</span>
	</nav>


			<form method="get" action="/search" id="searchbox5" style="margin-top: 100px;text-align:center">
				<input id="search52" name="q" type="text" size="40" placeholder="ค้นหารายการ" />
			</form>

	</div>
</section>
	
</div>
</div>
@endsection
@section('script')
	<script type="text/javascript" src="js/modernizr.custom.53451.js"></script>
	<script type="text/javascript" src="js/jquery.gallery.js"></script>
	<script type="text/javascript">
		$(function() {
			$('#dg-container').gallery();
		});
	</script>

@endsection