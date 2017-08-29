@extends('layouts.app')
@section('title', $event->Event_Name)
@section('style')
<style>
body, html {
    height: 100%;
}
body {
    background-image: url("images/background.png") no-repeat center center fixed; 
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}

h1{
    color:black;
}
#image_1{
    
        position:relative;
        right:6.7em;
        top: 26em;
        left:0.5em;
        display:block;
    }
    #image_2{
        position:relative;
        right:6.7em;
        top: 25em;
        left:0.5em;
        display:block;
    }
    #image_3{
        position:relative;
        right:6.7em;
        top: 23.8em;
        left:0.5em;
        display:block;
    }
    #image_4{
        position:relative;
        right:6.7em;
        top: 22.5em;
        left:0.5em;
        display:block;
    }

    #ct_facebook{

        position:relative;
        right:6.7em;
        top: 10.5em;
        left:75em;
        display:block;
    }
    #ct_line{
        position:relative;
        right:6.7em;
        top: -0.2em;
        left:80em;
        display:block;
    }
    #ct_phone{
        position:relative;
        right:6.7em;
        top: -4.7em;
        left:86em;
        display:block;
    }

    .event_detail{
        background-image: url("images/mainbackground.png");        
    }

#status{
    float: center;
  
}

.box-status {
    position:relative;
    right:5em;
    top:7em;
    left:45em;
    display:block;
    
}

.mainpic{
    width:180px;
    height:250px;
    position:relative;
    right:5em;
    top:9em;
    left:8.5em;
    display:block;

}

#mainpic-h5{
    color:white;
    position:relative;
    right:6em;
    top:10em;
    left:11em;
    display:block;
}

#detail-button{
    position:relative;
    right:6em;
    top:10em;
    left:9em;
    display:block;
}

#account-detail{
    border: 1px solid white;
    padding: 25px;
    margin: 25px;
    width: 300px;
    position:relative;
    right:6em;
    top:10em;
    left:2em;
    display:block;
    color:white;
}

#status-cha{
    color:white;
    position: absolute;
    top: 200px;
    display:block;
    font-size: 10px;
}

#box_1{
    width:140px;
    margin-top: -80px;
    margin-bottom: 100px;
    margin-right: 150px;
    margin-left: 30px;
}
#box_2{
    width:140px;
    margin-top: -80px;
    margin-bottom: 100px;
    margin-right: 150px;
    margin-left: 120px;
}
#box_3{
    width:140px;
    margin-top: -80px;
    margin-bottom: 100px;
    margin-right: 150px;
    margin-left: 200px;
}
#box_4{
    width:140px;
    margin-top: -80px;
    margin-bottom: 100px;
    margin-right: 150px;
    margin-left: 290px;
}

.dropdown{
    

}

table.scroll {
    /* border-collapse: collapse; */
    border-spacing: 0;
    border: 2px solid white;
    display:block;
    color:white;
}

table.scroll tbody,
table.scroll thead { display: block; }

thead tr th { 
    height: 30px;
    line-height: 30px;
    /*text-align: left;*/
}

table.scroll tbody {
    height: 100px;
    overflow-y: auto;
    overflow-x: hidden;
}

tbody { border-top: 2px solid white;}

tbody td, thead th {
    width: 4%; /* Optional */
    border-right: 1px solid white;;
}

tbody td:last-child, thead th:last-child {
    border-right: none;
}

.bg { 
    /* The image used */
    background-image: url("/images/event_background.png");

    /* Full height */
    height: 100vh; 

    /* Center and scale the image nicely */
    background-position: left top;
    background-repeat: no-repeat;
    background-size: cover;
}

.event_detail{
        position:relative;
        background-image: url("/images/mainbackground.png");
        height:100vh;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover; 
    }

    .dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}


.container {width: 960px; margin: 0 auto; overflow: hidden;}

#content {	float: left; width: 100%;}

.post { margin: 0 auto; padding-bottom: 50px; float: left; width: 960px; }

.btn-sign {
	width:460px;
	margin-bottom:20px;
	margin:0 auto;
	padding:20px;
	border-radius:5px;
	background: -moz-linear-gradient(center top, #00c6ff, #018eb6);
    background: -webkit-gradient(linear, left top, left bottom, from(#00c6ff), to(#018eb6));
	background:  -o-linear-gradient(top, #00c6ff, #018eb6);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='#00c6ff', EndColorStr='#018eb6');
	text-align:center;
	font-size:36px;
	color:#fff;
	text-transform:uppercase;
}

.btn-sign a { color:#fff; text-shadow:0 1px 2px #161616; }

img.btn_close {
	float: right; 
	margin: -28px -28px 0 0;
}

.contact_images{
    position: absolute;
    right:10%;
    bottom:5%;
}
.social{
    width: 40px;
    height: 40px;
}

</style>
@endsection
@section('content')

<div class="bg"> 
<div class="contact_images" align="center">
<img src="/images/ct_facebook.png" class="social">
<img src="/images/ct_line.png" class="social">
<img src="/images/ct_phone.png" class="social">
<br>
@if(Auth::guest())
<a href="#guest" class="login-window"><button style="margin-top:10px;" class="ui violet button huge"  id="register_button"> สมัครลงเเข่ง</button></a>
@else
<a href="#eventRegis" class="login-window"><button style="margin-top:10px;" class="ui violet button huge"  id="register_button"> สมัครลงเเข่ง</button></a>
@endif
</div>     
<div class="Activity_images">
<img id="image_1" src="/images/1.png" width="31%">
<img id="image_2" src="/images/2.png" width="29%"> 
<img id="image_3" src="/images/3.png" width="27%">   
<img id="image_4" src="/images/4.png" width="20%">

</div>




</div>

<div class="event_detail">
@include('layouts.navbar')

    

    <div class="profile-box">
        <h5 id="mainpic-h5">LALA move open</h5>
        <img src="/images/mainpic.png" class="mainpic"/>
        <button id="detail-button" class="ui green button">รายละเอียดการเเข่ง</button>

        <div id="account-detail">
            {!! $event->Event_Description !!}
           
        </div>
    </div>

    <div class="ui mobile reversed equal width grid text-center" id="status-cha">
            
            <div class="column">
                <button onclick="ajaxGet('#showData', '/api/event/'+ window.location.pathname.split('/')[2] + '/status')" class="ui inverted blue button" id="box_1">สถานะรายการ</button>
            </div>
            <div class="column">
                <button class="ui inverted blue button" id="box_2">สถานะประเมิน</button>
            </div>
            <div class="column">
                <button class="ui inverted blue button"id="box_3">สถานะการเงิน</button>
            </div>
            <div class="column">
                <button class="ui inverted blue button" id="box_4">ภาพรวม</button>
            </div>
            <div class="dropdown">
            <button class="dropbtn">เลือกอันดับมือ</button>
            <div class="dropdown-content">
              <a href="#">Link 1</a>
              <a href="#">Link 2</a>
              <a href="#">Link 3</a>
            </div>
            
            </div>
            <div id="showData"></div>
            <div class="ui mobile reversed equal width grid text-center">
                <div class="five wide column">
                </div>
                <div class="ten wide column">
                <div class="information-scroll text-center">
                
                </div>
                </div>
          </div>
          </div>
          
       
        </div>
    </div>

    
  
    </div>



  
<input type="hidden" class="delete" id="token" value="{{ (isset(Auth::user()->api_token)) ? Auth::user()->api_token : '' }}" />



     
</div>



</div>


@endsection
@section('script')

@endsection