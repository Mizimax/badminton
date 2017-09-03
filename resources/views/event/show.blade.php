@extends('layouts.app')
@section('title', $event->Event_Name)
@section('style')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
body, html {
    height: 100%;
    font-family: auto !important;
    font-size: auto !important;
    line-height: auto !important;
}
body {
    background-image: url("images/background.png") no-repeat center center fixed; 
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
  
 
}

.row::after {
    content: "";
    clear: both;
    display: table;
}
[class*="col-"] {
    float: left;
    padding: 15px;
}
html {
    font-family: "Lucida Sans", sans-serif;
}
.header {
   
    color: #ffffff;
    padding: 15px;
}
.aside {
  
    padding: 15px;
    color: #ffffff;
    text-align: center;
    font-size: 14px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
}
.footer {
   
    color: #ffffff;
    text-align: center;
    font-size: 12px;
    padding: 15px;
}
.col-6{
    padding-top:100px;
}
/* For mobile phones: */
[class*="col-"] {
    width: 100%;
}
@media only screen and (min-width: 600px) {
    /* For tablets: */
    .col-m-1 {width: 8.33%;}
    .col-m-2 {width: 16.66%;}
    .col-m-3 {width: 25%;}
    .col-m-4 {width: 33.33%;}
    .col-m-5 {width: 41.66%;}
    .col-m-6 {width: 70%;padding-left:200px;padding-right: 180px;padding-bottom:-150px; }
    .col-m-7 {width: 58.33%;}
    .col-m-8 {width: 66.66%;}
    .col-m-9 {width: 75%;}
    .col-m-10 {width: 83.33%;}
    .col-m-11 {width: 91.66%;}
    .col-m-12 {width: 100%;}
}
@media only screen and (min-width: 768px) {
    /* For desktop: */
    .col-1 {width: 8.33%;}
    .col-2 {width: 16.66%;}
    .col-3 {width: 25%;}
    .col-4 {width: 33.33%;}
    .col-5 {width: 41.66%;}
    .col-6 {width: 70%;padding-left: 50px;padding-bottom:-150px;}
    .col-7 {width: 58.33%;}
    .col-8 {width: 66.66%;}
    .col-9 {width: 75%;}
    .col-10 {width: 83.33%;}
    .col-11 {width: 91.66%;}
    .col-12 {width: 100%;}
}
.detail-box{
    background-color: none;
    word-break: break-all;
    padding: 15px;
    padding-bottom: 30%;
    margin: 0;
    border: 1px solid white;
}
#box_1{
    padding: 5%;
    min-width: 50px;
    
}

h1{
    color:black;
}
#image_1{
    
      
    }
    #image_2{
       
    }
    #image_3{
       
    }
    #image_4{
      
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

    .page2{
        height:100vh;
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
    width: 140px;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    top: -20px;
    left: 100%;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 5px 10px;
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
    z-index:999;
}
.social{
    width: 40px;
    height: 40px;
}

.social_1{
    width: 48px;
    height: 48px;
    padding-top:5px;
}

.mainpic{
    width:80%;
}

.result .w3-quarter{
    width: 20% !important;
}

@media (max-width: 800px){
    .col-m-5.menu{
        width:70% !important;
        bottom:20% !important;
    }
}

.menu .w3-quarter {
    margin-top:10px;
    width: 25% !important;
    margin-bottom:10px;
}

.row::after {
    content: "";
    clear: both;
    display: block;
}
[class*="col-"] {
    float: left;
    padding: 15px;
}
/* For desktop: */
.col-1 {width: 8.33%;}
.col-2 {width: 16.66%;}
.col-3 {width: 25%;}
.col-4 {width: 33.33%;}
.col-5 {width: 41.66%;}
.col-6 {width: 50%;}
.col-7 {width: 58.33%;}
.col-8 {width: 66.66%;}
.col-9 {width: 75%;}
.col-10 {width: 83.33%;}
.col-11 {width: 91.66%;}
.col-12 {width: 100%;}

