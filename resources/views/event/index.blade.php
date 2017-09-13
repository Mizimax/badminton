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
    top:-100px !important;
    left:50% !important;
    transform:translateX(-50%) !important;
    font-family: "tahoma" !important;
  }
  .event-display .date{
    color:#ccc;
    margin-bottom:20px;
  }
  .event-display .dateToNow{
    color:#FCEEEE;
    margin-bottom:15px;
  }
  .event-display .day{
    color:#F60909;
    font-size:16px;
  }
  .event-display .name{
    color: #FFF;
    font-size:24px;
    width:200%;
    transform: translateX(-25%);
  }
  .head-space{
    height:200px;
  }
  .icon{
    cursor: pointer;
  }
  .icon.right{
    margin-left:65px;
  }
  .icon.left{
    margin-right:65px;
  }
  .profile{
    border-radius: 50%;
    width:42px;
    height: 42px;
  }
  @media (max-width:349px){
    .nav-gallery{
       width:70%;
    }
  }
  .nav-gallery{
    position:absolute;
    left:50%;
    transform:translateX(-50%);
    top:100px;
    margin:0 auto;
    z-index:999;
  }
  .fakeSearch{
    width:20px;
    height:20px;
    position: absolute;
    z-index: 99;
    left:50%+0;
    transform: translate(-160%,0px);
    opacity: 0;
    cursor: pointer;
   
    
  }
  .hand{
    position:absolute;
    left:50%;
    top:-35px;
    width:200px;
    text-align: center;
    transform: translateX(-50%);
    z-index: -1;
  }
  .ui.button.circle{
    border-radius: 50%;
    padding:20px 20px;
    font-size: 22px;
    position: relative;
  }
  .button-text{
    position: absolute;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
  }
  .line{
    margin-right:15px;
    margin-left:10px;
  }
  .image-slide{
    max-width: 50%;
    max-height:50%;
    margin: 0;
    padding: 0;
    transform: translateY(-10%);
   

  }
  .fond{position:absolute;padding-top:85px;top:0;left:0; right:0;bottom:0;
 background-color:#00506b;}

.style_prevu_kit
{
    display:inline-block;
    border:0;
    width:100%;
    height:auto;
    position: relative;
    -webkit-transition: all 200ms ease-in;
    -webkit-transform: scale(1); 
    -ms-transition: all 200ms ease-in;
    -ms-transform: scale(1); 
    -moz-transition: all 200ms ease-in;
    -moz-transform: scale(1);
    transition: all 200ms ease-in;
    transform: scale(1);   
    

}
.style_prevu_kit:hover
{

     
    z-index:999;
    -webkit-transition: all 200ms ease-in;
    -webkit-transform: scale(1.5);
    -ms-transition: all 200ms ease-in;
    -ms-transform: scale(1.5);   
    -moz-transition: all 200ms ease-in;
    -moz-transform: scale(1.5);
    transition: all 200ms ease-in;
    transform: scale(1.5);
   
}


</style>
@endsection
@extends('layouts.navbar')
@section('content')
<div class="head-space" style="position:relative">
<div align="center" class="nav-gallery" >
  <span class="icon left nav-prev">◄</span>
  <span class="icon right nav-next">►</span>
</div>
</div>

<section id="dg-container" class="dg-container">
	<div class="dg-wrapper">
    <?php $i = 0; ?>
    @foreach($events as $event)
      <a href="event/{{ $event->Event_key }}">
        <div class="event-display text-center">
          <div class="date" onclick="return false;">
            <u style="background-color:red;font-color:white;">{{ $event->Event_Start }}</u>
          </div>
          <div class="name">{{ $event->Event_Name }}</div>
          <div class="dateToNow dateToNow{{$i}}" date="{{ $event->Event_Start }}" ></div>
          
        </div>
        <script type="text/javascript">
          var diffDays1=function(){ 
              var ele = document.querySelector('.dateToNow{{ $i++ }}');
              var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
              var secondDate = new Date();
              var firstDate = new Date(ele.getAttribute("date"));
              var days = Math.round((firstDate.getTime() - secondDate.getTime())/(oneDay));
              if(days > 0)
                ele.innerHTML = '<div style="margin-bottom:10px;font-color:white;">สมัครได้อีก<span class="day" style="font-color:white;">' + days + ' วัน</span></div>'
              else
                ele.innerHTML = '<span class="day">หมดเวลาสมัครแล้ว</span>'
              
          };
          diffDays1();
        </script>
        <center>

        <div class="style_prevu_kit">

          <img src="images/event/{{ $event->Event_Cover_Pic }}" alt="image01" class="image-slide">

        </div>
       
      </center>


      
			</a>
		@endforeach
     
		<a href="#"><center><img src="images/mainpic.png" alt="image02" class="image-slide"> </div>
       
      </center>
		
	
			
  </div>
  <br>
  
	<nav>
    <div class="hand" style="">
      <button class="ui red button circle">
        <div class="button-text">P-</div>
      </button>
      <span class="line">_</span>
      <button class="ui red button circle">
        <div class="button-text">C</div>
      </button>
    <span class="dg-prev"></span>
		<span class="dg-next"></span>
    </div>

	</nav>


			<form method="get" onsubmit="return false;" action="/search" id="searchbox5" style="margin-top: 30px;text-align:center">
        <input id="search52" name="q" type="text" placeholder="ค้นหารายการ" />
        <button class="fakeSearch" type="submit">ค้นหา</button>

			</form>

	</div>
</section>
	
</div>
</div>
@endsection
@section('script')
	<script type="text/javascript" src="/js/modernizr.custom.53451.js"></script>
	<script type="text/javascript" src="/js/jquery.gallery.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      var handStatus = false;
      $('.button.circle').click(function() {  
        $('.button.circle').not(this).removeClass('basic');
        $(this).toggleClass('basic')
        
        handStatus = !handStatus
      });
    });
    
		$(function() {
			$('#dg-container').gallery();
		});
	</script>

@endsection