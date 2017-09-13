

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
body, html {
    height: 100%;
    font-family: auto !important;
    font-size: auto !important;
    line-height: auto !important;
}
body {
    background-image: url("images/show2.jpg") no-repeat center center fixed; 
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

<div class="bg" style="position:relative"> 
    

<div class="contact_images" align="center">
    <img src="/images/ct_facebook.png" class="social">
    <img src="/images/ct_line.png" class="social_1">
    <img src="/images/ct_phone.png" class="social">
    <br>
   
    <a href="https://docs.google.com/forms/d/e/1FAIpQLScGUvynRfqlHw37YvpytSMjSertUGTDhyIj46nU0y9NHKNLIQ/viewform?c=0&w=1" class="login-window"><button style="margin-top:10px;" class="ui violet button huge"  id="register_button"> สมัครลงเเข่ง</button></a>
    
</div>
<div class="Activity_images">





</div>
</div>
<div class="page2">
<br><br><br><br><br>
<div class="row">

<div class="col-3 col-m-3 menu" align="center"  style="margin-top:5%;">
  <ul>
    <li></li>
    <li> 
        <h5  class="name">Intajak#cup1</h5>
        <img src="/images/show4.png" class="mainpic"/>
    </li>
    <li> 
    <br>
     <a href="https://sites.google.com/site/xinthcakrkhaph1"><button id="detail-button" class="ui green button">รายละเอียดการเเข่ง</button>
     <br><br>
    </li>
    <li>
       


       </div>
    </li>
  </ul>
</div>