.menu ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}
.menu li {
    padding: 0.1px;
    margin: 0px;
   
    color: #ffffff;
    
}
.menu li:hover {
   
}
.aside {
    background-color: #33b5e5;
    padding: 1px;
    color: #ffffff;
    text-align: center;
    font-size: 14px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
}

#get-content{
    position:relative;
    height:150px;
}

@media only screen and (max-width: 768px) {
    /* For mobile phones: */
    [class*="col-"] {
        width: 100%;
    }
}

</style>
@endsection
@section('content')

<div class="bg" style="position:relative"> 
    
@include('layouts.navbar')
<div class="contact_images" align="center">
    <img src="/images/ct_facebook.png" class="social">
    <img src="/images/ct_line.png" class="social_1">
    <img src="/images/ct_phone.png" class="social">
    <br>
    @if(Auth::guest())
    <a href="#guest" class="login-window"><button style="margin-top:10px;" class="ui violet button huge"  id="register_button"> สมัครลงเเข่ง</button></a>
    @else
    <a href="#eventRegis" class="login-window"><button style="margin-top:10px;" class="ui violet button huge"  id="register_button"> สมัครลงเเข่ง</button></a>
    @endif
</div>
<div class="Activity_images">

<div class="row">
                    
                    <div class="col-m-5 menu"  style="position:absolute;bottom:0;left:0">
                      <ul>
                        <li><img id="image_1" src="/images/1.png" width="100%" ></li>
                        <li><img id="image_2" src="/images/2.png" width="80%"> </li>
                        <li><img id="image_3" src="/images/3.png" width="70%"> </li>
                        <li> <img id="image_4" src="/images/4.png" width="60%"></li>
                      </ul>
                    </div> 

</div> 



</div>
</div>
<div class="page2">
@include('layouts.navbar')
<br><br><br><br><br>
<div class="row">

<div class="col-3 col-m-3 menu" align="center"  style="margin-top:5%;">
  <ul>
    <li></li>
    <li> 
        <h5  class="mainpic-h5">LALA move open</h5>
        <img src="/images/mainpic.png" class="mainpic"/>
    </li>
    <li> 
    <br>
     <button id="detail-button" class="ui green button">รายละเอียดการเเข่ง</button>
     <br><br>
    </li>
    <li>
       <div class="detail-box" align="left">
       {!! $event->Event_Description !!}


       </div>
    </li>
  </ul>
</div>

<div class="col-9 col-m-9">     
      <div class="w3-row-padding menu" style="font-size:9px;" align="center">
        <button class="ui inverted button" style="margin: 20px 0 20px 0; position:relative; z-index:1000">สถานะการเเข่งขันน</button><br>
        <div class="w3-quarter">
                <button class="ui inverted blue button" id="box_1" disabled>สถานะรายการ</button>

        </div>
      
        <div class="w3-quarter">
                <button class="ui blue button" id="box_2" onclick="getStatus(this, 'hand')">อันดับมือ</button>
          
        </div>
      
        <div class="w3-quarter">
                <button class="ui inverted blue button" id="box_3" onclick="getStatus(this, 'pay')">สถานะการจ่ายเงิน</button>

        </div>
        <div class="w3-quarter">
                <button class="ui inverted blue button" id="box_4" disabled>ภาพรวม</button>
                
              </div>
      </div>
      <div class="row">
            <br>
            <div class="col-12 col-m-12 menu delete" align="center">
                    <div class="dropdown">
                            <button class="dropbtn">เลือกอันดับมือ</button>
                            <div class="dropdown-content">
                              <a onclick="sortByRank('*', window.myEvent)" href="#">ทั้งหมด</a>
                              <a onclick="sortByRank(this.innerText, window.myEvent)" href="#">A</a>
                              <a onclick="sortByRank(this.innerText, window.myEvent)" href="#">B+</a>
                              <a onclick="sortByRank(this.innerText, window.myEvent)" href="#">B</a>
                              <a onclick="sortByRank(this.innerText, window.myEvent)" href="#">C+</a>
                              <a onclick="sortByRank(this.innerText, window.myEvent)" href="#">C</a>
                              <a onclick="sortByRank(this.innerText, window.myEvent)" href="#">P+</a>
                              <a onclick="sortByRank(this.innerText, window.myEvent)" href="#">P</a>
                              <a onclick="sortByRank(this.innerText, window.myEvent)" href="#">P-</a>
                              <a onclick="sortByRank(this.innerText, window.myEvent)" href="#">S</a>
                              <a onclick="sortByRank(this.innerText, window.myEvent)" href="#">N</a>
                            </div>
                          </div>
                <br><br>
            </div> 
      </div>
    <div id="get-content">
        
    </div>

