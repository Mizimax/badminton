@extends('layouts.app')
@section('title', 'Event')
@section('style')
<style>
  .padding0 {
      padding: 0 !important;
  }
  .event-display {
      position: absolute !important;
      right: auto !important;
      bottom: auto !important;
      top:-85px !important;
      left:50% !important;
      transform:translateX(-50%) !important;
  }
  .date{
    color:#ccc;
    margin-bottom:20px;
  }
  .dateToNow{
    color:#888;
    margin-bottom:15px;
  }
  .day{
    color:white;
    font-size:18px;
  }
  .name{
    color: #ddd;
    font-size:28px;
  }
  .head-space{
      height:200px;
  }
  .icon{
    margin-left:15px;
    margin-right:15px;
  }
  .profile{
    border-radius: 50%;
    width:42px;
    height: 42px;
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
      <img class="profile" src="/images/guest.jpg">
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

<div class="head-space">

</div>

<section id="dg-container" class="dg-container">
	<div class="dg-wrapper">
    @foreach($events as $event)
      <a href="event/{{ $event->Event_key }}">
        <div class="event-display text-center">
          <div class="date"><span class="icon">◄</span> {{ $event->Event_Start }} <span class="icon">►</span></div>
          <div class="dateToNow" date="{{ $event->Event_Start }}"></div>
          <div class="name">{{ $event->Event_Name }}</div>
        </div>
        <script type="text/javascript">
          var diffDays1=function(){ 
              var ele = document.querySelector('.dateToNow');
              var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
              var secondDate = new Date();
              var firstDate = new Date(ele.getAttribute("date"));
              var days = Math.round((firstDate.getTime() - secondDate.getTime())/(oneDay));
              if(days > 0)
                ele.innerHTML = 'เหลือเวลาสมัครอีก<br><span class="day">' + days + 'ว ัน</span>'
              // else if(days = 0)
              //   ele.innerHTML = 'เหลือเวลาสมัคร'
              else
                ele.innerHTML = '<span class="day">หมดเวลาสมัครแล้ว</span>'
              
          };
          diffDays1();
        </script>
				<center><img src="images/mainpic.png" alt="image01" style="width:50%;"></center>
			</a>
		@endforeach
		<a href="#">
			<center><img src="images/mainpic.png" alt="image01" style="width:50%;"></center>
			<div></div>
		</a>
		<a href="#">
			<center><img src="images/mainpic.png" alt="image01" style="width:50%;"></center>
			<div></div>
		</a>
		<a href="#">
			<center><img src="images/mainpic.png" alt="image01" style="width:50%;"></center>
			<div></div>
		</a>
			
	</div>
	<nav>
		<span class="dg-prev"></span>
		<span class="dg-next">&gt;</span>
	</nav>


			<form method="get" action="/search" id="searchbox5" style="margin-top: 70px;text-align:center">
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