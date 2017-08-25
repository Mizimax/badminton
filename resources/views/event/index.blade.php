@extends('layouts.app')
@section('title', 'Event')
@section('style')
<style>
  .padding0{
    padding: 0 !important;
  }
</style>
@endsection
@section('content')
<div class="nav">
<div class="ui two column grid">
  <div class="row">
    <div class="column twelve wide padding0 text-right">
      <button class="ui inverted red button font-small">สมัครเป็นผู้จัดแข่ง</button>
      <button class="ui yellow button font-small">Coin Shop</button>
    </div>
@if(Auth::guest())
    <div class="column right floated four wide padding0 text-center">
      <a href="#login" class="login-window"><img src="ICONWEBSITE KMUTTOPEN\Kmutt web prototype2-27.png " height="58" width="42"/></a>
      <br>
      <a href="#regis" class="login-window ui blue label">Register</a>
    </div>
  </div>
  </div>
@else
    <div class="column right floated four wide padding0 text-center">
      <a href="#login" class="login-window"><img src="ICONWEBSITE KMUTTOPEN\Kmutt web prototype2-27.png " height="58" width="42"/></a>
      <a href="#regis" class="login-window ui blue label">Competitor</a><br>
      <form id="logout-form" action="logout" method="POST">
        {{ csrf_field() }}
        <a onclick="$('#logout-form').submit();">
          Logout
        </a>
      </form>
    </div>
  </div>
  </div>
@endif
</div>

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