</div>


</div>
</div>

</div>
@endsection
@section('script')
    <script>
        "use strict";
        
        var Rank = ["", "A", "B+", "B", "C+", "C", "P+", "P", "P-", "S", "N"];
        var Team_Status = [
          {
            message: "ยังไม่ประเมิน",
            class: "grey"
          },
          {
            message: "ไม่ผ่านการประเมิน",
            class: "red"
          },
          {
            message: "ผ่านการประเมิน",
            pay_message: "ยังไม่จ่ายเงิน",
            class: "green",
            pay_class: "blue"
          },
          {
            message: "ผ่านการประเมิน",
            pay_message: "จ่ายเงินแล้ว",
            class: "green",
            pay_class: "yellow"
          }
        ];
        
        $(document).ready(function() {
          var menuSelected = false;
          var genderSelectedOne = false;
          var genderSelectedTwo = false;
        
          /* get start with */
          getStatus("#box_1", "hand");
        
          $(document).on("click", ".button.circular.one", function() {
            $(".button.circular.one")
              .not(this)
              .removeClass("red");
            $(this).toggleClass("red");
        
            genderSelectedOne = !genderSelectedOne;
          });
          $(document).on("click", ".button.circular.two", function() {
            $(".button.circular.two")
              .not(this)
              .removeClass("red");
            $(this).toggleClass("red");
        
            genderSelectedTwo = !genderSelectedTwo;
          });
          $(".ui.blue.button").click(function() {
            $(".ui.blue.button")
              .not(this)
              .addClass("inverted");
            //$('.ui.blue.button').prop('disabled', false);
            $(this).removeClass("inverted");
            //$(this).prop('disabled', true);
        
            menuSelected = !menuSelected;
          });
        });
        
        var getStatus = function getStatus(ele, action) {
          if (!$(ele).hasClass("inverted")) {
            return false;
          }
          $(".menu").show();
          window.myEvent = action;
          var url = window.location.pathname + "/" + action;
          var ele = "#get-content";
          var data = '\n                    <div class="myTeam">\n                ';
          ajaxGet(ele, url, function(result) {
            if (result["myTeam"].length > 0) {
              var myTeam = result["myTeam"];
              for (var i = 0; i < myTeam.length; i += 2) {
                data +=
                  '\n                            <div class="result row" style="color:#ffffff">\n                            <div class="w3-quarter">\n                                \xA0\n                            </div>\n                            <div class="w3-quarter">\n                                ' +
                  myTeam[i].Firstname +
                  " " +
                  myTeam[i].Lastname +
                  '\n                                <div style="width:10px;float:right;transform: translateX(-10px)">+</div>\n                            </div>\n                            \n                            <div class="w3-quarter">\n                                ' +
                  myTeam[i + 1].Firstname +
                  " " +
                  myTeam[i + 1].Lastname +
                  '\n                            </div>\n                            \n                            <div class="w3-quarter" align="center">\n                                <button class="ui label blue">\n                                    ' +
                  Rank[myTeam[i].Team_Rank] +
                  '\n                                </button>  \n                            </div>\n                            <div class="w3-quarter" align="center">\n                                <button class="ui label ' +
                  (action !== "pay" || myTeam[i].Team_Status === 0
                    ? Team_Status[myTeam[i].Team_Status].class
                    : Team_Status[myTeam[i].Team_Status].pay_class) +
                  '">\n                                    ' +
                  (action !== "pay" || myTeam[i].Team_Status === 0
                    ? Team_Status[myTeam[i].Team_Status].message
                    : Team_Status[myTeam[i].Team_Status].pay_message) +
                  "\n                                </button>\n                            </div>\n                        </div>\n                        ";
              }
        
              data += "</div>";
            } else {
              data += "<br><div align='center'>คุณไม่ได้ส่งทีมแข่ง</div><br>";
            }
            if (result["allTeam"].length > 0) {
              window.allTeam = result["allTeam"];
        
              data += '<hr><div class="allTeam">';
        
              for (var i = 0; i < allTeam.length; i += 2) {
                data +=
                  '\n                            <div class="result row" style="color:#ffffff">\n                            <div class="w3-quarter">\n                                \xA0\n                            </div>\n                            <div class="w3-quarter">\n                                ' +
                  allTeam[i].Firstname +
                  " " +
                  allTeam[i].Lastname +
                  '\n                                <div style="width:10px;float:right;transform: translateX(-10px)">+</div>\n                            </div>\n                            <div class="w3-quarter">\n                                ' +
                  allTeam[i + 1].Firstname +
                  " " +
                  allTeam[i + 1].Lastname +
                  '\n                            </div>\n                            <div class="w3-quarter" align="center">\n                                <button class="ui label blue">\n                                    ' +
                  Rank[allTeam[i].Team_Rank] +
                  '\n                                </button>  \n                            </div>\n                            <div class="w3-quarter" align="center">\n                                <button class="ui label ' +
                  (action !== "pay" || allTeam[i].Team_Status === 0
                    ? Team_Status[allTeam[i].Team_Status].class
                    : Team_Status[allTeam[i].Team_Status].pay_class) +
                  '">\n                                ' +
                  (action !== "pay" || allTeam[i].Team_Status === 0
                    ? Team_Status[allTeam[i].Team_Status].message
                    : Team_Status[allTeam[i].Team_Status].pay_message) +
                  "\n                                \n                                </button>\n                            </div>\n                        </div>\n                        ";
              }
        
              data += "</div>";
            } else {
              data += "<br><div align='center'>ไม่มีผู้สมัครแข่ง</div><br>";
            }
        
            $(ele).html(data);
          });
        };
        
        var sortByRank = function sortByRank(rank, action) {
          var filterChange = function filterChange(callback) {
            newAllTeam = allTeam.filter(function(item) {
              if (rank === "*") return true;
              return Rank[item.Team_Rank] === rank;
            });
            callback();
          };
          filterChange(function() {
            if (newAllTeam.length > 0) {
              allTeamAddData(action);
            } else {
              $(".allTeam").html('<div align="center">ไม่พบผู้สมัครแข่ง</div>');
            }
          });
        };
        
        var allTeamAddData = function allTeamAddData(action) {
          var data = "";
          for (var i = 0; i < newAllTeam.length; i += 2) {
            data +=
              '\n                    <div class="result row" style="color:#ffffff">\n                        <div class="w3-quarter">\n                            \xA0\n                        </div>\n                        <div class="w3-quarter">\n                            ' +
              newAllTeam[i].Firstname +
              " " +
              newAllTeam[i].Lastname +
              '\n                            <div style="width:10px;float:right;transform: translateX(-10px)">+</div>\n                        </div>\n                        <div class="w3-quarter">\n                            ' +
              newAllTeam[i + 1].Firstname +
              " " +
              newAllTeam[i + 1].Lastname +
              '\n                        </div>\n                        <div class="w3-quarter" align="center">\n                            <button class="ui label blue">\n                                ' +
              Rank[newAllTeam[i].Team_Rank] +
              '\n                            </button>  \n                        </div>\n                        <div class="w3-quarter" align="center">\n                            <button class="ui label ' +
              (action !== "pay" || newAllTeam[i].Team_Status === 0
                ? Team_Status[newAllTeam[i].Team_Status].class
                : Team_Status[newAllTeam[i].Team_Status].pay_class) +
              '">\n                            ' +
              (action !== "pay" || newAllTeam[i].Team_Status === 0
                ? Team_Status[newAllTeam[i].Team_Status].message
                : Team_Status[newAllTeam[i].Team_Status].pay_message) +
              "\n                            \n                            </button>\n                        </div>\n                    </div>\n                    ";
          }
          $(".allTeam").html(data);
        };
        

    </script>
@endsection